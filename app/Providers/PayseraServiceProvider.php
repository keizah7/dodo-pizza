<?php

namespace App\Providers;

use App\Services\Paysera;
use Illuminate\Support\ServiceProvider;

class PayseraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Paysera::class, function () {
            return new Paysera([
                'projectid'     => config('paysera.projectid'),
                'sign_password' => config('paysera.sign_password'),
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => config('paysera.test'),
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
