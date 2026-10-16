<?php

namespace App\Livewire;

use Livewire\Component;

class ShopNavigation extends Component
{

    public $restaurant;
    public $shopBranch;
    public $table = null;
    public $showWaiterButtonCheck = true;

    public function mount()
    {
        $this->getTableFromRequest();
        $this->showWaiterButtonCheck = !isset($this->restaurant->is_waiter_request_enabled) || (bool) $this->restaurant->is_waiter_request_enabled;
    }

    public function getTableFromRequest()
    {
        $tableHash = request()->route('hash');
        if ($tableHash) {
            $this->table = \App\Models\Table::where('hash', $tableHash)->first();
        }

        if (!$this->table && request()->filled('table')) {
            $this->table = \App\Models\Table::where('hash', request('table'))->first();
        }
    }

    private function getPackageModules($restaurant)
    {
        if (!$restaurant || !$restaurant->package) {
            return [];
        }

        $modules = $restaurant->package->modules->pluck('name')->toArray();
        $additionalFeatures = json_decode($restaurant->package->additional_features ?? '[]', true);

        return array_merge($modules, $additionalFeatures);
    }

    public function render()
    {
        $modules = $this->getPackageModules($this->restaurant);
        return view('livewire.shop-navigation', ['modules' => $modules]);
    }


}
