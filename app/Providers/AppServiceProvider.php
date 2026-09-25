<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings and deadlines globally if tables exist
        if (\Schema::hasTable('site_settings')) {
            $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
            View::share('settings', $settings);
        }
        if (\Schema::hasTable('deadlines')) {
            $deadlines = \App\Models\Deadline::where('is_active', true)->orderBy('sort_order')->get();
            View::share('deadlines', $deadlines);
        }
        if (\Schema::hasTable('hero_organizers')) {
            $organizers = \App\Models\HeroOrganizer::where('is_active', true)->orderBy('sort_order')->get();
            View::share('organizers', $organizers);
        }
    }
}
