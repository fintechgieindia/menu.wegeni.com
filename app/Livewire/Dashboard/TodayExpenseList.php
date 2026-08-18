<?php

namespace App\Livewire\Dashboard;

use App\Models\Expenses;
use Carbon\Carbon;
use Livewire\Component;

class TodayExpenseList extends Component
{
    protected $listeners = ['refreshExpenses' => '$refresh'];

    public function render()
    {
        $tz = timezone();
        
        $start = Carbon::now($tz)->startOfDay()->setTimezone($tz)->toDateTimeString();
        $end = Carbon::now($tz)->endOfDay()->setTimezone($tz)->toDateTimeString();

        $expenses = Expenses::with('category')
            ->orderBy('id', 'desc')
            ->whereDate('expense_date', '>=', $start)
            ->whereDate('expense_date', '<=', $end)
            ->get();

        return view('livewire.dashboard.today-expense-list', [
            'expenses' => $expenses
        ]);
    }
}
