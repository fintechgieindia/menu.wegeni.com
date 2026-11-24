<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$gs = App\Models\GlobalSetting::first();
foreach (['upload_fav_icon_android_chrome_192', 'upload_fav_icon_android_chrome_512', 'upload_fav_icon_apple_touch_icon', 'upload_favicon_16', 'upload_favicon_32', 'favicon'] as $name) {
    $val = $gs->$name;
    $path = public_path('user-uploads/' . $gs->getFaviconBasePath() . $val);
    echo $name . ": val=" . var_export($val, true) . ", file_exists=" . var_export(file_exists($path), true) . PHP_EOL;
}
