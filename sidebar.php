<div class="sidebar-inner">

    <div class="widget">
        <h2 class="title">
        About Me
        </h2>

        <div class="side-profile">
        <div class="widget-content">
            <?php 
                $admin_picture = (get_option('profile_picture')) ? get_option('profile_picture') : get_template_directory_uri() . '/img/no_image.svg';
                $description =  (get_option('user_description')) ? get_option('user_description') : 'No Description Available';
            ?>
            <a href="#" class="about-img-link">
                <img src="<?php echo $admin_picture ?>" alt=""/>
            </a>
            <p><?php echo $description ?></p>

            <a href="<?php echo  home_url() . '/about'; ?>" class="about-me">Read More</a>

        </div><!--./widget-content-->

        </div><!--./side-profile-->
    </div><!--./widget-->

</div><!--./sidebar-inner-->