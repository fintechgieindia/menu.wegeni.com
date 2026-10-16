<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\HasBranch;
use App\Enums\OrderStatus;
use App\Models\OrderCharge;
use App\Scopes\BranchScope;
use App\Models\DeliveryExecutive;
use App\Models\OrderNumberSetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends BaseModel
{
    use HasFactory;
    use HasBranch;

    protected $guarded = ['id'];
    protected $appends = ['show_formatted_order_number'];

    protected $casts = [
        'date_time' => 'datetime',
        'order_status' => OrderStatus::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid ??= (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function waiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'waiter_id')->withoutGlobalScope(BranchScope::class);
    }

    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by')->withoutGlobalScope(BranchScope::class);
    }

    public function cancelledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cancelled_by')->withoutGlobalScope(BranchScope::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function taxes(): HasMany
    {
        return $this->hasMany(OrderTax::class);
    }

    public function charges(): HasMany
    {
        return $this->hasMany(OrderCharge::class);
    }

    public function extraCharges(): BelongsToMany
    {
        return $this->belongsToMany(RestaurantCharge::class, 'order_charges', 'order_id', 'charge_id');
    }

    public function kot(): HasMany
    {
        return $this->hasMany(Kot::class)->where('status', '!=', 'cancelled');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function splitOrders(): HasMany
    {
        return $this->hasMany(SplitOrder::class, 'order_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class)->withoutGlobalScopes();
    }

    public function deliveryExecutive(): BelongsTo
    {
        return $this->belongsTo(DeliveryExecutive::class);
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    public function cancelReason(): BelongsTo
    {
        return $this->belongsTo(KotCancelReason::class, 'cancel_reason_id');
    }

    public function orderType(): BelongsTo
    {
        return $this->belongsTo(OrderType::class);
    }

    public function deliveryApp(): BelongsTo
    {
        return $this->belongsTo(DeliveryPlatform::class, 'delivery_app_id');
    }

    public function deliveryPlatform(): BelongsTo
    {
        return $this->deliveryApp();
    }

    public static function generateOrderNumber($branch)
    {
        // Check if order number settings exist and feature is enabled
        $settings = getOrderNumberSetting($branch->id);

        if ($settings && $settings->enable_feature) {
            return self::generateFormattedOrderNumber($branch->id, $settings);
        }

        $maxOrderNumber = Order::where('branch_id', $branch->id)->whereNotNull('order_number')->where('status', '!=', 'draft')->max(DB::raw('CAST(order_number AS UNSIGNED)'));
        $orderNumber = $maxOrderNumber ? ((int)$maxOrderNumber + 1) : 1;

        return [
            'order_number' => $orderNumber,
            'formatted_order_number' => ($settings && $settings->enable_feature) ? (string) $orderNumber : null
        ];
    }

    private static function generateFormattedOrderNumber($branchId, $settings)
    {
        $currentTime = now(restaurant()->timezone ?? 'UTC');

        // Determine the next order number
        $orderQuery = Order::where('branch_id', $branchId)->whereNotNull('order_number')->where('status', '!=', 'draft');

        if ($settings->reset_daily) {
            // Reset counter daily - only consider orders from today
            $orderQuery->whereDate('created_at', $currentTime->toDateString());
        }

        $maxOrderNumber = $orderQuery->max(DB::raw('CAST(order_number AS UNSIGNED)'));
        $nextNumber = $maxOrderNumber ? ((int)$maxOrderNumber + 1) : 1;

        // Check if the order number already exists (to avoid duplicates)
        do {
            $exists = Order::where('branch_id', $branchId)
                ->where('order_number', $nextNumber)
                ->whereDate('created_at', $settings->reset_daily ? $currentTime->toDateString() : '>=' . $currentTime->startOfDay())
                ->exists();

            if ($exists) {
                $nextNumber++;
            }
        } while ($exists);

        // Generate formatted order number
        $formattedNumber = self::buildFormattedOrderNumber($nextNumber, $settings, $currentTime);

        return [
            'order_number' => $nextNumber,
            'formatted_order_number' => $formattedNumber
        ];
    }


    private static function buildFormattedOrderNumber($orderNumber, $settings, $currentTime)
    {
        $parts = [];

        // Add prefix
        if (!empty($settings->prefix)) {
            $parts[] = $settings->prefix;
        }

        // Add date components if enabled
        if ($settings->include_date) {
            $dateParts = [];

            if ($settings->show_year) {
                $dateParts[] = $currentTime->format('Y');
            }

            if ($settings->show_month) {
                $dateParts[] = $currentTime->format('m');
            }

            if ($settings->show_day) {
                $dateParts[] = $currentTime->format('d');
            }

            if (!empty($dateParts)) {
                $parts[] = implode('', $dateParts);
            }

            if ($settings->show_time) {
                $parts[] = $currentTime->format('Hi'); // HHMM format
            }
        }

        $paddedNumber = str_pad($orderNumber, $settings->digits, '0', STR_PAD_LEFT);
        $parts[] = $paddedNumber;

        // Join all parts with separator
        return implode($settings->separator, $parts);
    }



    public function getShowFormattedOrderNumberAttribute()
    {

        if (!is_null($this->formatted_order_number)) {
            return $this->formatted_order_number;
        }

        return __('modules.order.orderNumber') . ' #' . $this->order_number;
    }

    public function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        if (!$lat1 || !$lng1 || !$lat2 || !$lng2) {
            return null;
        }

        $earthRadius = 6371; // kilometers
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return round($distance, 2);
    }

    public function getDeliveryDistanceKmAttribute()
    {
        $branch = $this->branch;
        if ($branch && $branch->lat && $branch->lng && $this->customer_lat && $this->customer_lng) {
            return $this->calculateDistance($branch->lat, $branch->lng, $this->customer_lat, $this->customer_lng);
        }

        return null;
    }

    public function getDeliveryDistanceFormattedAttribute()
    {
        $dist = $this->delivery_distance_km;
        if (is_null($dist)) {
            return null;
        }

        if ($dist < 1) {
            return round($dist * 1000) . ' m';
        }

        return round($dist, 1) . ' km';
    }

    public function getDeliveryLocationAttribute()
    {
        if (!empty($this->delivery_address)) {
            return $this->delivery_address;
        }

        if ($this->customer && !empty($this->customer->delivery_address)) {
            return $this->customer->delivery_address;
        }

        return $this->customer?->address ?? null;
    }

    public function kiosk(): ?BelongsTo
    {
        if (
            module_enabled('Kiosk') &&
            class_exists(\Modules\Kiosk\Entities\Kiosk::class)
        ) {
            return $this->belongsTo(\Modules\Kiosk\Entities\Kiosk::class);
        }

        return null;
    }

    /**
     * Relationship to POS Machine (MultiPOS Module)
     */
    public function posMachine()
    {
        if (module_enabled('MultiPOS')) {
            return $this->belongsTo(\Modules\MultiPOS\Entities\PosMachine::class, 'pos_machine_id');
        }
        
        return null;
    }
}

