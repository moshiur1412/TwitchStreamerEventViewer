<div class="card">
    <div class="card-header bg-info text-white"> Welcome {{ Auth::user()->name }} </div>
    <div class="card-body">
        <h2 class="lead">  {{ trans('auth.loggedIn') }} </h2>
        <p> <em>Thank you</em> for checking this project out. <strong>Please check your favorite Twitch Streamers. </strong></p> <hr>
        <!--  <p> <small> Users registered via Social providers are by default activated.</small> </p> -->
        
        <div class="col-sm-12">
            <form action="{{ route('public.search') }}" method="GET" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search your favorite streamer name."> <span class="input-group-btn">
                        <button type="submit" class="btn btn-info">
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <hr>
        <div class="col-sm-12">
           <h2>Follow your favorites ! <small> They'll show up here for easy access! </small></h2><hr>
       </div>
       <div class="row">

          @if(!empty($paginate))

          @foreach($paginate as $user_data)

          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <iframe class="mb-10" src="https://player.twitch.tv/?channel={{$user_data['channel']['display_name']}}&autoplay=false" height="350" width="100%" frameborder="0" scrolling="no" allowfullscreen="false">
                </iframe>
                <p>
                    <a href="{{ url('streamer', ['streamer' => $user_data['channel']['_id']] )}}" class="btn btn-link">{{$user_data['channel']['display_name']}}</a>
                    - &nbsp;  Lng: <strong>  {!! $user_data['channel']['language'] !!} &nbsp; </strong>
                    - &nbsp;  Followers: <strong>  {!! $user_data['channel']['followers'] !!} &nbsp; </strong>
                    | &nbsp;   Views:  <strong>{!! $user_data['channel']['views'] !!} </strong>
                    <p class="text-center">| Game:  <strong>{!! $user_data['channel']['game'] !!} </strong> </p>



                </p>
            </div>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="col-sm-12 mb-10 mt-10 text-right">
        <hr> {{ $paginate->render() }}  <hr>
    </div>
    @else
    <div class="col-sm-12">
        <div class="alert alert-info">
            <strong>Sorry,</strong> There is no matching data found, Please try again later. eg: Shroud.
        </div>
    </div>
    @endif



</div>

<hr>

<p> This page route is protected by <code>activated</code> middleware. Only Twitch accounts are able pass this middleware. </p>        

</div>
</div>
