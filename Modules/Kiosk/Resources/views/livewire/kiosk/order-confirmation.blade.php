<div>

    <!-- 🟡 7. Order Confirmation -->
    <div  
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-full"
        class="min-h-screen flex items-center justify-center bg-white"
       >
        <div class="w-full max-w-2xl px-6 text-center">
            <!-- Success Animation -->
            <div class="mb-12">
                <div class="w-32 h-32 bg-skin-base rounded-full mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            
            <p class="text-xl font-medium text-skin-base mb-2">{{ __('kiosk::modules.confirmation.thank_you') }}</p>
            <h1 class="text-5xl font-bold text-gray-900 mb-6">{{ __('kiosk::modules.confirmation.title') }}</h1>
            <p class="text-2xl text-gray-600 mb-12">
                {{ __('kiosk::modules.confirmation.order_number_prefix') }}
                <span class="font-bold text-skin-base ml-2">{{ $order->show_formatted_order_number }}</span>
            </p>

            <!-- Order Details -->
            <div class="bg-white border border-gray-200 rounded-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('kiosk::modules.confirmation.order_details') }}</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="text-lg text-gray-600">{{ __('kiosk::modules.confirmation.order_type') }}</span>
                        <span class="font-bold text-lg text-gray-900" >{{ __('modules.order.' . $order->order_type) }}</span>
                    </div>
                    
                    @if ($order->order_type === 'dine_in' && $order->table)
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="text-lg text-gray-600">{{ __('kiosk::modules.confirmation.table_number') }}</span>
                        <span class="font-bold text-lg text-gray-900" >{{ $order->table->table_code }}</span>
                    </div>                        
                    @endif
                
                    @if ($order->order_type === 'pickup' && $order->pickup_date)
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="text-lg text-gray-600">{{ __('kiosk::modules.confirmation.estimated_pickup') }}</span>
                        <span class="font-bold text-lg text-gray-900" >{{ \Carbon\Carbon::parse($order->pickup_date)->timezone(timezone())->translatedFormat('M d, Y h:i A') }}</span>
                    </div>
                    @endif
                    
                    <!-- Items List -->
                    <div class="py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 mb-3 text-left">Items</h3>
                        <div class="space-y-2">
                            @foreach ($order->items as $item)
                                <div class="flex justify-between items-center text-left py-2">
                                    <div class="flex items-center gap-3">
                                        @if($item->menuItem)
                                            <div class="w-12 h-12 flex-shrink-0 rounded overflow-hidden bg-gray-100 border border-gray-200">
                                                <img src="{{ $item->menuItem->item_photo_url }}" alt="{{ $item->menuItem->item_name }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif
                                        <span class="text-lg text-gray-600">{{ $item->quantity }}x {{ $item->menuItem ? $item->menuItem->item_name : '--' }}</span>
                                    </div>
                                    <span class="font-bold text-lg text-gray-900">{{ currency_format($item->amount, $restaurant->currency_id) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between items-center py-3">
                        <span class="text-lg text-gray-600">{{ __('kiosk::modules.confirmation.total_amount') }}</span>
                        <span class="font-bold text-3xl text-skin-base">{{ currency_format($order->total, $restaurant->currency_id) }}</span>
                    </div>
                </div>
            </div>

            <!-- Recommended Items -->
            @if(isset($recommendedItems) && $recommendedItems->count() > 0)
            <div class="bg-white border border-gray-200 rounded-lg p-8 mb-8 text-left">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Recommended For You</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recommendedItems as $recItem)
                        <div class="border border-gray-200 rounded-xl overflow-hidden hover:border-skin-base transition-colors duration-200 bg-white shadow-sm flex flex-col">
                            <div class="relative h-40 w-full flex-shrink-0">
                                <img src="{{ $recItem->item_photo_url }}" alt="{{ $recItem->item_name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4 flex flex-col flex-1">
                                <h3 class="font-bold text-xl text-gray-900 mb-2 truncate">{{ $recItem->item_name }}</h3>
                                <div class="mt-auto">
                                    <span class="text-xl font-bold text-skin-base">{{ currency_format($recItem->price, $restaurant->currency_id) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Additional Information -->

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mb-4">
                <button type="button" onclick="window.print()"
                    class="flex-1 bg-white border-2 border-gray-300 text-gray-800 py-4 px-6 rounded-xl font-bold text-lg transition-all hover:bg-gray-50 flex items-center justify-center gap-2 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    <span>Print Receipt</span>
                </button>
                <a href="{{ route('kiosk.restaurant', $restaurant->hash).'?branch=' . $shopBranch->unique_hash }}"
                    class="flex-[2] bg-skin-base text-white py-4 px-8 rounded-xl font-bold text-xl transition-all hover:opacity-95 shadow-lg shadow-skin-base/25 flex items-center justify-center gap-2">
                    <span>{{ __('kiosk::modules.confirmation.start_new_order') }}</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>


</div>
