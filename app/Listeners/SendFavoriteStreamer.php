<?php

namespace App\Listeners;

use App\Events\SetFavoriteStreamer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class SendFavoriteStreamer
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
     * @param  SetFavoriteStreamer  $event
     * @return void
     */
    public function handle(SetFavoriteStreamer $event)
    {
        \Log::info('Favorite Streamer Listener:', ['Search Query' => $event->query]);

        $client_id= env('TWITCH_KEY');
        $client = new Client();

        // dd($query);
        $response = $client->get(
            'https://api.twitch.tv/kraken/search/streams?query='.$event->query, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Client-ID'      => $client_id
                ],
            ]);

        return $json_response =  array_get(json_decode($response->getBody()->getContents(), true), 'streams');
    }
}
