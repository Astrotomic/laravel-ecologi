<?php

namespace Astrotomic\Ecologi;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class EcologiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Ecologi::class, function(Container $app): Ecologi {
            return new Ecologi(
                $app->make('config')->get('services.ecologi.api_key'),
                $app->make('config')->get('services.ecologi.username'),
                $app->make('config')->get('services.ecologi.sandbox')
            );
        });
    }
}