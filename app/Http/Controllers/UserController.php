<?php

namespace App\Http\Controllers;

use Auth;
use GuzzleHttp\Client;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function index(Request $request)
    {
        $user_id = Social::where('user_id', Auth::user()->id)->value('social_id');
        $client_id= env('TWITCH_KEY');
        $client = new Client();

        $response = $client->get(
            'https://api.twitch.tv/helix/users/follows?from_id='.$user_id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Client-ID'      => $client_id
                ],
            ]);

        $json_response = array_get(json_decode($response->getBody()->getContents(), true), 'data');

        // dd($json_response);
        $collection = collect($json_response);

        $page = \Input::get('page', 1);
        $perPage = 6;

        $paginate = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
        // dd($paginate);

        return view ('pages.user.home', compact('paginate'));



    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $user_id = Social::where('user_id', Auth::user()->id)->value('social_id');
        $client_id= env('TWITCH_KEY');
        $client = new Client();

        // dd($query);

        $response = $client->get(
            'https://api.twitch.tv/kraken/search/streams?query='.$query, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Client-ID'      => $client_id
                ],
            ]);

        $json_response =  array_get(json_decode($response->getBody()->getContents(), true), 'streams');

        // dd($json_response);

        $collection = collect($json_response);

        $page = \Input::get('page', 1);
        $perPage = 6;

        $paginate = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
        // dd($paginate);

        return view ('pages.user.search', compact('paginate'));

    }
}
