<?php

use Astrotomic\Ecologi\EcologiServiceProvider;
use Orchestra\Testbench\TestCase;

uses(TestCase::class)->in('Feature');

uses()->beforeEach(function(): void {
    $this->app->register(EcologiServiceProvider::class);

    config()->set('services.ecologi', [
        'username' => 'astrotomic',
        'api_key' => env('ECOLOGI_API_KEY'),
        'sandbox' => true,
    ]);
})->in('Feature');