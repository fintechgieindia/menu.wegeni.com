<div>
    <!-- 🟡 3. Menu Browsing Screen -->
    <div x-show="currentScreen === 'menu'" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-init="() => {
                window.addEventListener('showCart', (cartCount) => {
                    console.log('cartUpdated');
                    showCart = true
                })
            }" class="min-h-screen flex flex-col lg:flex-row relative"
        style="background: #ffffff; font-family: 'Plus Jakarta Sans', sans-serif;">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

            .menu-page { font-family: 'Plus Jakarta Sans', sans-serif; }
            .menu-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
            .menu-page ::-webkit-scrollbar { width: 4px; height: 4px; }
            .menu-page ::-webkit-scrollbar-track { background: transparent; }
            .menu-page ::-webkit-scrollbar-thumb { background: #d0ccc5; border-radius: 99px; }

            .cat-btn {
                background: #f8f6f2;
                color: #5a5650;
                border: 1px solid #e5e0d8;
                padding: 10px 22px;
                border-radius: 99px;
                font-size: 13px;
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-weight: 600;
                letter-spacing: 0.01em;
                white-space: nowrap;
                flex-shrink: 0;
                transition: all 0.2s ease;
                cursor: pointer;
            }
            .cat-btn:hover { border-color: #876039; color: #876039; }
            .cat-btn.active { background: #876039; color: #ffffff; border-color: #876039; }

            .menu-card {
                background: #ffffff;
                border: 1px solid #e5e0d8;
                border-radius: 16px;
                overflow: hidden;
                transition: all 0.25s ease;
                cursor: pointer;
            }
            .menu-card:hover {
                border-color: #876039;
                transform: translateY(-4px);
                box-shadow: 0 12px 30px rgba(135, 96, 57, 0.12);
            }
            .menu-card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                display: block;
                transition: transform 0.4s ease;
            }
            .menu-card:hover img { transform: scale(1.04); }

            .select-btn {
                width: 100%;
                background: #876039;
                color: #ffffff;
                border: none;
                padding: 12px;
                border-radius: 10px;
                font-size: 13px;
                font-weight: 600;
                font-family: 'Plus Jakarta Sans', sans-serif;
                letter-spacing: 0.02em;
                text-transform: uppercase;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            .select-btn:hover { background: #6e4e2d; }

            .search-input {
                width: 100%;
                background: #f8f6f2;
                border: 1px solid #e5e0d8;
                border-radius: 12px;
                padding: 14px 16px 14px 46px;
                color: #1a1915;
                font-size: 15px;
                font-family: 'Plus Jakarta Sans', sans-serif;
                outline: none;
                box-sizing: border-box;
                transition: all 0.2s;
            }
            .search-input::placeholder { color: #a09a90; }
            .search-input:focus {
                background: #ffffff;
                border-color: #876039;
                box-shadow: 0 0 0 4px rgba(135, 96, 57, 0.08);
            }

            .cart-sidebar {
                background: #ffffff;
                border-left: 1px solid #e5e0d8;
                box-shadow: -10px 0 30px rgba(0,0,0,0.03);
            }

            .cart-item {
                background: #fdfcfb;
                border: 1px solid #e5e0d8;
                border-radius: 12px;
                padding: 14px;
                transition: all 0.2s;
            }
            .cart-item:hover { border-color: #876039; background: #ffffff; }

            .qty-btn {
                width: 28px;
                height: 28px;
                border-radius: 50%;
                border: 1px solid #e5e0d8;
                background: #ffffff;
                color: #5a5650;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.15s;
            }
            .qty-btn:hover { border-color: #876039; color: #876039; background: #fdf6f0; }

            .checkout-btn {
                width: 100%;
                background: #876039;
                color: #ffffff;
                border: none;
                padding: 15px;
                border-radius: 12px;
                font-size: 14px;
                font-weight: 700;
                font-family: 'Plus Jakarta Sans', sans-serif;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                cursor: pointer;
                transition: all 0.2s;
            }
            .checkout-btn:hover { background: #6e4e2d; transform: translateY(-1px); }
            .checkout-btn:disabled { opacity: 0.35; cursor: not-allowed; }

            .ad-slide { border-radius: 16px; overflow: hidden; position: relative; }
            .ad-dot { width: 6px; height: 6px; border-radius: 99px; transition: all 0.2s; border: none; cursor: pointer; }

            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-behavior: smooth; }

            .price-tag {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-weight: 700;
                color: #876039;
                font-size: 17px;
            }
            .price-from-label {
                font-size: 10px;
                font-weight: 500;
                color: #a09a90;
                font-family: 'Plus Jakarta Sans', sans-serif;
                display: block;
                margin-bottom: 1px;
                text-transform: uppercase;
                letter-spacing: 0.04em;
            }
            .item-name {
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: #1a1915;
                font-weight: 700;
                font-size: 16px;
                line-height: 1.3;
            }
            .item-desc {
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: #6a6660;
                font-size: 12px;
                line-height: 1.5;
            }
        </style>

        <!-- Main Content -->
        <div class="flex-1 menu-page" style="padding: 28px 28px 80px;">

            <!-- Header -->
            <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;">
                <div>
                <div style="display:flex;align-items:center;gap:16px;margin-bottom:8px;">
                    <button @click="currentScreen = 'order-type'" 
                        style="background:#f8f6f2;border:1px solid #e5e0d8;border-radius:12px;padding:10px;cursor:pointer;color:#876039;transition:all 0.2s;display:flex;align-items:center;justify-content:center;"
                        onmouseenter="this.style.borderColor='#876039';this.style.background='#fdf6f0'"
                        onmouseleave="this.style.borderColor='#e5e0d8';this.style.background='#f8f6f2'">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <h1 class="menu-heading" style="font-size:32px;font-weight:800;color:#1a1915;margin:0;">
                        {{ __('kiosk::modules.menu.title') }}
                    </h1>
                </div>
                    <p style="color:#6a6660;font-size:14px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:500;margin:0;"
                        x-text="orderType === 'dine_in' ? '{{ __('kiosk::modules.menu.order_type.dine_in') }}' : (orderType === 'pickup' ? '{{ __('kiosk::modules.menu.order_type.pickup') }}' : '{{ __('kiosk::modules.menu.order_type.delivery') }}')">
                    </p>
                </div>

                <!-- Cart Button -->
                <button @click="showCart = true"
                    style="position:relative;background:#ffffff;border:1px solid #e5e0d8;border-radius:14px;padding:14px 18px;cursor:pointer;transition:all 0.2s;display:flex;align-items:center;gap:10px;"
                    onmouseenter="this.style.borderColor='#876039';this.style.background='#fdf6f0'"
                    onmouseleave="this.style.borderColor='#e5e0d8';this.style.background='#ffffff'">
                    <svg style="width:20px;height:20px;" fill="none" stroke="#876039" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @if ($cartCount > 0)
                        <span style="background:#876039;color:#ffffff;font-size:11px;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;border-radius:99px;padding:2px 8px;min-width:20px;text-align:center;">{{ $cartCount }}</span>
                    @endif
                </button>
            </div>

            <!-- Search -->
            <div style="position:relative;margin-bottom:28px;">
                <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);width:18px;height:18px;pointer-events:none;"
                    fill="none" stroke="#a09a90" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="search" class="search-input"
                    placeholder="{{ __('kiosk::modules.menu.search_placeholder') }}">
            </div>

            @if ($kioskAds->count() > 0)
                <div style="margin-bottom:32px;" x-data="{
                    currentSlide: 0, isTransitioning: false,
                    changeSlide(index) {
                        if (this.isTransitioning) return;
                        this.isTransitioning = true;
                        this.currentSlide = index;
                        setTimeout(() => this.isTransitioning = false, 300);
                    }
                }">
                    <div class="ad-slide" style="height:200px;position:relative;">
                        @foreach ($kioskAds as $ad)
                            <div x-show="currentSlide === {{ $loop->index }}"
                                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                style="position:absolute;inset:0;">
                                <img src="{{ $ad->image_url }}" alt="{{ $ad->heading }}"
                                    style="width:100%;height:100%;object-fit:cover;display:block;">
                                <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.6) 0%,rgba(0,0,0,0) 50%);"></div>
                                <div style="position:absolute;bottom:0;left:0;right:0;padding:20px 24px;">
                                    <h2 class="menu-heading" style="color:#ffffff;font-size:20px;font-weight:700;margin:0 0 4px;">{{ $ad->heading }}</h2>
                                    <p style="color:rgba(255,255,255,0.9);font-size:12px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:500;margin:0;">{{ $ad->description }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div style="position:absolute;bottom:16px;right:20px;display:flex;gap:6px;z-index:10;">
                            @foreach ($kioskAds as $ad)
                                <button @click="changeSlide({{ $loop->index }})" class="ad-dot"
                                    :style="currentSlide === {{ $loop->index }} ? 'background:#ffffff;width:18px;' : 'background:rgba(255,255,255,0.4);'">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Categories -->
            <div style="margin-bottom:32px;">
                <div style="display:flex;gap:10px;overflow-x:auto;padding-bottom:4px;" class="scrollbar-hide">
                    <button class="cat-btn {{ is_null($selectedCategory) ? 'active' : '' }}"
                        wire:click="selectCategory(null)">
                        {{ __('kiosk::modules.menu.all') }}
                    </button>
                    @foreach ($categoryList as $category)
                        <button class="cat-btn {{ $selectedCategory === $category->id ? 'active' : '' }}"
                            wire:click="selectCategory({{ $category->id }})">
                            {{ $category->category_name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Menu Grid -->
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px;">
                @foreach ($menuItems as $item)
                    @php
                        // Price display logic:
                        // If item has price > 0, show it directly.
                        // If price = 0, try to get minimum variation price and show "from ₹X"
                        $displayPrice = $item->price;
                        $isFromPrice = false;

                        if (($displayPrice == 0 || $displayPrice === null)) {
                            try {
                                $variations = $item->variations ?? collect();
                                $minVarPrice = $variations->where('price', '>', 0)->min('price');
                                if ($minVarPrice > 0) {
                                    $displayPrice = $minVarPrice;
                                    $isFromPrice = true;
                                }
                            } catch (\Exception $e) {
                                // fallback: keep 0
                            }
                        }
                    @endphp

                    <div class="menu-card" wire:key="menu-item-{{ $item->id . microtime() }}">
                        <div style="overflow:hidden;">
                            <img src="{{ $item->item_photo_url }}" alt="{{ $item->item_name }}">
                        </div>
                        <div style="padding:16px 18px 18px;">
                            <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;margin-bottom:6px;">
                                <h3 class="item-name">{{ $item->getTranslatedValue('item_name', session('locale')) }}</h3>
                                <div style="text-align:right;flex-shrink:0;">
                                    @if($isFromPrice)
                                        <span class="price-from-label">from</span>
                                    @endif
                                    <span class="price-tag">{{ currency_format($displayPrice, $restaurant->currency_id) }}</span>
                                </div>
                            </div>
                            <p class="item-desc" style="margin-bottom:16px;">
                                {{ $item->getTranslatedValue('description', session('locale')) }}</p>
                            <button wire:click="showItem({{ $item->id }})" @click="selectItem()" class="select-btn">
                                {{ __('kiosk::modules.menu.select_item') }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Cart Sidebar -->
        <div x-show="showCart" x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full"
            class="cart-sidebar menu-page lg:w-96 w-full lg:relative fixed bottom-0 left-0 right-0 lg:h-auto h-[62vh] z-50 lg:rounded-none rounded-t-2xl"
            style="display:flex;flex-direction:column;padding:24px;">

            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
                <h2 class="menu-heading" style="color:#1a1915;font-size:20px;font-weight:700;margin:0;">
                    {{ __('kiosk::modules.menu.your_order') }}
                </h2>
                <button @click="showCart = false"
                    style="background:transparent;border:1px solid #e5e0d8;border-radius:8px;padding:7px;cursor:pointer;color:#a09a90;transition:all 0.2s;"
                    onmouseenter="this.style.borderColor='#876039';this.style.color='#876039'"
                    onmouseleave="this.style.borderColor='#e5e0d8';this.style.color='#a09a90'">
                    <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Cart Items -->
            <div style="flex:1;overflow-y:auto;display:flex;flex-direction:column;gap:10px;margin-bottom:20px;" class="scrollbar-hide">
                @foreach ($cartItemList['items'] as $item)
                    <div class="cart-item">
                        <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:10px;margin-bottom:10px;">
                            <div style="flex:1;">
                                <h3 style="color:#1a1915;font-size:14px;font-weight:600;font-family:'Plus Jakarta Sans',sans-serif;margin:0 0 4px;">
                                    {{ $item['menu_item']['name'] }}</h3>

                                @if(!empty($item['variation']))
                                    <span style="display:inline-block;background:#fdf6f0;color:#876039;font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;font-family:'Plus Jakarta Sans',sans-serif;border:1px solid #f0e0d0;">{{ $item['variation']['name'] }}</span>
                                @endif

                                @if(!empty($item['modifiers']) && count($item['modifiers']) > 0)
                                    <div style="margin-top:6px;">
                                        @foreach($item['modifiers'] as $modifier)
                                            <div style="display:flex;justify-content:space-between;font-size:11px;color:#6a6660;font-family:'Plus Jakarta Sans',sans-serif;font-weight:500;">
                                                <span>+ {{ $modifier['name'] }}</span>
                                                <span>{{ currency_format($modifier['price'], $restaurant->currency_id) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div style="margin-top:4px;">
                                    @if($taxMode === 'item' && !empty($item['tax_amount']) && $item['tax_amount'] > 0)
                                        <p style="font-size:13px;color:#876039;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;margin:0;">
                                            {{ currency_format($item['display_price'], $restaurant->currency_id) }}</p>
                                        @if(!empty($item['tax_breakup']) && count($item['tax_breakup']) > 0)
                                            <div style="font-size:11px;color:#6a6660;font-family:'Plus Jakarta Sans',sans-serif;margin-top:2px;">
                                                @foreach($item['tax_breakup'] as $taxName => $taxInfo)
                                                    <span>{{ $taxName }}: {{ currency_format($taxInfo['amount'], $restaurant->currency_id) }}</span>
                                                    @if(!$loop->last) <span style="margin:0 3px;">·</span> @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    @else
                                        <p style="font-size:13px;color:#876039;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;margin:0;">
                                            {{ currency_format($item['price'], $restaurant->currency_id) }}</p>
                                    @endif
                                </div>
                            </div>

                            <button wire:click="removeFromCart({{ $item['id'] }})"
                                style="background:transparent;border:none;cursor:pointer;padding:2px;color:#a09a90;transition:color 0.15s;"
                                onmouseenter="this.style.color='#e05050'" onmouseleave="this.style.color='#a09a90'">
                                <svg style="width:16px;height:16px;" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>

                        <div style="display:flex;align-items:center;gap:12px;">
                            <button wire:click="updateQuantity({{ $item['id'] }}, -1)" class="qty-btn">
                                <svg style="width:12px;height:12px;" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <span style="color:#1a1915;font-size:14px;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;min-width:20px;text-align:center;">{{ $item['quantity'] }}</span>
                            <button wire:click="updateQuantity({{ $item['id'] }}, 1)" class="qty-btn">
                                <svg style="width:12px;height:12px;" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Order Summary -->
            <div style="border-top:1px solid #e5e0d8;padding-top:16px;">
                <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                    <span style="color:#6a6660;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;">{{ __('kiosk::modules.menu.subtotal') }}</span>
                    <span style="color:#1a1915;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;">{{ currency_format($subtotal, $restaurant->currency_id) }}</span>
                </div>

                @if($totalTaxAmount > 0)
                    @if($taxMode === 'order' && !empty($taxBreakdown))
                        @foreach($taxBreakdown as $taxName => $taxInfo)
                            <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                                <span style="color:#6a6660;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $taxName }} ({{ number_format($taxInfo['percent'], 2) }}%)</span>
                                <span style="color:#1a1915;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;">{{ currency_format($taxInfo['amount'], $restaurant->currency_id) }}</span>
                            </div>
                        @endforeach
                    @else
                        @if(!empty($taxBreakdown))
                            @foreach($taxBreakdown as $taxName => $taxInfo)
                                <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                                    <span style="color:#6a6660;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;">{{ $taxName }} ({{ number_format($taxInfo['percent'], 2) }}%)</span>
                                    <span style="color:#1a1915;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;">{{ currency_format($taxInfo['amount'], $restaurant->currency_id) }}</span>
                                </div>
                            @endforeach
                        @else
                            <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                                <span style="color:#6a6660;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;">{{ __('kiosk::modules.menu.tax') }}</span>
                                <span style="color:#1a1915;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;">{{ currency_format($totalTaxAmount, $restaurant->currency_id) }}</span>
                            </div>
                        @endif
                    @endif
                @endif

                <div style="display:flex;justify-content:space-between;margin-bottom:20px;padding-top:10px;border-top:1px solid #e5e0d8;margin-top:6px;">
                    <span style="color:#6a6660;font-size:14px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;">{{ __('kiosk::modules.menu.total') }}</span>
                    <span class="menu-heading" style="color:#876039;font-size:22px;font-weight:800;">{{ currency_format($total, $restaurant->currency_id) }}</span>
                </div>

                <button @click="proceedToCheckout" type="button" {{ ($cartCount == 0) ? 'disabled' : '' }}
                    class="checkout-btn">
                    {{ __('kiosk::modules.menu.proceed_to_checkout') }}
                </button>
            </div>
        </div>
    </div>
</div>