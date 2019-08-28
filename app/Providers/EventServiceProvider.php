<?php

namespace App\Providers;

use App\Events\ArticleView;
use App\Events\RestorePassword;
use App\Events\UserCreated;
use App\Listeners\SendRegisterNotification;
use App\Listeners\UserRestorePassword;
use App\Listeners\UserViewedArticle;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            SendRegisterNotification::class,
        ],
        ArticleView::class => [
            UserViewedArticle::class,
        ],
        RestorePassword::class => [
            UserRestorePassword::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
