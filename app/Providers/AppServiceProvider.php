<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\UserOtpService;
use App\Services\DashboardService;
use App\Services\TransactionService;
use App\Services\UserQuestionService;
use App\Services\UserWalletService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });

        $this->app->singleton(DashboardService::class, function ($app) {
            return new DashboardService(auth()->user());
        });

        $this->app->singleton(TransactionService::class, function ($app) {
            return new TransactionService(auth()->user());
        });

        $this->app->singleton(UserOtpService::class, function ($app) {
            return new UserOtpService(auth()->user());
        });

        $this->app->singleton(UserQuestionService::class, function ($app) {
            return new UserQuestionService(auth()->user());
        });

        $this->app->singleton(UserWalletService::class, function ($app) {
            return new UserWalletService(auth()->user());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // User::observe(UserObserver::class);
    }
}
