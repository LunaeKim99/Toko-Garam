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
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        $branch = (string) env('RAILWAY_GIT_BRANCH', 'unknown');
        $sha = (string) env('RAILWAY_GIT_COMMIT_SHA', 'unknown');
        \Illuminate\Support\Facades\Log::info('App booted', [
            'env' => $this->app->environment(),
            'railway_branch' => $branch,
            'railway_commit_sha' => $sha,
        ]);
    }
}
