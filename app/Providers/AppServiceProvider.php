<?php

namespace App\Providers;

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
        // Self-healing database configurations for Vercel Cloud Serverless deploys
        if (isset($_SERVER['VERCEL']) || env('VERCEL') || env('APP_ENV') === 'production') {
            $dbPath = '/tmp/database.sqlite';
            
            // Set fallback encryption key if empty to prevent boot crashes
            if (!config('app.key')) {
                config(['app.key' => 'base64:zaldpedia12345678901234567890123456789012=']);
            }
            
            // Force application connection to local SQLite database in the writable /tmp partition
            config(['database.default' => 'sqlite']);
            config(['database.connections.sqlite.database' => $dbPath]);
            
            // Create writable directories in /tmp for storage, cache, session and views compiling
            $storageTmp = '/tmp/storage';
            if (!file_exists($storageTmp)) {
                @mkdir($storageTmp, 0755, true);
                @mkdir("$storageTmp/framework/views", 0755, true);
                @mkdir("$storageTmp/framework/sessions", 0755, true);
                @mkdir("$storageTmp/framework/cache/data", 0755, true);
            }
            
            // Overwrite configurations at runtime
            config(['view.compiled' => "$storageTmp/framework/views"]);
            config(['session.files' => "$storageTmp/framework/sessions"]);
            config(['cache.stores.file.path' => "$storageTmp/framework/cache/data"]);
            config(['logging.default' => 'stderr']); // Redirect logging away from file system to standard error output
            
            // Create the database file if it doesn't exist
            if (!file_exists($dbPath)) {
                touch($dbPath);
                
                // Force run database schema migrations on-the-fly
                try {
                    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                } catch (\Exception $e) {
                    logger('On-the-fly serverless migration failed: ' . $e->getMessage());
                }
            }
        }
    }
}
