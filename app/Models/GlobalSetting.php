<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BaseModel;

class GlobalSetting extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];

    const FAVICON_BASE_PATH_GLOBAL = 'favicons/super-admin/';

    const FAVICONS = [
        'upload_fav_icon_android_chrome_192' => [
            'name' => 'android-chrome-192x192.png',
            'width' => 192,
            'height' => 192
        ],
        'upload_fav_icon_android_chrome_512' => [
            'name' => 'android-chrome-512x512.png',
            'width' => 512,
            'height' => 512
        ],
        'upload_fav_icon_apple_touch_icon' => [
            'name' => 'apple-touch-icon.png',
            'width' => 180,
            'height' => 180
        ],
        'upload_favicon_16' => [
            'name' => 'favicon-16x16.png',
            'width' => 16,
            'height' => 16
        ],
        'upload_favicon_32' => [
            'name' => 'favicon-32x32.png',
            'width' => 32,
            'height' => 32
        ],
        'favicon' => [
            'name' => 'favicon.ico',
            'width' => 32,
            'height' => 32
        ],
    ];

    public function getFaviconBasePath(): string
    {
        return self::FAVICON_BASE_PATH_GLOBAL;
    }

    protected $appends = [
        'logo_url',
    ];

    protected $casts = [
        'purchased_on' => 'datetime',
        'supported_until' => 'datetime',
        'last_license_verified_at' => 'datetime',
        'last_cron_run' => 'datetime',
    ];

    public function logoUrl(): Attribute
    {
        return Attribute::get(function (): string {
            if ($this->logo) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/logo/' . $this->logo);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3('logo/' . $this->logo);
                }
            }
            return asset('img/logo.png');
        });
    }

    public function defaultCurrency(): BelongsTo
    {
        return $this->belongsTo(GlobalCurrency::class, 'default_currency_id');
    }


    /**
     * Get URL for Android Chrome 192x192 favicon
     * Returns custom favicon if available, otherwise falls back to default
     */
    public function uploadFavIconAndroidChrome192Url(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->upload_fav_icon_android_chrome_192) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->upload_fav_icon_android_chrome_192);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->upload_fav_icon_android_chrome_192);
                }
            }
            return asset('img/favicons/android-chrome-192x192.png');
        });
    }

    /**
     * Get URL for Android Chrome 512x512 favicon
     * Returns custom favicon if available, otherwise falls back to default
     */
    public function uploadFavIconAndroidChrome512Url(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->upload_fav_icon_android_chrome_512) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->upload_fav_icon_android_chrome_512);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->upload_fav_icon_android_chrome_512);
                }
            }
            return asset('img/favicons/android-chrome-512x512.png');
        });
    }

    /**
     * Get URL for Apple Touch Icon (180x180)
     * Returns custom icon if available, otherwise falls back to default
     */
    public function uploadFavIconAppleTouchIconUrl(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->upload_fav_icon_apple_touch_icon) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->upload_fav_icon_apple_touch_icon);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->upload_fav_icon_apple_touch_icon);
                }
            }
            return asset('img/favicons/apple-touch-icon.png');
        });
    }

    /**
     * Get URL for 16x16 favicon
     * Returns custom favicon if available, otherwise falls back to default
     */
    public function uploadFavIcon16Url(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->upload_favicon_16) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->upload_favicon_16);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->upload_favicon_16);
                }
            }
            return asset('img/favicons/favicon-16x16.png');
        });
    }

    public function uploadFavicon16Url(): Attribute
    {
        return $this->uploadFavIcon16Url();
    }

    /**
     * Get URL for 32x32 favicon
     * Returns custom favicon if available, otherwise falls back to default
     */
    public function uploadFavIcon32Url(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->upload_favicon_32) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->upload_favicon_32);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->upload_favicon_32);
                }
            }
            return asset('img/favicons/favicon-32x32.png');
        });
    }

    public function uploadFavicon32Url(): Attribute
    {
        return $this->uploadFavIcon32Url();
    }

    /**
     * Get URL for main favicon.ico file
     * Returns custom favicon if available, otherwise falls back to default
     */
    public function faviconUrl(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->favicon) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->favicon);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->favicon);
                }
            }
            return asset('img/favicons/favicon.ico');
        });
    }

    /**
     * Get URL for site webmanifest file
     * Returns custom webmanifest if available, otherwise falls back to default
     */
    public function webmanifestUrl(): Attribute
    {
        return Attribute::get(function (): string {
            $basePath = $this->getFaviconBasePath();
            if ($this->webmanifest) {
                $localPath = public_path(\App\Helper\Files::UPLOAD_FOLDER . '/' . $basePath . $this->webmanifest);
                if (file_exists($localPath) || in_array(config('filesystems.default'), \App\Models\StorageSetting::S3_COMPATIBLE_STORAGE)) {
                    return asset_url_local_s3($basePath . $this->webmanifest);
                }
            }
            return asset('img/favicons/site.webmanifest');
        });
    }
}
