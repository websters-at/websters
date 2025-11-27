<?php

use App\Providers\AppServiceProvider;
use App\Providers\CookiesServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\VoltServiceProvider;
use Artesaos\SEOTools\Providers\SEOToolsServiceProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    VoltServiceProvider::class,
    AppServiceProvider::class,
    CookiesServiceProvider::class,
    SEOToolsServiceProvider::class
];
