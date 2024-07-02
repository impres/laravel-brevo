<?php

namespace EvoMark\EvoLaravelBrevo;

use Illuminate\Support\Facades\Mail;
use EvoMark\EvoLaravelBrevo\Transports\BrevoTransport;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/brevo.php', 'brevo');
    }

    public function boot()
    {
        Mail::extend('brevo', function (array $config) {
            return new BrevoTransport();
        });
    }
}
