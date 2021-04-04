<?php 
/*
@package travomath
*/
?>
<?php get_header(); ?>


<div class="content-wrapper mt_zero">
  <div class="main-content-wrapper container mt_zero">

    <div class="main-content row">
      
        <?php 
                
            if( have_posts() ):
              
              while( have_posts() ): the_post();
              
                get_template_part( 'template-parts/content', get_post_format() );
              
              endwhile;
              ?>
              <div class="text-center">
                <?php travomath_bootstrap_pagination(); ?>
              </div>
              ?>
          <?php endif;
                  
          ?>
    </div><!--./main-content-->

  </div><!--./main-content-wrapper-->

</div><!--./content-wrapper-->

<?php get_footer(); ?>