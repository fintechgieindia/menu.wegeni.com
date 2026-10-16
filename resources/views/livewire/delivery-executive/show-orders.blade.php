<div>
    <div class="bg-white block sm:flex items-center justify-between dark:bg-gray-800 dark:border-gray-700 mb-4">
        <div class="inline-flex gap-4 items-center">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $customer->name }}</h1>

            <span class='text-xs h-fit font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400 border border-gray-400'>
                    {{ $customer->orders->count() }} @lang('menu.orders')
            </span>
        </div>
        @if($customer->phone)
            <div class="text-sm text-gray-600 dark:text-gray-300 font-medium">
                📞 {{ $customer->phone }}
            </div>
        @endif
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-4">
        <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
            <span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold">@lang('modules.order.totalOrder')</span>
            <p class="text-lg font-bold text-gray-900 dark:text-white mt-0.5">{{ $customer->orders->count() }}</p>
        </div>
        <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg border border-emerald-200 dark:border-emerald-800">
            <span class="text-xs text-emerald-600 dark:text-emerald-400 uppercase font-semibold">@lang('modules.delivery.totalDeliveryFees')</span>
            <p class="text-lg font-bold text-emerald-700 dark:text-emerald-300 mt-0.5">{{ currency_format($customer->orders->sum('delivery_fee'), restaurant()->currency_id) }}</p>
        </div>
        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
            <span class="text-xs text-blue-600 dark:text-blue-400 uppercase font-semibold">@lang('modules.order.totalAmount')</span>
            <p class="text-lg font-bold text-blue-700 dark:text-blue-300 mt-0.5">{{ currency_format($customer->orders->sum('total'), restaurant()->currency_id) }}</p>
        </div>
    </div>

    <div class="flex flex-col">

        <!-- Card Section -->
        <div class="space-y-4">
            <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                @foreach ($customer->orders as $item)
                    <x-order.order-card :order='$item' wire:key='order-{{ $item->id . microtime() }}' />
                @endforeach
            </div>
        </div>
        <!-- End Card Section -->


    </div>
</div>
