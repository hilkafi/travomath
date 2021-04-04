<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8"/>
  <title>Index - TravOMath</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <meta property="og:title" content=""/>
  <meta property="og:type" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:image" content=""/>

  <meta name="theme-color" content="#fafafa"/>

    <?php wp_head(); ?>
  <?php 
    $custom_css = esc_attr( get_option( 'travomath_custom_css' ) );
    if( !empty( $custom_css ) ):
      echo '<style>' . $custom_css . '</style>';
    endif;
  ?>

</head>

<body>

  <div class="modal" id="mymodal">
    <div class="subscribe-modal modal-content">
      <div class='subscribe-form'>
        <div class='subscribe-inner'>
         <h4>Subscribe to my Newsletter</h4>
         <p>Ea qui falli minimum tractatos, ut sit dolore noster perfecto. Vim melius labitur in. Pri ei modus dictas mnesarchum. Ipsum legimus percipitur</p>
        </div>
        <div class='form-wrapper'>
         <form action='http://feedburner.google.com/fb/a/mailverify' id='subscribe' method='post' target='popupwindow'>
          <input name='uri' type='hidden' value='[Your Blog uri]'/>
          <input name='loc' type='hidden' value='en_US'/>
          <input id='subscribe-name' name='email' required='' type='text' placeholder='Your Email'/>
          <input id='subscribe-submit' title='' type='submit' value='Subscribe'/>
         </form>
        </div>
       </div>

    </div><!--./subscribe-modal-->
    </div><!--./modal-->

<div class="header-wrapper">
  <div class="header-inner">
  <div class="row">
    <div class="col-md-2 brand">
      <a href="<?php echo home_url(); ?>">
          <?php echo travomath_get_custom_logo(); ?>
      </a>
    </div><!--./brand-->

    <div class="col-md-4 search-bar">
        <?php get_search_form(); ?>
    </div><!--./search-bar-->



    <div class="col-md-5 primary-nav">
      <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => false,
          ) );	
        ?>
    </div><!--./primary-nav-->

    <div class="col-md-1 hamburger">

      <div class="button_container" id="toggle">
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
      </div>
    </div><!--./hamburger-->

  </div><!--./row-->

  </div><!--./header-inner-->
</div><!--./header-wrapper-->



      <!--Overlay Menu start-->
      <div class="overlay-ham" id="overlay">
        <div class="overlay-menu container">
          <div class="row">

            <div class="col-md-3 links">

              <?php if ( ! is_active_sidebar( 'travomath-travelbylocation-widget' ) ) {
                  return;
                } ?>
              <?php dynamic_sidebar( 'travomath-travelbylocation-widget' ); ?>

            </div><!--./first-links-->

            <div class="col-md-3 links">
              <?php if ( ! is_active_sidebar( 'travomath-tipsandtricks-widget' ) ) {
                    return;
                  } ?>
                <?php dynamic_sidebar( 'travomath-tipsandtricks-widget' ); ?>
            </div><!--./second-links-->

            <div class="col-md-3 links">
                <?php if ( ! is_active_sidebar( 'travomath-travelshops-widget' ) ) {
                    return;
                  } ?>
                <?php dynamic_sidebar( 'travomath-travelshops-widget' ); ?>
              </ul>
            </div><!--./third-links-->
            
            <div class="col-md-3 links">
                <?php if ( ! is_active_sidebar( 'travomath-videos-widget' ) ) {
                    return;
                  } ?>
                <?php dynamic_sidebar( 'travomath-videos-widget' ); ?>
            </div><!--./fourth-links-->

          </div><!--./row-->


          <div class="row hamburger-lead">
            <div class="newsletter-inner container">
              <?php if ( ! is_active_sidebar( 'travomath-newsletter-widget' ) ) {
                  return;
                } ?>
                <h2>Subscribe To Our Weekly News Letter</h2>
              <?php dynamic_sidebar( 'travomath-newsletter-widget' ); ?>
            </div>
          </div><!---./row-->

        </div><!--./overlay-menu-->
      </div>
      <!--Overlay Menu Stop-->