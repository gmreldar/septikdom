<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contact = Cache::rememberForever('contact', function () {
            return Contact::find(1);
        });
        $menuProductCategories = Cache::rememberForever('menuProductCategories', function () {
            return ProductCategory::getMenu();
        });

        View::share('contact', $contact);
        View::share('menuProductCategories', $menuProductCategories);
        View::share('defaultOGImage', $this->getDefaultOGImage());
    }

    private function getDefaultOGImage()
    {
        $url = asset('/uploads/images/logo.png');
        return '<meta property="og:image" content="' . $url . '">';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
