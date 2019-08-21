<?php

namespace App\Observers;

use App\Models\User;
use App\components\Constants;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    private $is_banned_default = 0;

    /**
     * @param User $user
     */
    public function creating(User $user) {

        $user->name = $user->email;
        $user->is_banned = $this->is_banned_default;
        $user->password = Hash::make($user->password);
//        $user->setAvatar($user);
        $user->role_id = Constants::DEFAULT_USER_ROLE;
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    public function setAvatar() {

    }
}