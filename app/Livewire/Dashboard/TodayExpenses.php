<?php

namespace App\Livewire\Dashboard;

use App\Models\Expenses;
use Carbon\Carbon;
use Livewire\Component;

class TodayExpenses extends Component
{
    public $expenseCount;
    public $percentChange;
    
    public function mount()
    {
        $tz = timezone();

        $start = Carbon::now($tz)->startOfDay()->setTimezone($tz)->toDateTimeString();
        $end = Carbon::now($tz)->endOfDay()->setTimezone($tz)->toDateTimeString();
        
        $this->expenseCount = Expenses::whereDate('expense_date', '>=', $start)
            ->whereDate('expense_date', '<=', $end)
            ->sum('amount');
        
        $yesterdayStart = Carbon::now($tz)->subDay()->startOfDay()->setTimezone($tz)->toDateTimeString();
        $yesterdayEnd = Carbon::now($tz)->subDay()->endOfDay()->setTimezone($tz)->toDateTimeString();
        
        $yesterdayCount = Expenses::whereDate('expense_date', '>=', $yesterdayStart)
            ->whereDate('expense_date', '<=', $yesterdayEnd)
            ->sum('amount');

        $expenseDifference = ($this->expenseCount - $yesterdayCount);

        $this->percentChange  = (($expenseDifference / ($yesterdayCount == 0 ? 1 : $yesterdayCount)) * 100);

    }

    public function render()
    {
        return view('livewire.dashboard.today-expenses');
    }
}
