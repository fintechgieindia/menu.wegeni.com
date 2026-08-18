<div>
    <h1 class="text-xl font-semibold text-gray-900 sm:text-xl dark:text-white my-2">{{ __('Today\'s Expenses List') }}</h1>

    <div class="grid grid-cols-1 gap-3 sm:gap-4">
        @forelse ($expenses as $expense)
             <div class="border font-medium bg-white shadow-sm rounded-lg hover:shadow-md transition dark:bg-gray-700 dark:border-gray-600 p-4 dark:text-gray-400">
                <div class="flex justify-between w-full">
                    <div class="flex-1 w-full space-y-1">
                        <div class="flex justify-between items-center text-sm">
                            <span class="font-bold text-gray-900 dark:text-white">{{ Str::title($expense->expense_title) }}</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ currency_format($expense->amount, restaurant()->currency_id) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>{{ optional($expense->category)->name ?? '--' }}</span>
                            <span>@lang('modules.expenses.methods.' . $expense->payment_method)</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="group flex justify-center gap-3 items-center border h-36 font-medium bg-white shadow-sm rounded-lg hover:shadow-md transition dark:bg-gray-700 dark:border-gray-600 p-3 dark:text-gray-400">
               {{ __('No expenses added for today.') }}
            </div>
        @endforelse
    </div>
</div>
