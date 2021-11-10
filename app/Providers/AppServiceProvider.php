<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $noData = "<div class='nodata' style='position:relative;'>
    <p class='no-data-text' style='position: absolute; left:50%; top: 50%; transform: translate(-50%,-50%); font-weight: bold; 
                                    color: currentColor;'> No Data Available </p>
    <img class='img-fluid' src='assets/images/placeholders/no_data.svg' alt='no data available' style='max-width:100px' >
</div>";
        View::share('noDataAvailable', $noData);
        //
    }
}
