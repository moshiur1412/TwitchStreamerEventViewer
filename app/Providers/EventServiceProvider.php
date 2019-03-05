<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\TwitchLogin' => [
            'App\Listeners\SendTwitchData',
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\Twitch\TwitchExtendSocialite@handle',
        ],

        'App\Events\SetFollowingStreamer' => [
            'App\Listeners\SendFollowingStreamer',
        ],

        'App\Events\SetFavoriteStreamer' => [
            'App\Listeners\SendFavoriteStreamer',
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
