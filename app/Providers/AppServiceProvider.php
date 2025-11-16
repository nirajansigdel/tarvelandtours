<?php

namespace App\Providers;

use App\Models\About;
use App\Models\WorkCategory;
use App\Models\Country;
use App\Models\Favicon;
use App\Models\Service;
use App\Models\Category;
use App\Models\Company;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\BlogPostsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Translation helper function
        if (!function_exists('translated')) {
            function translated($model, $fieldName, $locale = null) {
                if (method_exists($model, 'getTranslated')) {
                    return $model->getTranslated($fieldName, $locale);
                }
                return $model->getAttribute($fieldName);
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        

    // Check if Laravel is running in the console
    if (!app()->runningInConsole()) {
        $favicon = Favicon::latest()->first();
        View::share('favicon', $favicon);

        $sitesetting = SiteSetting::first();
        View::share('sitesetting', $sitesetting);

        // Other view composers can be added here in the same way
        View::composer('frontend.includes.navbar', function ($view) {
            $countries = Country::all();
            $testimonials = Testimonial::all();
            $workcategories = WorkCategory::all();
            $categories = Category::all();
            $blogpostcategories = BlogPostsCategory::all();
            $sitesetting = SiteSetting::first();


            $view->with([
                'countries' => $countries,
                'testimonials' => $testimonials,
                'workcategories' => $workcategories,
                'categories' => $categories,
                'blogpostcategories' => $blogpostcategories,
                'sitesetting' => $sitesetting
            ]);

        });

        view()->composer('frontend.includes.footer', function ($view) {
            $services = Service::all();
            $categories = Category::all();
            $workcategories = WorkCategory::all();
            $siteSettings = SiteSetting::first();
            $about = About::first();


            $view->with([
                'services' => $services,
                'workcategories' => $workcategories,
                'siteSettings' => $siteSettings,
                'categories' => $categories,
                'about' => $about,
                'sitesetting' => SiteSetting::first(),
            ]);

        });
    }
    }
}
