<?php

namespace App\Providers;

use App\Models\FooterContactInfo;
use App\Models\FooterHelpLink;
use App\Models\FooterInfo;
use App\Models\FooterSocialLink;
use App\Models\FooterUseFulLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FooterViewServiceProivider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.footer', function($view) {
            $footerInfo =  FooterInfo::first();
            $footerIcons = FooterSocialLink::all();
            $footerUsefulLinks = FooterUseFulLink::all();
            $footerContactInfo = FooterContactInfo::first();
            $footerHelpLinks = FooterHelpLink::all();

            $view->with(compact('footerInfo', 'footerIcons', 'footerUsefulLinks', 'footerContactInfo', 'footerHelpLinks'));

        });
    }
}
