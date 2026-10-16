<?php

namespace App\Models;

use App\Traits\HasBranch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BaseModel;

class DeliveryExecutive extends BaseModel
{
    use HasBranch;

    protected $guarded = ['id'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class)->orderBy('id', 'desc');
    }

    public function deliveryOrders(): HasMany
    {
        return $this->hasMany(Order::class)->where('order_type', 'delivery')->orderBy('id', 'desc');
    }

    public function getTotalDeliveryFeesAttribute()
    {
        return $this->orders()->sum('delivery_fee');
    }

    public function getTotalOrdersAmountAttribute()
    {
        return $this->orders()->sum('total');
    }
}

