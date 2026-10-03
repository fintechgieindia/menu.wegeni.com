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

        // Always serve the new Geni Menu homepage design
        return view('frontend.index', compact('packages', 'AllModulesWithFeature', 'trialPackage', 'monthlyPackages', 'annualPackages', 'lifetimePackages'));
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
    public function howItWorks()
    {
        $meta = [
            'title' => 'How Geni Menu Works | Restaurant Workflow Connected',
            'description' => 'See how Geni Menu connects your restaurant operations from digital menus and orders to kitchen KOT, billing, and reporting in one seamless workflow.',
            'keywords' => 'restaurant workflow software, how restaurant POS works, KOT workflow, restaurant connected operations, Geni Menu how it works'
        ];
        return view('frontend.how-it-works', compact('meta'));
    }
    public function faqHelp()
    {
        $meta = [
            'title' => 'FAQ & Help | Geni Menu Support Center',
            'description' => 'Find answers to common questions, explore setup guidance, and get help with your Geni Menu restaurant management platform.',
            'keywords' => 'restaurant software FAQ, Geni Menu support, POS help center, restaurant setup guide, KOT troubleshooting'
        ];
        return view('frontend.faq-help', compact('meta'));
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
    public function menuManagement()
    {
        $meta = [
            'title' => 'Menu Management — Geni Menu | WeGeni',
            'description' => 'Create, organize and manage your restaurant menu from one simple dashboard. Update dishes, categories, prices, and availability instantly with Geni Menu.',
            'keywords' => 'restaurant menu management, digital menu software, QR code menu, restaurant menu editor, menu availability control, price management, Geni Menu, WeGeni'
        ];
        return view('frontend.menu-management', compact('meta'));
    }
    public function reservationManagement()
    {
        $meta = [
            'title' => 'Reservation Management — Geni Menu | WeGeni',
            'description' => 'Manage restaurant reservations, guest details, table allocation and booking status from one simple dashboard with Geni Menu.',
            'keywords' => 'restaurant reservation software, table booking system, restaurant table allocation, guest reservation software, table status tracking, Geni Menu, WeGeni'
        ];
        return view('frontend.reservation-management', compact('meta'));
    }
    public function waiterRequest()
    {
        $meta = [
            'title' => 'Waiter Requests — Geni Menu | WeGeni',
            'description' => 'Let restaurant guests send table-side requests to staff instantly. Track, respond and complete waiter requests from one connected dashboard with Geni Menu.',
            'keywords' => 'waiter request software, restaurant table service, guest request management, restaurant service management, table request system, Geni Menu, WeGeni'
        ];
        return view('frontend.waiter-request', compact('meta'));
    }
    public function posManagement()
    {
        $meta = [
            'title' => 'POS Management — Geni Menu | WeGeni',
            'description' => 'Faster Billing. Smoother Restaurant Operations. Manage orders, bills, payments and restaurant transactions from one connected POS with Geni Menu.',
            'keywords' => 'restaurant POS management, restaurant billing software, restaurant POS system, order billing software, restaurant table billing, POS transaction software, Geni Menu, WeGeni'
        ];
        return view('frontend.pos-management', compact('meta'));
    }
    public function tableManagement()
    {
        $meta = [
            'title' => 'Table Management — Geni Menu | WeGeni',
            'description' => 'Know Every Table. Manage Every Seat. Visualize your restaurant floor plan, track table availability, and manage guest seating with Geni Menu.',
            'keywords' => 'restaurant table management, restaurant floor plan software, table availability tracking, restaurant seating software, table occupancy management, Geni Menu, WeGeni'
        ];
        return view('frontend.table-management', compact('meta'));
    }
    public function orderManagement()
    {
        $meta = [
            'title' => 'Order Management — Geni Menu | WeGeni',
            'description' => 'Every Order. Clear From Start to Finish. Manage dine-in, takeaway, pickup and delivery orders from one connected workspace with Geni Menu.',
            'keywords' => 'restaurant order management, dine-in order tracking, takeaway order software, delivery order management, kitchen order tracking, Geni Menu, WeGeni'
        ];
        return view('frontend.order-management', compact('meta'));
    }
    public function kotManagement()
    {
        $meta = [
            'title' => 'KOT Management — Geni Menu | WeGeni',
            'description' => 'From Order to Kitchen. Without the Confusion. Send clear kitchen order tickets from floor to kitchen team with Geni Menu.',
            'keywords' => 'KOT management, kitchen order ticket software, restaurant kitchen display, KOT routing, kitchen order tracking, chef order display, Geni Menu, WeGeni'
        ];
        return view('frontend.kot-management', compact('meta'));
    }
    public function inventoryManagement()
    {
        $meta = [
            'title' => 'Inventory Management — Geni Menu | WeGeni',
            'description' => 'Know What You Have. Know What You Need. Track ingredients, monitor stock levels, manage purchases and stock adjustments with Geni Menu.',
            'keywords' => 'restaurant inventory management, ingredient tracking software, stock level monitoring, food business inventory, restaurant purchasing software, Geni Menu, WeGeni'
        ];
        return view('frontend.inventory-management', compact('meta'));
    }
    public function reports()
    {
        $meta = [
            'title' => 'Restaurant Reports & Analytics — Geni Menu | WeGeni',
            'description' => 'Turn Restaurant Data Into Better Decisions. Track sales, order volume, payment methods, category performance and dining activity with Geni Menu Reports.',
            'keywords' => 'restaurant reports, restaurant analytics, sales reporting software, restaurant POS reports, menu performance analysis, restaurant business intelligence, Geni Menu, WeGeni'
        ];
        return view('frontend.reports', compact('meta'));
    }
    public function familyRestaurantSolution()
    {
        $meta = [
            'title' => 'Family Restaurant Management Software | Geni Menu',
            'description' => 'Manage menus, tables, orders, kitchen operations, billing and reports with Geni Menu — a connected restaurant management platform for family restaurants.',
            'keywords' => 'Family Restaurant Management Software, Restaurant Management Software, Family Restaurant POS, Family Restaurant Software, Restaurant Billing Software, Restaurant Order Management, Restaurant Table Management, Restaurant KOT Management, Restaurant Inventory Management, Digital Menu for Restaurants, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.family-restaurant', compact('meta'));
    }
    public function dineInRestaurantSolution()
    {
        $meta = [
            'title' => 'Dine-in Restaurant Management Software | Geni Menu',
            'description' => 'Deliver a Better Dine-in Experience. From Table to Payment. Manage tables, digital menus, dine-in orders, KOT, kitchen operations, billing and reports with Geni Menu.',
            'keywords' => 'Dine-in Restaurant Management Software, Dine-in Restaurant Software, Restaurant Management Software, Restaurant POS, Restaurant Table Management, Restaurant Order Management, Restaurant KOT Software, Digital Menu for Restaurants, Restaurant Billing Software, Dine-in POS Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.dine-in-restaurant', compact('meta'));
    }
    public function multiCuisineRestaurantSolution()
    {
        $meta = [
            'title' => 'Multi-Cuisine Restaurant Management Software | Geni Menu',
            'description' => 'One Restaurant. Many Cuisines. One Connected Platform. Manage diverse menus, tables, orders, KOTs, kitchen stations, POS billing, inventory and reports for multi-cuisine restaurants with Geni Menu.',
            'keywords' => 'Multi-Cuisine Restaurant Management Software, Multi-Cuisine Restaurant Software, Restaurant Management Software, Multi-Cuisine POS, Restaurant Table Management, Multi-Cuisine KOT Software, Digital Menu for Restaurants, Restaurant Billing Software, Multi-Cuisine Inventory, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.multi-cuisine-restaurant', compact('meta'));
    }
    public function qsrRestaurantSolution()
    {
        $meta = [
            'title' => 'Quick Service Restaurant (QSR) Management Software | Geni Menu',
            'description' => 'Fast Service. Smooth Operations. Happier Customers. Manage high-volume orders, digital menus, fast KOTs, POS billing, inventory and reports for QSRs and fast food outlets with Geni Menu.',
            'keywords' => 'Quick Service Restaurant Management Software, QSR Software, Fast Food Restaurant POS, QSR Billing Software, QSR KOT System, Fast Food Order Management, QSR Inventory Software, Digital Menu for QSR, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.quick-service-restaurant', compact('meta'));
    }

    public function takeawayRestaurantSolution()
    {
        $meta = [
            'title' => 'Takeaway Restaurant Management Software | Geni Menu',
            'description' => 'Make Every Takeaway Order Fast, Simple & Organized. Manage takeaway menus, orders, KOTs, kitchen operations, pickup, billing, inventory and reports with Geni Menu.',
            'keywords' => 'Takeaway Restaurant Management Software, Takeaway Software, Takeaway POS, Pickup Management System, Counter Order POS, Takeaway KOT System, Takeaway Billing Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.takeaway-restaurants', compact('meta'));
    }

    public function collegeCanteenSolution()
    {
        $meta = [
            'title' => 'College Canteen Management Software | Geni Menu',
            'description' => 'Smarter Canteen Operations. Better Student Experience. Manage college canteen menus, food orders, multi-counter operations, KOTs, kitchen preparation, POS billing, inventory and daily analytics with Geni Menu.',
            'keywords' => 'College Canteen Management Software, Campus Cafeteria Software, University Food Service Software, Student Canteen POS, College Food Ordering System, Canteen KOT Software, Canteen Billing Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.college-canteen', compact('meta'));
    }

    public function officeCanteenSolution()
    {
        $meta = [
            'title' => 'Office Canteen Management Software | Geni Menu',
            'description' => 'Smarter Office Canteen Operations. Better Employee Experience. Manage office canteen menus, employee food orders, corporate cafeteria counters, KOTs, kitchen operations, billing, inventory and reports with Geni Menu.',
            'keywords' => 'Office Canteen Management Software, Corporate Cafeteria Software, Workplace Food Service Software, Employee Canteen POS, Office Food Ordering System, Corporate KOT System, Office Canteen Billing Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.office-canteen', compact('meta'));
    }

    public function sweetShopSolution()
    {
        $meta = [
            'title' => 'Sweet Shop Management Software | Geni Menu',
            'description' => 'Manage sweet shop products, orders, billing, customers, inventory and reports with Geni Menu. Built for modern sweet shops and multi-branch sweet businesses.',
            'keywords' => 'Sweet Shop Management Software, Mithai Shop Software, Sweet Store POS, Indian Sweet Shop Billing Software, Bakery and Sweet Shop Management, Weight Based Billing Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.sweet-shop', compact('meta'));
    }

    public function bakerySolution()
    {
        $meta = [
            'title' => 'Bakery & Cake Shop Management Software | Geni Menu',
            'description' => 'Manage your bakery products, cakes, custom cake orders, billing, inventory, and daily operations from one connected platform built for modern bakeries and cake shops.',
            'keywords' => 'Bakery Management Software, Cake Shop POS, Bakery Billing Software, Custom Cake Order Management, Cake Shop Inventory Software, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.bakery', compact('meta'));
    }

    public function juiceAndSnacksSolution()
    {
        $meta = [
            'title' => 'Juice & Snack Shop Management Software | Geni Menu',
            'description' => 'Manage your drinks, desserts, snacks, customer orders, billing, inventory and daily operations from one connected platform built for juice shops, ice cream parlours, chaat and tea shops.',
            'keywords' => 'Juice Shop POS, Ice Cream Parlour Software, Chaat Shop Billing, Tea Shop Management, Snack Shop Software, Restaurant POS, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.juice-and-snacks', compact('meta'));
    }

    public function barsAndBreweriesSolution()
    {
        $meta = [
            'title' => 'Bars & Breweries Management Software | Geni Menu',
            'description' => 'Manage menus, table service, orders, billing, payments, inventory and daily operations from one connected platform built for modern bars, pubs and breweries.',
            'keywords' => 'Bar Management Software, Brewery POS, Pub Management System, Restobar Software, Restaurant Table Management, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.bars-and-breweries', compact('meta'));
    }

    public function pizzeriasSolution()
    {
        $meta = [
            'title' => 'Pizzeria & Specialty Food Shop Management | Geni Menu',
            'description' => 'Manage your signature products, customer orders, billing, kitchen workflow, inventory and business reports from one connected platform built for pizzerias, burger shops, and specialty cafes.',
            'keywords' => 'Pizzeria Software, Burger Shop POS, Specialty Food Shop Management, Fast Food POS, Restaurant Management, Geni Menu, WeGeni'
        ];
        return view('frontend.solutions.pizzerias', compact('meta'));
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




