<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\TrustProxies;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )->withProviders([
    ])
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(TrustProxies::class);
        $middleware->encryptCookies(except: ['websters_cookie_consent']);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
