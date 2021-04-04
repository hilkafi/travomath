<div class="hero-thumbnail">
    <a href="#">
        <img src="<?php echo travomath_get_attachment() ?>" alt=""> <!--./recommended 1280 x 426 3:1-->
        <div class="hero-info container">
            
            <!--BREADCRUMB START-->
            <div class="breadcrumb-outer">
                <div itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <?php get_breadcrumb(); ?>
                </div>
            </div>
            <!--./BREADCRUMB STOP-->

		    <?php the_title( '<h1 class="post-title">', '</h1>'); ?>
            
            <div class="meta-span">
                <span class="author-meta">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>,
                <span class="published-date"><?php echo the_date('M d Y'); ?></span>
            </div>
        </div><!--./hero-info-->
    </a>
</div> <!--./hero-thumbnail-->


<div class="main-content-wrapper container">
    <div class="row">
        <div class="main-content col-md-8">
            <div class="post-wrapper">
                <div class="post-body">
                    <?php the_content(); ?>
                </div><!--./post-body-->

                <div class="post-footer">
                    <div class="social-share">
                        <ul>
                            <li class="share-now"><i class="fas fa-share-alt"></i></li>
                            <li>
                                <a expr:href="&quot;https://www.facebook.com/sharer.php?u=&quot; + data:post.url.canonical" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a expr:href="&quot;https://twitter.com/intent/tweet?url=&quot; + data:post.url.canonical + &quot;&amp;text=&quot; + data:post.title" rel="nofollow" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a expr:href="&quot;https://www.linkedin.com/shareArticle?url=&quot; + data:post.url.canonical" rel="nofollow" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a expr:href="&quot;https://www.pinterest.com/pin/create/button/?url=&quot; + data:post.url.canonical + &quot;&amp;media=&quot; + data:post.featuredImage + &quot;&amp;description=&quot; + data:post.title" rel="nofollow" target="_blank" title="Pinterest">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a expr:href="&quot;https://api.whatsapp.com/send?text=&quot; + data:post.title + &quot; | &quot; + data:post.url.canonical" rel="nofollow" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <!-- <li>
                                <a expr:href="&quot;https://reddit.com/submit?url=&quot; + data:post.url.canonical + &quot;&amp;title=&quot; + data:post.title" rel="nofollow" target="_blank" title="Reddit"><i class="fab fa-reddit-alien"></i></a>
                            </li> -->
                            <li>
                                <a expr:href="&quot;mailto:?subject=&quot; + data:post.title + &quot;&amp;body=&quot; + data:post.url.canonical" rel="nofollow" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
                            </li>
                        </ul>
                    </div><!--./social-share-->
                </div><!--./post-footer-->
            </div><!--.post-wrapper-->
        </div><!--./main-content-->

        <div class="sidebar-content col-md-4">
            <?php get_sidebar(); ?>
        </div><!--./sidebar-content-->
    </div><!--./row-->


    <div class="pager">

        <div class="row">
        <div class="col-xs-6 previous-page">
            <i class="fas fa-long-arrow-alt-left"></i> <span><?php echo get_previous_post_link(); ?></span>
        </div>
        <div class="col-xs-6 next-page">
            <span><?php echo get_next_post_link(); ?></span> <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        </div>

    </div><!--./pager-->
    
    <?php 
 
        if ( comments_open() ):
            comments_template();
        endif;
    ?>
</div><!--./main-content-wrapper-->
