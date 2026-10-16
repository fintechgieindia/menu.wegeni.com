<div class="my-6">
    <!-- 🟡 4. Item Customization Screen -->
    <div x-show="currentScreen === 'item-customization'"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-full"
        class="min-h-screen flex items-center justify-center bg-gray-50/50 py-8">
        <div class="w-full max-w-2xl px-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <button @click="currentScreen = 'menu'"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-100 font-semibold text-sm transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>{{ __('kiosk::modules.customisation.back_to_menu') }}</span>
                </button>
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">{{ __('kiosk::modules.customisation.customize_item') }}</h1>
                <div class="w-20"></div>
            </div>

            <!-- Item Details Card -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-6 shadow-sm">
                <div class="flex items-center space-x-5">
                    <img src="{{ $item->item_photo_url }}" alt="{{ $item->getTranslatedValue('item_name', session('locale')) }}" class="w-24 h-24 rounded-xl object-cover shadow-sm border border-gray-100">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold text-gray-900 leading-tight mb-1">{{ $item->getTranslatedValue('item_name', session('locale')) }}</h2>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-2">{{ $item->getTranslatedValue('description', session('locale')) }}</p>
                        <span class="inline-block px-3 py-1 bg-skin-base/10 text-skin-base font-extrabold text-lg rounded-lg">
                            {{ currency_format($item->price, $restaurant->currency_id) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Customization Options -->
            <div class="space-y-6">
                <!-- Size/Variants -->
                @if($item->load('variations')->variations->count() > 0)
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-skin-base"></span>
                        Select Variant
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($item->variations as $variation)
                            <button wire:click="selectVariant({{ $variation->id }})"
                                    wire:key="var-{{ $variation->id }}"
                                    type="button"
                                    @class([
                                        'p-4 rounded-xl font-medium transition-all text-left flex items-center justify-between border-2',
                                        'border-skin-base bg-skin-base/5 shadow-sm' => $selectedVariant === $variation->id,
                                        'border-gray-200 hover:border-gray-300 bg-white' => $selectedVariant !== $variation->id
                                    ])>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">{{ $variation->variation ?? $variation->name }}</div>
                                    <div class="text-xs text-skin-base font-bold mt-0.5">{{ currency_format($variation->price, $restaurant->currency_id) }}</div>
                                </div>
                                <div @class([
                                    'w-5 h-5 rounded-full border-2 flex items-center justify-center',
                                    'border-skin-base bg-skin-base text-white' => $selectedVariant === $variation->id,
                                    'border-gray-300' => $selectedVariant !== $variation->id
                                ])>
                                    @if($selectedVariant === $variation->id)
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    @endif
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
                @endif

                @foreach ($item->load('modifierGroups', 'modifierGroups.options')->modifierGroups as $modifier)
                <!-- Add-ons -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-skin-base"></span>
                        {{ $modifier->name }}
                    </h3>
                    <div class="space-y-2.5">
                        @foreach ($modifier->options as $option)
                        <label class="flex items-center justify-between p-3.5 border border-gray-200 rounded-xl hover:bg-gray-50/80 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                @if ($option->is_available)
                                <input type="checkbox" wire:model="selectedModifiers.{{ $option->id }}" wire:click="toggleSelection({{ $modifier->id }}, {{ $option->id }})" value="{{ $option->id }}"
                                    class="w-5 h-5 text-skin-base border-gray-300 rounded focus:ring-skin-base">
                                @else
                                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-red-100 text-red-800">
                                    @lang('modules.menu.notAvailable')
                                </span>
                                @endif
                                <div>
                                    <div class="font-semibold text-gray-900 text-sm">{{ $option->name }}</div>
                                    <div class="text-xs text-skin-base font-medium">{{ $option->price ? currency_format($option->price, $item->branch->restaurant->currency_id) : __('app.free') }}</div>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <!-- Quantity -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-base font-bold text-gray-900 mb-4 text-center">{{ __('kiosk::modules.customisation.quantity') }}</h3>
                    <div class="flex items-center justify-center space-x-6">
                        <button wire:click="decreaseQuantity()"
                                type="button"
                                class="w-12 h-12 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl flex items-center justify-center transition-all active:scale-95 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"/>
                            </svg>
                        </button>
                        <span class="text-3xl font-extrabold text-gray-900 min-w-12 text-center">{{ $quantity }}</span>
                        <button wire:click="increaseQuantity()"
                                type="button"
                                class="w-12 h-12 bg-skin-base text-white rounded-xl flex items-center justify-center transition-all hover:opacity-90 active:scale-95 shadow-md shadow-skin-base/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Total Price -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-5 text-white shadow-md flex justify-between items-center">
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold block">{{ __('kiosk::modules.customisation.total_price') }}</span>
                        <span class="text-2xl font-extrabold text-white">{{ currency_format($totalPrice, $restaurant->currency_id) }}</span>
                    </div>
                    <div class="text-xs text-gray-400">
                        {{ $quantity }} {{ $quantity > 1 ? 'items' : 'item' }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-2">
                    <button @click="currentScreen = 'menu'"
                            type="button"
                            class="flex-1 py-4 px-6 border-2 border-gray-300 text-gray-700 font-bold text-base rounded-xl hover:bg-gray-100 transition-all text-center">
                        {{ __('kiosk::modules.customisation.cancel') }}
                    </button>
                    <button wire:click="addToCartFromCustomization" @click="currentScreen = 'menu'"
                            type="button"
                            class="flex-[2] py-4 px-6 bg-skin-base text-white font-bold text-base rounded-xl hover:opacity-95 transition-all text-center shadow-lg shadow-skin-base/25 active:scale-[0.99]">
                        {{ __('kiosk::modules.customisation.add_to_cart') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

