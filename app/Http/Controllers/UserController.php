<?php

namespace App\Http\Controllers;

use Auth;
use GuzzleHttp\Client;
use App\Models\Social;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Events\SetFavoriteStreamer;
use App\Events\SetFollowingStreamer;

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

        // Events Handing the full users data process
        $json_data = array_first(event(new SetFollowingStreamer($user_id)));


        // dd($json_data);
        $collection = collect($json_data);

        $page = \Input::get('page', 1);
        $perPage = 6;

        $paginate = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
        // dd($paginate);

        return view ('pages.user.home', compact('paginate'));

    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $json_data = array_first(event(new SetFavoriteStreamer($query)));
        // dd($json_data);

        $collection = collect($json_data);

        $page = \Input::get('page', 1);
        $perPage = 6;
        $offset = ($page * $perPage) - $perPage;

        $paginate = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
        // dd($paginate);

        return view ('pages.user.search', compact('paginate'));

    }
}
