<?php

namespace App\Providers;

use App\Services\NetscapeBookmarkParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array|string[] $singletons
     */
    public $singletons = [
        // services
        NetscapeBookmarkParser::class => NetscapeBookmarkParser::class,
    ];

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
        //
    }
}
