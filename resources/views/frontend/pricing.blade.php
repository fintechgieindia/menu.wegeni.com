

<style>
    /* ── Reset & Base ─────────────────────────────────── */
    .pricing-wrap * { box-sizing: border-box; }

    /* ── Outer container ─────────────────────────────── */
    .pricing-wrap {
        max-width: 1183px;
        margin: 0 auto 2rem;
        padding: 0 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* ── Grid layout ─────────────────────────────────── */
    .pricing-table {
        display: flex;
        gap: 0;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid #E5E7EB;
        background: #fff;
    }

    /* ── Feature label column ────────────────────────── */
    .pricing-col-labels {
        flex: 0 0 220px;
        min-width: 180px;
        background: #FAFAFA;
        border-right: 1px solid #E5E7EB;
    }

    /* ── Package columns ─────────────────────────────── */
    .pricing-col-pkg {
        flex: 1 1 0;
        border-right: 1px solid #E5E7EB;
        background: #fff;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    .pricing-col-pkg:last-child { border-right: none; }

    /* ── Popular / Premium highlight ─────────────────── */
    .pricing-col-pkg.is-popular {
        background: #fff;
        border-right: 1px solid #E5E7EB;
    }
    .popular-bar {
        height: 4px;
        background: #876039;
        width: 100%;
    }

    /* ── Column header ───────────────────────────────── */
    .pricing-col-head {
        padding: 1.5rem 1.25rem 1.25rem;
        border-bottom: 1px solid #E5E7EB;
        min-height: 235px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .pricing-col-labels .pricing-col-head {
        min-height: 235px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding-bottom: 1.25rem;
    }

    .pkg-name {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #876039;
        margin: 0 0 0.35rem;
    }
    .pkg-price {
        font-size: 1.9rem;
        font-weight: 700;
        color: #1F2937;
        line-height: 1;
        margin: 0.1rem 0 0;
    }
    .pkg-price sup {
        font-size: 0.9rem;
        font-weight: 400;
        color: #9CA3AF;
        vertical-align: super;
    }
    .pkg-cycle {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin: 0.3rem 0 0;
    }

    /* ── CTA button ──────────────────────────────────── */
    .pkg-cta {
        display: block;
        margin-top: 1rem;
        padding: 0.55rem 0;
        border-radius: 8px;
        border: 1.5px solid #876039;
        background: transparent;
        color: #876039;
        font-size: 0.8rem;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        width: 100%;
    }
    .pkg-cta:hover {
        background: #876039;
        color: #fff;
    }
    .is-popular .pkg-cta {
        background: #876039;
        color: #fff;
    }
    .is-popular .pkg-cta:hover {
        background: #6b4e2d;
    }

    /* ── Popular badge ───────────────────────────────── */
    .popular-badge {
        display: inline-block;
        background: #FFF3E0;
        color: #876039;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        padding: 3px 9px;
        border-radius: 20px;
        text-transform: uppercase;
        margin-bottom: 0.4rem;
        width: fit-content;
    }

    /* ── Feature label section heading ───────────────── */
    .label-head-text {
        font-size: 0.85rem;
        font-weight: 600;
        color: #374151;
        line-height: 1.3;
        padding: 0 1.25rem;
    }
    .label-head-sub {
        font-size: 0.72rem;
        color: #9CA3AF;
        margin-top: 0.2rem;
        padding: 0 1.25rem 0.75rem;
    }

    /* ── Feature rows ────────────────────────────────── */
    .pricing-row {
        display: contents;
    }
    .pricing-row-inner {
        display: flex;
        width: 100%;
    }

    /* Each cell inside a column */
    .pricing-cell {
        display: flex;
        align-items: center;
        min-height: 48px;
        padding: 0 1.25rem;
        border-bottom: 1px solid #F3F4F6;
        font-size: 0.82rem;
        color: #374151;
    }
    .pricing-cell:last-child { border-bottom: none; }

    .pricing-cell.center { justify-content: center; }
    .pricing-cell.label-cell { background: #FAFAFA; }

    /* ── Alternating row tint ────────────────────────── */
    .pricing-col-labels .pricing-cell:nth-child(odd),
    .pricing-col-pkg .pricing-cell:nth-child(odd) {
        background: #FAFAFA;
    }
    .pricing-col-labels .pricing-cell:nth-child(even),
    .pricing-col-pkg .pricing-cell:nth-child(even) {
        background: #fff;
    }

    /* ── Check / X icons ─────────────────────────────── */
    .icon-check, .icon-x {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-check {
        background: #F0FDF4;
    }
    .icon-check svg { color: #16A34A; }
    .icon-x {
        background: #FEF2F2;
    }
    .icon-x svg { color: #9CA3AF; }

    /* ── Show more button ────────────────────────────── */
    .show-more-wrap {
        text-align: center;
        padding: 1.25rem 0 0.5rem;
    }
    .btn-show-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.5rem 1.5rem;
        border: 1.5px solid #876039;
        border-radius: 8px;
        background: transparent;
        color: #876039;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s, color 0.15s;
    }
    .btn-show-more:hover {
        background: #876039;
        color: #fff;
    }

    /* ── Mobile: hide desktop table, show cards ──────── */
    @media (max-width: 767px) {
        .pricing-wrap .pricing-desktop { display: none; }
        .pricing-wrap .pricing-mobile  { display: block; }
    }
    @media (min-width: 768px) {
        .pricing-wrap .pricing-desktop { display: block; }
        .pricing-wrap .pricing-mobile  { display: none; }
    }

    /* ── Mobile card layout ───────────────────────────── */
    .mobile-cards {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .mobile-card {
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        overflow: hidden;
        background: #fff;
    }
    .mobile-card-head {
        padding: 1.25rem;
        border-bottom: 1px solid #E5E7EB;
        background: #FAFAFA;
    }
    .mobile-card.is-popular .mobile-card-head {
        background: #FFF8F3;
        border-top: 3px solid #876039;
    }
    .mobile-card-body { padding: 0; }
    .mobile-feature-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.65rem 1.25rem;
        border-bottom: 1px solid #F3F4F6;
        font-size: 0.82rem;
        color: #374151;
    }
    .mobile-feature-row:last-child { border-bottom: none; }
    .mobile-feature-row:nth-child(odd) { background: #FAFAFA; }
    .mobile-feature-row.hidden { display: none; }
</style>

<section class="pricing-wrap mb-5">

    {{-- DESKTOP TABLE --}}
    <div class="pricing-desktop">
        <div class="pricing-table">

            {{-- Label column --}}
            <div class="pricing-col-labels">
                <div class="pricing-col-head">
                    <div>
                        <div class="label-head-text">Key Features</div>
                        <div class="label-head-sub">Compare our plans side by side</div>
                    </div>
                </div>
                @foreach($modules as $index => $module)
                    <div class="pricing-cell label-cell feature-item {{ $index >= 10 ? 'hidden' : '' }}">
                        {{ $module->name }}
                    </div>
                @endforeach
            </div>

            {{-- Package columns --}}
            @foreach($packages as $package)
                <div class="pricing-col-pkg {{ str_contains(strtolower($package->package_name), 'premium') ? 'is-popular' : '' }}">
                    @if(str_contains(strtolower($package->package_name), 'premium'))
                        <div class="popular-bar"></div>
                    @endif

                    <div class="pricing-col-head">
                        <div>
                            @if(str_contains(strtolower($package->package_name), 'premium'))
                                <div class="popular-badge">&#x1F525; Popular</div>
                            @endif

                            <div class="pkg-name">{{ $package->package_name }}</div>

                            {{-- YEARLY / MONTHLY PRICE LOGIC --}}
                            @if($billingCycle === 'yearly' && !empty($package->annual_price) && $package->annual_price > 0)
                                <div class="pkg-price">
                                    {{ global_currency_format($package->annual_price, $package->currency_id ?? 1) }}<sup>*</sup>
                                </div>
                                <div class="pkg-cycle">Pay Yearly</div>
                                @if($package->monthly_price)
                                    <div class="text-xs text-green-600 mt-1">
                                        Save {{ round(100 - ($package->annual_price / ($package->monthly_price * 12) * 100)) }}%
                                    </div>
                                @endif
                            @elseif($package->package_type == \App\Enums\PackageType::LIFETIME)
                                <div class="pkg-price">{{ global_currency_format($package->price, $package->currency_id ?? 1) }}<sup>*</sup></div>
                                <div class="pkg-cycle">{{ __('modules.package.payOnce') }}</div>
                            @else
                                <div class="pkg-price">
                                    {{ global_currency_format($package->monthly_price ?? 0, $package->currency_id ?? 1) }}<sup>*</sup>
                                </div>
                                <div class="pkg-cycle">Pay Monthly</div>
                            @endif
                        </div>

                        <a href="https://wa.me/918667205661" class="pkg-cta">
                            @lang('landing.getStarted')
                        </a>
                    </div>

                    @foreach($modules as $index => $module)
                        <div class="pricing-cell center feature-item {{ $index >= 10 ? 'hidden' : '' }}">
                            @if($package->hasModule($module->id))
                                <div class="icon-check">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                    </svg>
                                </div>
                            @else
                                <div class="icon-x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        @if(count($modules) > 10)
            <div class="show-more-wrap">
                <button id="showMoreBtn" class="btn-show-more">
                    Show more features
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </button>
            </div>
        @endif
    </div>

    {{-- MOBILE CARDS --}}
    <div class="pricing-mobile">
        <div class="mobile-cards">
            @foreach($packages as $package)
                <div class="mobile-card {{ str_contains(strtolower($package->package_name), 'premium') ? 'is-popular' : '' }}">
                    <div class="mobile-card-head">
                        @if(str_contains(strtolower($package->package_name), 'premium'))
                            <div class="popular-badge" style="margin-bottom:0.5rem">&#x1F525; Popular</div>
                        @endif

                        <div class="pkg-name">{{ $package->package_name }}</div>

                        {{-- YEARLY / MONTHLY PRICE LOGIC (MOBILE) --}}
                        @if($billingCycle === 'yearly' && !empty($package->annual_price) && $package->annual_price > 0)
                            <div class="pkg-price" style="margin:0.25rem 0">
                                {{ global_currency_format($package->annual_price, $package->currency_id ?? 1) }}<sup style="font-size:0.85rem;color:#9CA3AF">*</sup>
                            </div>
                            <div class="pkg-cycle">Pay Yearly</div>
                        @elseif($package->package_type == \App\Enums\PackageType::LIFETIME)
                            <div class="pkg-price" style="margin:0.25rem 0">
                                {{ global_currency_format($package->price, $package->currency_id ?? 1) }}<sup style="font-size:0.85rem;color:#9CA3AF">*</sup>
                            </div>
                            <div class="pkg-cycle">{{ __('modules.package.payOnce') }}</div>
                        @else
                            <div class="pkg-price" style="margin:0.25rem 0">
                                {{ global_currency_format($package->monthly_price ?? 0, $package->currency_id ?? 1) }}<sup style="font-size:0.85rem;color:#9CA3AF">*</sup>
                            </div>
                            <div class="pkg-cycle">Pay Monthly</div>
                        @endif

                        <a href="https://wa.me/918667205661" class="pkg-cta" style="margin-top:0.75rem">
                            @lang('landing.getStarted')
                        </a>
                    </div>

                    <div class="mobile-card-body">
                        @foreach($modules as $index => $module)
                            <div class="mobile-feature-row {{ $index >= 10 ? 'hidden feature-item' : '' }}">
                                <span>{{ $module->name }}</span>
                                @if($package->hasModule($module->id))
                                    <div class="icon-check">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 16 16">
                                            <path fill="#16A34A" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </div>
                                @else
                                    <div class="icon-x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 16 16">
                                            <path fill="#9CA3AF" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        @if(count($modules) > 10)
                            <div style="text-align:center;padding:1rem">
                                <button class="btn-show-more-mobile btn-show-more">Show more</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>

<script>
// உங்கள் பழைய show more script அதே போல
document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('showMoreBtn');
    if (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.feature-item').forEach(function (el) {
                el.classList.remove('hidden');
            });
            btn.closest('.show-more-wrap').style.display = 'none';
        });
    }

    document.querySelectorAll('.btn-show-more-mobile').forEach(function (mBtn) {
        mBtn.addEventListener('click', function () {
            var card = mBtn.closest('.mobile-card');
            card.querySelectorAll('.feature-item').forEach(function (el) {
                el.classList.remove('hidden');
            });
            mBtn.closest('div').style.display = 'none';
        });
    });
});
</script>