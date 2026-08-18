<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Package;
use App\Enums\PackageType;
use App\Models\Contact;
use App\Models\CustomMenu;
use App\Models\FrontDetail;
use App\Models\FrontFaq;
use App\Models\FrontFeature;
use App\Models\FrontReviewSetting;
use App\Models\LanguageSetting;
use App\Models\Restaurant;
use Froiden\Envato\Traits\AppBoot;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{

    use AppBoot;

    protected $language;

    public function __construct()
    {
        parent::__construct();

        $locale = session('customer_locale') ?? (global_setting()->locale ?? 'en');
        $languageSetting = LanguageSetting::where('language_code', $locale)->first();

        if (!$languageSetting) {
            $locale = 'en';
            $languageSetting = LanguageSetting::where('language_code', 'en')->first();
        }

        if (!session()->has('customer_is_rtl')) {
            session(['customer_is_rtl' => $languageSetting->is_rtl == 1]);
        }

        app()->setLocale($locale);
        $this->language = $locale;
    }

    public function changeLocale($locale)
    {
        // Validate if the locale exists in language settings
        $languageSetting = LanguageSetting::where('language_code', $locale)->first();

        // Set the customer locale in session
        session(['customer_locale' => $locale]);
        session(['customer_is_rtl' => $languageSetting->is_rtl == 1]);
        app()->setLocale($locale);
        $this->language = $locale;
        return redirect()->back()->with('success', 'Language changed successfully');
    }

    public function landing()
    {

        $this->showInstall();

        $global = global_setting();

        if ($global->disable_landing_site && !request()->ajax()) {
            return redirect(route('login'));
        }

        if ($global->landing_site_type == 'custom') {
            return response(file_get_contents($global->landing_site_url));
        }

        $this->modules = Module::pluck('name')->toArray();
        $this->PackageFeatures = Package::ADDITIONAL_FEATURES;

        $AllModulesWithFeature = array_merge(
            $this->modules,
            $this->PackageFeatures
        );

        $packages = Package::with('modules')
            ->where('package_type', '!=', PackageType::DEFAULT)
            ->where('package_type', '!=', PackageType::TRIAL)
            ->where('is_private', false)
            ->orderBy('sort_order', 'asc')
            ->get();

        $trialPackage = Package::where('package_type', PackageType::TRIAL)->first();
        $customMenu = CustomMenu::all();

        $monthlyPackages = Package::where('package_type', PackageType::STANDARD)->where('monthly_status', true)->where('is_private', false)->get();
        $annualPackages = Package::where('package_type', PackageType::STANDARD)->where('annual_status', true)->where('is_private', false)->get();
        $lifetimePackages = Package::where('package_type', PackageType::LIFETIME)->where('is_private', false)->get();
        $language = $this->language;

        $languageSetting = LanguageSetting::where('language_code', $language)->first();
        $languageId = $languageSetting ? $languageSetting->id : null;
        $frontDetails = FrontDetail::where('language_setting_id', $languageId)->first();
        $frontFeatures = FrontFeature::where('language_setting_id', $languageId)->get();
        $frontReviews = FrontReviewSetting::where('language_setting_id', $languageId)->get();
        $frontFaqs = FrontFaq::where('language_setting_id', $languageId)->get();
        $frontContact = Contact::where('language_setting_id', $languageId)->first();

        if ($global->landing_type == 'static') {
            return view('frontend.index', compact('packages', 'AllModulesWithFeature', 'trialPackage', 'monthlyPackages', 'annualPackages', 'lifetimePackages'));
        }

        return view('landing.dynamic-index', compact('packages', 'AllModulesWithFeature', 'trialPackage', 'monthlyPackages', 'annualPackages', 'lifetimePackages', 'customMenu', 'frontDetails', 'frontFeatures', 'frontReviews', 'frontFaqs', 'frontContact'));
    }

    public function signup()
    {
        if (global_setting()->disable_landing_site) {
            return view('auth.restaurant_register');
        }

        return view('auth.restaurant_signup');
    }

    public function customerLogout()
    {
        session()->flush();
        return redirect(module_enabled('Subdomain') ? url('/') : route('shop_restaurant', [request()->restaurant]));
    }

    public function manifest()
    {
        $hash = request()->query('hash', '');

        if (!empty($hash)) {
            $slug = 'restaurant/' . $hash . '/';
        } else {
            $slug = 'super-admin/';
        }

        $relativeUrl = urldecode(request()->query('url', ''));

        $superadminUrl1 = File::exists(public_path('user-uploads/favicons/super-admin/android-chrome-192x192.png')) ? asset('user-uploads/favicons/super-admin/android-chrome-192x192.png') : asset('img/192x192.png');
        $superadminUrl2 = File::exists(public_path('user-uploads/favicons/super-admin/android-chrome-512x512.png')) ? asset('user-uploads/favicons/super-admin/android-chrome-512x512.png') : asset('img/512x512.png');


        $firstimagePath = public_path('user-uploads/favicons/' . $slug . 'android-chrome-192x192.png');
        $secondimagePath = public_path('user-uploads/favicons/' . $slug . 'android-chrome-512x512.png');
        $firsticonUrl = File::exists($firstimagePath) ? asset('user-uploads/favicons/' . $slug . 'android-chrome-192x192.png') : $superadminUrl1;
        $secondiconUrl = File::exists($secondimagePath) ? asset('user-uploads/favicons/' . $slug . 'android-chrome-512x512.png') : $superadminUrl2;
        $globalSetting = global_setting();

        $restaurant = Restaurant::where('hash', $hash)->first();

        return response()->json([
            'name' => $restaurant ? $restaurant->name : $globalSetting->name,
            'short_name' => $restaurant ? $restaurant->name : $globalSetting->name,
            'description' => $restaurant ? $restaurant->name : $globalSetting->name,
            'start_url' => url($relativeUrl),
            'display' => 'standalone',
            'background_color' => '#ffffff',
            'theme_color' => '#000000',
            'icons' => [
                [
                    'src' => $firsticonUrl,
                    'sizes' => '192x192',
                    'type' => 'image/png'
                ],
                [
                    'src' => $secondiconUrl,
                    'sizes' => '512x512',
                    'type' => 'image/png'
                ]
            ]
        ]);
    }
    public function privacyPolicy()
    {
        $meta = [
            'title' => 'Privacy Policy | Geni Fast',
            'description' => 'Learn how Geni Fast collects, uses, and protects your personal and business information.',
            'keywords' => 'restaurant software privacy policy, data protection, Geni Fast privacy'
        ];
        return view('frontend.privacy-policy', compact('meta'));
    }
    public function features()
    {
        $meta = [
            'title' => 'Features | Geni Fast',
            'description' => 'Discover powerful features of Geni Fast ERP including POS billing, inventory control, staff management, reports, kitchen display, CRM, and delivery integrations.',
            'keywords' => 'restaurant ERP features, POS billing features, inventory management software, restaurant CRM, kitchen display system, multi-branch ERP, GST compliant restaurant software, restaurant analytics features, mobile POS features, online ordering integration'
        ];
        return view('frontend.features', compact('meta'));
    }
    public function aboutUs()
    {
        $meta = [
            'title' => 'About Us | Geni Fast',
            'description' => 'Learn more about Geni Fast ERP, our mission, and how we help restaurants in India simplify operations, boost sales, and deliver exceptional customer experiences.',
            'keywords' => 'about Geni Fast ERP, restaurant software company India, restaurant technology provider, restaurant management software, Geni ERP mission, restaurant POS solutions, restaurant ERP provider, India food industry software, restaurant automation solutions'
        ];
        return view('frontend.about', compact('meta'));
    }
    //  public function pricing()
// {
//     $categories = [
//         'dine-in'         => 'Dine-in Restaurants',
//         'takeaway'        => 'Takeaway Restaurants',
//         'qsr'             => 'Quick Service Restaurant (QSR)',
//         'canteen'         => 'Canteens (Office / College)',
//         'bakery'          => 'Bakeries / Cake Shops',
//         'sweet'           => 'Sweet Shops',
//         'bar'             => 'Bars & Breweries',
//         'pizza'           => 'Pizzerias',
//         'multi-cuisine'   => 'Multi-Cuisine Restaurants',
//         'all'             => 'All Plans',
//     ];

    //     $selectedCategory = request()->get('category', 'dine-in');

    //     $packages = Package::with('modules')
//         ->where('is_private', false)
//         ->where('package_type', '!=', PackageType::TRIAL)
//         ->when($selectedCategory !== 'all', function ($q) use ($selectedCategory) {
//             $q->where(function ($sub) use ($selectedCategory) {
//                 // Broad matching – உங்கள் package names-க்கு ஏற்ப adjust செய்யலாம்
//                 if ($selectedCategory === 'dine-in') {
//                     $sub->where('package_name', 'like', '%DINE%');
//                 } elseif ($selectedCategory === 'takeaway') {
//                     $sub->where('package_name', 'like', '%TAKEAWAY%')
//                         ->orWhere('package_name', 'like', '%TAKE%');
//                 } elseif ($selectedCategory === 'qsr') {
//                     $sub->where('package_name', 'like', '%QSR%')
//                         ->orWhere('package_name', 'like', '%COUNTER%')
//                         ->orWhere('package_name', 'like', '%STANDARD CANTEEN%')
//                         ->orWhere('package_name', 'like', '%SMART CANTEEN%');
//                 } elseif ($selectedCategory === 'canteen') {
//                     $sub->where('package_name', 'like', '%CANTEEN%');
//                 } elseif ($selectedCategory === 'bakery') {
//                     $sub->where('package_name', 'like', '%BAKERY%');
//                 } elseif ($selectedCategory === 'sweet') {
//                     $sub->where('package_name', 'like', '%SWEET%');
//                 } elseif ($selectedCategory === 'bar') {
//                     $sub->where('package_name', 'like', '%BAR%');
//                 } elseif ($selectedCategory === 'pizza') {
//                     $sub->where('package_name', 'like', '%PIZZA%');
//                 } elseif ($selectedCategory === 'multi-cuisine') {
//                     $sub->where('package_name', 'like', '%MULTI%');
//                 }
//             });
//         })
//         ->orderBy('id', 'asc')  // sort_order இல்லை என்றால் id வைத்து sort
//         ->get();

    //     // Debug (தேவைப்படும்போது uncomment)
//     // if ($packages->isEmpty()) {
//     //     dd("No packages found for category: " . $selectedCategory, $packages->toArray());
//     // }

    //     $allModules = Module::pluck('name')->toArray() ?? [];
//     $additionalFeatures = Package::ADDITIONAL_FEATURES ?? [];
//     $AllModulesWithFeature = collect(array_merge($allModules, $additionalFeatures))
//         ->unique()
//         ->values()
//         ->map(fn($name, $i) => (object)['id' => $i + 1, 'name' => $name]);

    //     return view('frontend.pricingpage', compact(
//         'packages',
//         'AllModulesWithFeature',
//         'categories',
//         'selectedCategory'
//     ));
// }


    public function pricing()
    {
        // Category list with display names
        $categories = [
            'dine-in' => 'Dine-in Restaurants',
            'takeaway' => 'Takeaway Restaurants',
            'qsr' => 'Quick Service Restaurant (QSR)',
            'beverage-snack' => 'Refreshment & Snack Shops',
            'canteen' => 'Canteens (Office / College)',
            'bakery' => 'Bakeries / Cake Shops',
            'sweet' => 'Sweet Shops',
            'bar' => 'Bars & Breweries',
            'pizza' => 'Pizzerias',
            'multi-cuisine' => 'Multi-Cuisine Restaurants',
        ];

        // Selected category from URL (?category=...)
        $selectedCategory = request()->get('category', 'dine-in');
        if (!array_key_exists($selectedCategory, $categories)) {
            $selectedCategory = 'dine-in';
        }

        // Billing cycle toggle: monthly or yearly
        $billingCycle = request()->get('billing', 'monthly');
        if (!in_array($billingCycle, ['monthly', 'yearly'])) {
            $billingCycle = 'monthly';
        }

        // Column name we'll use for filtering
        $name = 'package_name';

        // Main package query
        $packages = Package::with('modules')
            ->where('is_private', false)
            ->where('package_type', '!=', PackageType::TRIAL)
            ->when($selectedCategory !== 'all', function ($query) use ($selectedCategory, $name) {
                $query->where(function ($sub) use ($selectedCategory, $name) {
                    if ($selectedCategory === 'dine-in') {
                        $sub->where($name, 'like', '%DINE%');
                    } elseif ($selectedCategory === 'takeaway') {
                        $sub->where($name, 'like', '%TAKEAWAY%')
                            ->orWhere($name, 'like', '%TAKE%');
                    } elseif ($selectedCategory === 'qsr') {
                        // Stricter QSR: classic counter / QSR plans — exclude beverage/snack keywords
                        $sub->where(function ($q) use ($name) {
                            $q->where($name, 'like', '%QSR%');
                        })->whereNot(function ($q) use ($name) {
                            // Prevent juice/ice/chaat/tea from appearing here
                            $q->where($name, 'like', '%JUICE%')
                                ->orWhere($name, 'like', '%ICE%')
                                ->orWhere($name, 'like', '%CREAM%')
                                ->orWhere($name, 'like', '%CHAAT%')
                                ->orWhere($name, 'like', '%TEA%')
                                ->orWhere($name, 'like', '%COFFEE%')
                                ->orWhere($name, 'like', '%BEVERAGE%')
                                ->orWhere($name, 'like', '%SNACK%');
                        });
                    } elseif ($selectedCategory === 'beverage-snack') {
                        // Juice, Ice Cream, Chaat, Tea, Beverage counters
                        $sub->where(function ($q) use ($name) {
                            $q->where($name, 'like', '%JUICE%')
                                ->orWhere($name, 'like', '%ICE CREAM%')
                                ->orWhere($name, 'like', '%ICE-CREAM%')
                                ->orWhere($name, 'like', '%CHAAT%')
                                ->orWhere($name, 'like', '%TEA%')
                                ->orWhere($name, 'like', '%COFFEE%')
                                ->orWhere($name, 'like', '%BEVERAGE%')
                                ->orWhere($name, 'like', '%SNACK%')
                                ->orWhere($name, 'like', '%COUNTER%'); // allow if named "Juice Counter" etc.
                        });
                    } elseif ($selectedCategory === 'canteen') {
                        $sub->where($name, 'like', '%CANTEEN%');
                    } elseif ($selectedCategory === 'bakery') {
                        $sub->where($name, 'like', '%BAKERY%');
                    } elseif ($selectedCategory === 'sweet') {
                        $sub->where($name, 'like', '%SWEET%');
                    } elseif ($selectedCategory === 'bar') {
                        $sub->where($name, 'like', '%BAR%');
                    } elseif ($selectedCategory === 'pizza') {
                        $sub->where($name, 'like', '%PIZZA%');
                    } elseif ($selectedCategory === 'multi-cuisine') {
                        $sub->where($name, 'like', '%MULTI%');
                    }
                });
            })
            // Sorting - use sort_order if the column exists, otherwise fallback to id
            ->orderBy(
                \Schema::hasColumn('packages', 'sort_order') ? 'sort_order' : 'id',
                'asc'
            )
            ->get();

        // Prepare modules/features list for comparison table
        $allModules = Module::pluck('name')->toArray() ?? [];
        $additionalFeatures = Package::ADDITIONAL_FEATURES ?? [];
        $AllModulesWithFeature = collect(array_merge($allModules, $additionalFeatures))
            ->unique()
            ->values()
            ->map(function ($name, $index) {
                return (object) [
                    'id' => $index + 1,
                    'name' => $name
                ];
            });

        // Pass data to view
        return view('frontend.pricingpage', compact(
            'packages',
            'AllModulesWithFeature',
            'categories',
            'selectedCategory',
            'billingCycle'
        ));
    }
    public function contact()
    {
        $meta = [
            'title' => 'Contact Us | Geni Fast',
            'description' => 'Get in touch with Geni Fast ERP team for sales, support, or partnership inquiries. We help restaurants in India manage their business efficiently.',
            'keywords' => 'contact Geni Fast ERP, restaurant software support India, ERP sales inquiry, POS software India contact, restaurant ERP helpline, restaurant technology support, Geni ERP email, Geni ERP phone number, India restaurant software company contact'
        ];
        return view('frontend.contact', compact('meta'));
    }

    public function termsConditions()
    {
        $meta = [
            'title' => 'Terms & Conditions | Geni Fast',
            'description' => 'Read the terms and conditions for using Geni Fast’s billing and management software.',
            'keywords' => 'Geni Fast terms and conditions, software usage terms'
        ];
        return view('frontend.terms-conditions', compact('meta'));
    }

    public function termsOfUse()
    {
        $meta = [
            'title' => 'Terms of Use | Geni Fast',
            'description' => 'Understand the terms of use for Geni Fast’s software and services.',
            'keywords' => 'restaurant software terms of use, Geni Fast policy'
        ];
        return view('frontend.terms-of-use', compact('meta'));
    }

    public function compliance()
    {
        $meta = [
            'title' => 'Compliance Statement | Geni Fast',
            'description' => 'Geni Fast complies with industry standards and regulations to ensure data security and privacy.',
            'keywords' => 'restaurant software compliance, data protection policy'
        ];
        return view('frontend.compliance', compact('meta'));
    }

    public function cancellationRefundPolicy()
    {
        $meta = [
            'title' => 'Cancellation & Refund Policy | Geni Fast',
            'description' => 'Review Geni Fast’s policy for cancellations, refunds, and subscription changes.',
            'keywords' => 'restaurant software refund policy, Geni Fast cancellations'
        ];
        return view('frontend.cancellation-refund-policy', compact('meta'));
    }

    // Package model-ல accessor
    public function getCategorySlugAttribute()
    {
        $name = strtolower($this->package_name);

        if (str_contains($name, 'dine') || str_contains($name, 'dine-in'))
            return 'dine-in';
        if (str_contains($name, 'takeaway'))
            return 'takeaway';
        if (str_contains($name, 'canteen'))
            return 'canteen';
        if (str_contains($name, 'bakery'))
            return 'bakery';
        if (str_contains($name, 'sweet'))
            return 'sweet';
        if (str_contains($name, 'bar'))
            return 'bar';
        if (str_contains($name, 'pizza'))
            return 'pizza';
        if (str_contains($name, 'multi-cuisine'))
            return 'multi-cuisine';
        if (str_contains($name, 'qsr') || str_contains($name, 'counter'))
            return 'qsr';

        return 'others';
    }
}




