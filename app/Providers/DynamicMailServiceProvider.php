<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Mail\MailManager;
use Illuminate\Support\ServiceProvider;
use Mail;

class DynamicMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $setting = Setting::where('name', 'general')->first()?->value;

        if (!isset($setting['email'])) {
            return;
        }

        $smtp = (object) $setting['email'];

        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => $smtp->smtp_host,
            'mail.mailers.smtp.port' => $smtp->smtp_port,
            'mail.mailers.smtp.encryption' => $smtp->smtp_encryption,
            'mail.mailers.smtp.username' => $smtp->smtp_username,
            'mail.mailers.smtp.password' => $smtp->smtp_password,
            'mail.from.address' => $smtp->smtp_username,
            'mail.from.name' => config('app.name'),
        ]);

        // CRITICAL: Reset mailer so new config is used
        app()->forgetInstance('mail.manager');
        app()->forgetInstance('mailer');

        Mail::alwaysFrom(
            config('mail.from.address'),
            config('mail.from.name')
        );
    }
}
