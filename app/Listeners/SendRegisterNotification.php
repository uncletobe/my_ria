<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Notifications\ConfirmEmail;

class SendRegisterNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $event->user->notify(new ConfirmEmail($event->user->confirm_token));
    }
}
