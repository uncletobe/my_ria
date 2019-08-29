<?php

namespace App\Observers;

use App\Models\Auth\PasswordResetModel;
use App\Models\User;
use App\components\Constants;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * @param User $user
     */
    public function creating(User $user) {

        $user->name = $user->email;
        $user->is_banned = Constants::IS_BANNED_DEFAULT;
        $user->password = Hash::make($user->password);
        $user->confirm_token = \Str::random(25);
        $user->setRememberToken(\Str::random(10));
        $user->is_verified = Constants::USER_NOT_VERIFIED;
//        $user->setAvatar($user);
        $user->role_id = Constants::UNCONFIRMED_USER;
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $restore = new PasswordResetModel();
        $restore->user_id = $user->id;
        $restore->email = $user->email;
        $restore->token = $restore->setToken();
        $restore->save();
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
