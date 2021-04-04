<?php 
/**
 * @package travomath
 */
?>

<?php get_header(); ?>

<?php 
    
$slider_active = get_option('homepage_slider');
if( @$slider_active == 1) :
?>
<div class="feature-wrapper">
    <div class="feature-inner">
        <?php 
            $args = array(
                'type' => 'post',
                'post_status' => 'publish',
                'meta_key'     => '_adding_slide_value_key',
                'meta_value'   => 1,
                'posts_per_page' => 5,
                'no_found_rows' => true
            );

            $slider_posts = new WP_Query($args);
        ?>

        <?php 
        if($slider_posts->have_posts()): 
            while($slider_posts->have_posts()): $slider_posts->the_post();
        ?>
        <!--slider-item-->
        <div class="feature-lead">

            <a href="<?php echo esc_url( get_permalink() ); ?>">
                <img data-lazy="<?php echo travomath_get_attachment(); ?>" alt="slider-img"/> <!--recommend img size: 1280 x 640 2:1-->
                <div class="hero-txt">
                    <?php the_title('<h2 class="hero-title">', '<h2>'); ?>

                    <p class="hero-caption">
                        <?php the_excerpt(); ?>
                    </p>

                    <button class="hero-btn"><a href="<?php echo esc_url( get_permalink() ); ?>">Read More</a></button>
                </div><!--./hero-txt-->
            </a>

        </div><!--./feature-lead-->
        <!--./slider-item-->
        <?php
            endwhile;
        endif;

        wp_reset_postdata();
        ?>

    </div><!--./feature-inner-->

</div><!--./feature-wrapper-->
<?php endif; ?>


<div class="start-lists">
    <div class="list-inner container">
        <div class="row">

            <div class="col-sm-4 section">
                <div class="section-inner">
                    <div class="list-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>

                    <div class="list-info">
                        <strong>20 Countries Visited</strong>
                    </div>
                    
                </div>
            </div><!--./section-->

            <div class="col-sm-4 section">
                <div class="section-inner">

                    <div class="list-icon">
                        <i class="fas fa-plane"></i>
                    </div>

                    <div class="list-info">
                        <strong>50,000 KM Travelled</strong>
                    </div>

                    
                </div>
            </div><!--./section-->

            <div class="col-sm-4 section">
                <div class="section-inner">

                    <div class="list-icon">
                        <i class="fas fa-camera-retro"></i>
                    </div>

                    <div class="list-info">
                        <strong>80,000 Photos Taken</strong>
                    </div>

                </div>
            </div><!--./section-->

        </div><!--./row-->
    </div><!--./list-inner-->
</div><!--./start-lists-->


<div class="featured-link-wrapper">
  <div class="featured-link container">
      <div class="row">

      <?php 
            $args = array(
                'type' => 'post',
                'post_status' => 'publish',
                'category_name'     => 'news,life,updates',
                'posts_per_page' => 4,
                'no_found_rows' => true
            );

            $featured_link = new WP_Query($args);
        ?>

        <?php 
        if($featured_link->have_posts()): 
            while($featured_link->have_posts()): $featured_link->the_post();
            $category = get_the_category();
            $first_category = $category[0];
        ?>

          <div class="col-sm-3 col-xs-6 feat-link">
              <a href="<?php echo esc_url( get_permalink() ); ?>">
                <img src="<?php echo travomath_get_attachment(); ?>" alt=""/> <!--RECOMMENDED 350 X 175 2:1-->
                <h3 class="feat-link-txt"><?php echo get_cat_name($first_category->term_id); ?></h3>
              </a>
          </div><!--./feat-link-->

          <?php
            endwhile;
        endif;

        wp_reset_postdata();
        ?>
      </div><!--./row-->
  </div><!--./featured-link-->
</div><!--./featured-link-wrapper-->


