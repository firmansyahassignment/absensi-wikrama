<?php

namespace App\Providers;

use App\Rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        config(['app.locale' => 'id']);
        setlocale(LC_TIME, 'id');
        \Carbon\Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        view()->composer('*', function ($view) {
            $link_role = get_link_role() ?? false;
            if ($link_role) {
                $view->with('link_role', $link_role);
            }

            if (Auth::user()) {
                if (Auth::user()->role == 3) {
                    $rayons = Rayon::where('pembimbing_id', Auth::user()->id)->get() ?? [];
                    $view->with('rayons', $rayons);
                }
            }
        });
    }
}
