<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$gs = App\Models\GlobalSetting::first();
echo "GS logo: " . var_export($gs->logo, true) . PHP_EOL;
echo "GS logo_url: " . $gs->logo_url . PHP_EOL;
echo "GS name: " . var_export($gs->name, true) . PHP_EOL;
echo "public/img/logo.png exists: " . var_export(file_exists(public_path('img/logo.png')), true) . PHP_EOL;
if ($gs->logo) {
    echo "user-uploads/logo/" . $gs->logo . " exists: " . var_export(file_exists(public_path('user-uploads/logo/' . $gs->logo)), true) . PHP_EOL;
}
echo "storage link check: " . var_export(file_exists(public_path('user-uploads')), true) . PHP_EOL;
