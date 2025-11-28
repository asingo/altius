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
        $smtp = false;
        $setting = Setting::where('name', 'general')->first()?->value;
        if (isset($setting['email'])) {
            if ($setting['email']) {
                $smtp = (object) $setting['email'];
                config(['mail.mailers.smtp.host' => $smtp->smtp_host]);
                config(['mail.mailers.smtp.port' => $smtp->smtp_port]);
                config(['mail.mailers.smtp.encryption' => $smtp->smtp_encryption]);
                config(['mail.mailers.smtp.username' => $smtp->smtp_username]);
                config(['mail.mailers.smtp.password' => $smtp->smtp_password]);
            }
        }
    }
}
