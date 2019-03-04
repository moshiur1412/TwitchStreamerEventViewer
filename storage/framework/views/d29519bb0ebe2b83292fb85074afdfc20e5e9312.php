<div class="card">
    <div class="card-header bg-info text-white"> Welcome <?php echo e(Auth::user()->name); ?> </div>
    <div class="card-body">
        <h2 class="lead">  <?php echo e(trans('auth.loggedIn')); ?> </h2>
        <p> <em>Thank you</em> for checking this project out. <strong>Please check your favorite Twitch Streamers. </strong></p> <hr>
        <!--  <p> <small> Users registered via Social providers are by default activated.</small> </p> -->

        <!-- <hr> <?php echo e(var_dump($paginate)); ?><hr> -->
        <div class="col-sm-12">
            <form action="<?php echo e(route('public.search')); ?>" method="POST" role="search">
                <?php echo e(csrf_field()); ?>

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

        <?php if($paginate->count()>1): ?>

        <?php $__currentLoopData = $paginate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <iframe class="mb-10" src="https://player.twitch.tv/?channel=<?php echo e($user_data['channel']['display_name']); ?>&autoplay=false" height="350" width="100%" frameborder="0" scrolling="no" allowfullscreen="false">
                </iframe>
                <p>
                    <a href="<?php echo e(url('streamer', ['streamer' => $user_data['channel']['_id']] )); ?>" class="btn btn-link"><?php echo e($user_data['channel']['display_name']); ?></a>
                    - &nbsp;  Lng: <strong>  <?php echo $user_data['channel']['language']; ?> &nbsp; </strong>
                    - &nbsp;  Followers: <strong>  <?php echo $user_data['channel']['followers']; ?> &nbsp; </strong>
                    | &nbsp;   Views:  <strong><?php echo $user_data['channel']['views']; ?> </strong>
                    <p class="text-center">| Game:  <strong><?php echo $user_data['channel']['game']; ?> </strong> </p>
                    


                </p>
            </div>
        </div>
    </div>
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 mb-10 mt-10 text-right">
        <hr> <?php echo e($paginate->render()); ?>  <hr>
    </div>
    <?php else: ?>
    <div class="col-sm-12">
        <div class="alert alert-info">
            <strong>Sorry,</strong> There is no matching data found, Please try again later. eg: Shroud.
        </div>
    </div>
    <?php endif; ?>



</div>

<hr>

<p> This page route is protected by <code>activated</code> middleware. Only Twitch accounts are able pass this middleware. </p>        

</div>
</div>
