<?php

namespace App\Listeners;

use App\Events\SetFollowingStreamer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class SendFollowingStreamer
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
     * @param  SetFollowingStreamer  $event
     * @return void
     */
    public function handle(SetFollowingStreamer $event)
    {

        \Log::info('Following Streamer Listener::', ['Following:' => $event->user_id]);

        $client_id= env('TWITCH_KEY');
        $client = new Client();

        try {
         $response = $client->get(
            'https://api.twitch.tv/helix/users/follows?from_id='.$event->user_id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Client-ID'      => $client_id
                ],
            ]);

     } catch (Exception $e) {
       \Log::error('SendFollowingStreamer: Something is really going wrong.'.$e);
   }

   return  $json_response = array_get(json_decode($response->getBody()->getContents(), true), 'data');



}





}
