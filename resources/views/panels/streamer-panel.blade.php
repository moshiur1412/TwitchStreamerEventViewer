<div class="card">
    <div class="card-header bg-info text-white "> {{ $streamer }} </div>
    <div class="card-body">
        <h2 class="lead"> Your streamer page & events is now here.</h2>
        <p> <em>Thank you</em> for checking this project out. <strong>Please check your favorite Twich Streamers Events in real time. </strong>  </p> <hr>

        <div class="row">
            <div class="col-sm-12">
                <iframe class="mb-20" src="https://player.twitch.tv/?channel={{$streamer}}&autoplay=false" height="330" width="50%" frameborder="0" scrolling="no" allowfullscreen="false">
                </iframe>
                <iframe style="float: right;" src="https://www.twitch.tv/embed/{{$streamer}}/chat" frameborder="0" scrolling="no" height="330" width="50%"></iframe>
            </div>
        </div>
        <!-- {{ var_dump($json_response)}} -->
        <div class="row"> 
         <div class="col-sm-12"> <hr> <h2> List of 10 most recent events </h2> <hr></div>

         @foreach($json_response as $user_data)
         <div class="col-sm-6">
            <iframe src="https://player.twitch.tv/?autoplay=false&video=v{{ substr($user_data['url'], strrpos($user_data['url'], '/') + 1) }}" frameborder="0" allowfullscreen="true" scrolling="no" height="350" width="100%"></iframe>
        </div>
        @endforeach
    </div>
</div>

</div>
