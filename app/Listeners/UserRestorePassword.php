<?php

namespace App\Listeners;

use App\Events\RestorePassword;
use App\Models\Auth\PasswordResetModel;
use App\Notifications\RestorePasswordByEmail;
use App\Repositories\PasswordResetRepository;

class UserRestorePassword
{
    private $restore;
    private $passResModel;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->restore = new PasswordResetRepository();
        $this->passResModel = new PasswordResetModel();
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RestorePassword $event)
    {
        $elem = $this->restore->getRecordByEmail($event->email);
        $token = $this->passResModel->getToken();

        $this->passResModel->notify(new RestorePasswordByEmail($token, $event->email));
    }

}
