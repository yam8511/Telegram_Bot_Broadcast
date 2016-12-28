<?php

namespace App\Telegram;

use Illuminate\Support\ServiceProvider;

class TeleBotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/telegram.php' => config_path('telegram.php')
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('telegram_bot', function($app) {
            return new TeleBot();
        });
    }
}
