<?php

namespace App\Http\Controllers;

use Auth;
use GuzzleHttp\Client;
use App\Models\Social;

class StreamerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($streamer_id)
    {

     $user_id = Social::where('user_id', Auth::user()->id)->value('social_id');
     $client_id= env('TWITCH_KEY');
     $client = new Client();

     $response = $client->get(
      'https://api.twitch.tv/helix/videos?client_id='.$client_id.'&first=10&user_id='.$streamer_id, [
        'headers' => [
          'Accept' => 'application/json',
          'Client-ID'      => $client_id,
        ],
      ]);

     $json_response = array_get(json_decode($response->getBody()->getContents(), true), 'data');

        // dd($json_response);
     foreach($json_response as $user_data){
       $streamer =  $user_data['user_name'];
     } 

     return view ('pages.user.streamer', compact('streamer', 'json_response'));

   }
 }