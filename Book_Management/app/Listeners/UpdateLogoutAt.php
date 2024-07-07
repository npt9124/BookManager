<?php

namespace App\Listeners;

use App\Events\AdminLoggedOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLogoutAt
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
    public function handle(AdminLoggedOut $event): void
    {
        $admin = $event->admin;
        $admin->logout_at = now();
        $admin->save();
    }
}
