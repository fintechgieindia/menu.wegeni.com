<?php

namespace Modules\Kiosk\Livewire\Kiosk;

use Livewire\Component;
use App\Models\MenuItem;

class OrderConfirmation extends Component
{
    public $restaurant;
    public $shopBranch;
    public $order;
    public $recommendedItems;

    public function mount($restaurant, $shopBranch, $order)
    {
        $this->restaurant = $restaurant;
        $this->shopBranch = $shopBranch;
        $this->order = $order;
        $this->recommendedItems = MenuItem::where('branch_id', $shopBranch->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('kiosk::livewire.kiosk.order-confirmation');
    }
}
