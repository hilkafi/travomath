<?php
/**
 * @package travomath
 */

?>

<?php get_header(); ?>

<div class="content-wrapper">
    <div class="main-content-wrapper container">

        <div class="row">

            <div class="main-content col-md-10 col-md-offset-1">

                <?php if ( have_posts() ) : 
                    while ( have_posts() ) : the_post(); ?>

                <div class="post-wrapper">
                    <div class="post-header">
                    
                        <!--BREADCRUMB START-->
                        <div class="breadcrumb-outer">
                            <div itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <?php get_breadcrumb(); ?>
                            </div>
                        </div>
                        <!--./BREADCRUMB STOP-->
                    
                        <?php the_title( '<h1 class="post-title">', '<h1>'); ?>
                    </div><!--./post-header-->
                    
                    
                    
                    <div class="post-body">
                        <div dir="ltr" style="text-align: left;" trbidi="on">
                            <?php the_content(); ?>
                        </div>
                        
                    </div><!--./post-body-->
                
                </div><!--./post-wrapper-->

                    <?php endwhile; ?>
                <?php endif; ?>

            </div><!--./main-content-->

        </div><!--./row-->

    </div><!--./main-content-wrapper-->

</div><!--./content-wrapper-->



<?php get_footer(); ?>