<div class="content-wrapper">
    <div class="main-content-wrapper container">

        <div class="row">
            <div class="content-title">
                <span class='title-span'>On The Blog</span>
            </div>

            <?php 
                //$current_page = (get_query_var('paged')) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6
                );

                $blog_posts = new WP_Query($args);
            ?>

            <?php 
            if($blog_posts->have_posts()): ?>

            <div class="main-content row">

                <?php while($blog_posts->have_posts()): $blog_posts->the_post(); ?>
                <!--./index-thumb start-->
                <div class="index-thumb col-md-4 col-sm-6">

                    <div class="thumb-img">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"><img src="<?php echo travomath_get_attachment(); ?>" alt="img"></a>
                    </div><!--./thumb-img-->
                
                    <?php the_title('<h2 class="post-title"><a href="'. esc_url( get_the_permalink() ) .'">', '</a></h2>') ?>
                    
                    <div class="post-summary">
                        <?php the_excerpt_embed(); ?>
                    </div><!--./post-summary-->

                    <div class="continue-button">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">Continue Reading</a>
                    </div><!--./continue-button-->
                    

                </div><!--./index-thumb-->
                <?php endwhile; ?>

            </div><!--./main-content-->

            <?php endif; ?>
            <?php  wp_reset_postdata(); ?>

        </div><!--./row-->
    </div><!--./main-content-wrapper-->

</div><!--./content-wrapper-->



<div class="photo-content-wrapper">

  <div class="photo-content container">
    <div class="content-title">
      <span class="title-span">Latest Clicks</span>
    </div>

  <div class="photos">

      <div class="photo">
          <a href="#">
              <img data-lazy="img/travel1.jpg" alt="">
          </a>
      </div><!--./photo-->


      <div class="photo">
          <a href="#">
              <img data-lazy="img/travel1.jpg" alt="">
          </a>
      </div><!--./photo-->


    <div class="photo">
        <a href="#">
            <img data-lazy="img/travel4.jpg" alt="">
        </a>
    </div><!--./photo-->

    <div class="photo">
        <a href="#">
            <img data-lazy="img/travel5.jpg" alt="">
        </a>
    </div><!--./photo-->

    <div class="photo">
      <a href="#">
          <img data-lazy="img/travel6.jpg" alt="">
      </a>
  </div><!--./photo-->


<div class="photo">
    <a href="#">
        <img data-lazy="img/travel7.jpg" alt="">
    </a>
</div><!--./photo-->

<div class="photo">
    <a href="#">
        <img data-lazy="img/travel8.jpg" alt="">
    </a>
</div><!--./photo-->


  </div><!--./photos-->

  
  </div><!--./photo-content-->

</div><!--./photo-content-wrapper-->


<div class="video-content-wrapper">

  <div class="video-content container">
    <div class="content-title">
      <span class="title-span">Latest Videos</span>
    </div>
  <div class="videos row">
  
    <div class="col-sm-3 video">
      <a href="#" class="video-link">
        <img src="img/1.jpg" alt="video">
      </a>
      <h2 class="video-title"><a href="#">Duis aute irure dolor in reprehenderit</a></h2>
    </div>
    <!--./video-->
  
    <div class="col-sm-3 video">
      <a href="#" class="video-link">
        <img src="img/2.jpg" alt="video">
      </a>
      <h2 class="video-title"><a href="#">Duis aute irure dolor in reprehenderit</a></h2>
    </div>
    <!--./video-->
  
    <div class="col-sm-3 video">
      <a href="#" class="video-link">
        <img src="img/3.jpg" alt="video">
      </a>
      <h2 class="video-title"><a href="#">Duis aute irure dolor in reprehenderit</a></h2>
    </div>
    <!--./video-->
  
    <div class="col-sm-3 video">
      <a href="#" class="video-link">
        <img src="img/4.jpg" alt="video">
      </a>
      <h2 class="video-title"><a href="#">Duis aute irure dolor in reprehenderit</a></h2>
    </div>
    <!--./video-->
  
  
  </div><!--./videos-->
  </div><!--./video-content-->

</div><!--./video-content-wrapper-->

<div class="as-seen-wrapper">
  <div class="as-seen container">


    <div class="content-title">
      <span class="title-span">As Seen On</span>
    </div>


      <div class="as-seen-imgs">

        <a href="#">
          <img src="img/tripadvisor.png" alt="">
        </a>

        <a href="#">
          <img src="img/mash.png" alt="">
        </a>

        <a href="#">
          <img src="img/gurdian.png" alt="">
        </a>

        <a href="#">
          <img src="img/trip.jpeg" alt="">
        </a>

        <a href="#">
          <img src="img/forbes.jpg" alt="">
        </a>

        <a href="#">
          <img src="img/ms.png" alt="">
        </a>

        <a href="#">
          <img src="img/moz.png" alt="">
        </a>

      </div><!--./as-seen-imgs-->
  </div><!--./as-seen-->

</div><!--./as-seen-wrapper-->


<?php get_footer(); ?>