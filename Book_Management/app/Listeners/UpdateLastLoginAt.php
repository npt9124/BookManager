<?php

namespace App\Listeners;

use App\Events\AdminLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastLoginAt
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
    public function handle(AdminLoggedIn $event): void
    {
        $admin = $event->admin;
        $admin->last_login_at = now();
        $admin->save();
    }
}
