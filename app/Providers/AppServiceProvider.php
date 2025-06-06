<?php

namespace App\Providers;

use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

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
        DB::listen(function ($query) {
            Log::info("Query: " . $query->sql . " [Bindings: " . implode(", ", $query->bindings) . "] Time: " . $query->time . "ms");
        });
    }
}
