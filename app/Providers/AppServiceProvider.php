<?php

namespace App\Providers;

use App\FooterDoctor;
use App\FooterHospital;
use App\FooterIntroduction;
use App\FooterService;
use App\SocialLink;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

        view()->composer('_partials.main.footer', function ($view) {
            $footerIntroduction =  FooterIntroduction::first();
            $socialLinks = SocialLink::first();
            $footerDoctors = FooterDoctor::get();
            $footerServices = FooterService::get();
            $footerHospitals = FooterHospital::get();

            $view->with(compact('footerIntroduction', 'socialLinks', 'footerDoctors', 'footerServices', 'footerHospitals'));
        });
    }
}
