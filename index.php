<?php 
/*
@package travomath
*/
?>
<?php get_header(); ?>

<div class="content-wrapper">
  <div class="main-content-wrapper container">

    <div class="row">
      <div class="content-title">
        <span class='title-span'>On The Blog</span>
      </div>

      <?php if( have_posts() ): ?>
      <div class="main-content row">
        <?php      
              while( have_posts() ): the_post();
              
                get_template_part( 'template-parts/content', get_post_format() );
              
              endwhile;
              ?>
      </div><!--./main-content-->

      <div class="pager">

        <div class="row">
          <div class="col-xs-6 previous-page">
            <?php if(previous_posts_link()) : ?>
              <i class="fas fa-long-arrow-alt-left"></i> <span><?php previous_posts_link('Previous Page'); ?></span>
            <?php endif; ?>
          </div>
          <div class="col-xs-6 next-page">
            <?php if(next_posts_link()) : ?>
              <span><?php next_posts_link('Next Page'); ?></span> <i class="fas fa-long-arrow-alt-right"></i>
            <?php endif; ?>
          </div>
        </div>

      </div><!--./pager-->

      <?php endif;   ?>
    </div><!--./row-->
  </div><!--./main-content-wrapper-->

</div><!--./content-wrapper-->

<?php get_footer(); ?>