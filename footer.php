<div class="insta-wrapper">
  <div class="insta-btn">
      <a href="#"><i class="fab fa-instagram"></i> Follow @instagram</a>
  </div>
  <div id="instagram-feed"></div>
</div>


<div class="newsletter-wrapper">
  <div class="newsletter-inner container">
  
  <!-- Begin Mailchimp Signup Form -->
  <?php if ( ! is_active_sidebar( 'travomath-newsletter-widget' ) ) {
      return;
    } ?>
    <h2>Subscribe To Our Weekly News Letter</h2>
  <?php dynamic_sidebar( 'travomath-newsletter-widget' ); ?>
  
  <!--End mc_embed_signup-->
  
  </div><!--./newsletter-inner-->
  </div><!--./newsletter-wrapper-->

<div class="footer-wrapper">

    <div class="footer">

      <div class="row">
        <div class="col-md-3 brand-about">

          <div class="brand-logo">
            <img src="<?php echo get_template_directory_uri() . '/img/TravelOMathwhite.png'; ?>" alt="logo">
          </div><!--./brand-logo-->

          <div class="copyright">
            © 2019<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, TravOMath.
          </div><!--./copyright-->

        </div><!--./brand-about-->

        <div class="col-md-6 footer-nav">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'secondary',
              'container' => false,
            ) );	
          ?>
        </div><!--./footer-nav-->

        <div class="col-md-3 footer-social">
          <div class="footer-widget">
            <ul class="f-social-link ">
              <li><a href="#" title="Follow on Instagram"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" title="Follow on Twitter"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" title="Follow on Facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" title="Follow on Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
              <li><a href="#" title="Follow on LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div><!--./footer-widget-->


        </div><!--./footer-social-->

      </div><!--./row-->

    </div><!--./footer-->

</div><!--./footer-wrapper-->


<a href="#" class="scrollup"><i class="fas fa-chevron-up"></i></a>

<?php wp_footer(); ?>
</body>

</html>
