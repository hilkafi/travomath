<!--./index-thumb start-->
<div class="index-thumb col-md-4 col-sm-6">
    <div class="thumb-img">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo travomath_get_attachment() ?>" alt="img"></a>
    </div><!--./thumb-img-->
    
    <?php the_title( '<h2 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>
    <div class="post-summary">
        <?php the_excerpt(); ?>
    </div><!--./post-summary-->

    <div class="continue-button">
        <a href="<?php the_permalink(); ?>">Continue Reading</a>
    </div><!--./continue-button-->
    
</div><!--./index-thumb-->