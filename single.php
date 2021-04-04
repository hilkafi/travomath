<?php get_header(); ?>

<div class="content-wrapper">
    <?php 
                                
        if( have_posts() ):
            
            while( have_posts() ): the_post();
                
                get_template_part( 'template-parts/single', get_post_format() );
        
            
            endwhile;
            
        endif;

    ?>
</div><!--./content-wrapper-->

<?php get_footer(); ?>

  
