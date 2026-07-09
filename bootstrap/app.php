<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// Force the storage path to /tmp/storage on Vercel to bypass read-only workspace restriction
if (isset($_SERVER['VERCEL']) || getenv('VERCEL') || getenv('APP_ENV') === 'production') {
    $app->useStoragePath('/tmp/storage');
}

return $app;
