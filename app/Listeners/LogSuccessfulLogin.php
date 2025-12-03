<?php

namespace App\Listeners;

use App\Models\UserLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        if($event->user->role !== null){
            UserLog::create([
                'name' => $event->user->name,
                'email' => $event->user->email,
                'role' => $event->user->role,
                'ip' => request()->ip()
            ]);
        }
    }
}
