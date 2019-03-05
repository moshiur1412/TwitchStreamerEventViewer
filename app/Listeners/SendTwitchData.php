<?php

namespace App\Listeners;

use App\Events\TwitchLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTwitchData
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
     * @param  TwitchLogin  $event
     * @return void
     */
    public function handle(TwitchLogin $event)
    {
        
        \Log::info('Twitch Login Listener::', ['provider' => $event->provider]);
    }
}
