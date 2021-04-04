<?php

/*
	
@package travomath
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}

/*Active HTML5 */
add_theme_support( 'html5', array('search-form') );

add_theme_support( 'post-thumbnails' );

/* Activate Nav Menu Option */
function travomath_register_nav_menu() {
	register_nav_menu( 'primary', 'Header Navigation Menu' );
	register_nav_menu( 'secondary', 'Footer Navigation Menu' );
}
add_action( 'after_setup_theme', 'travomath_register_nav_menu' );


/* Custom Logo Support */
add_theme_support( 'custom-logo' );

function travomath_get_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$logo_url = $logo[0];
	//var_dump($logo)
	if ( has_custom_logo() ) {
			echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo( 'name' ) . '">';
	} else {
			echo '<img src="'. get_template_directory_uri() . '/img/TravelOMath.png" alt="' . get_bloginfo( 'name' ) . '">';
	}
}

/*
	========================
		BLOG LOOP CUSTOM FUNCTIONS
	========================
*/

function travomath_posted_footer(){
	
	$comments_num = get_comments_number();
	if( comments_open() ){
		if( $comments_num == 0 ){
			$comments = __('No Comments');
		} elseif ( $comments_num > 1 ){
			$comments= $comments_num . __(' Comments');
		} else {
			$comments = __('1 Comment');
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments .' <span class="sunset-icon sunset-comment"></span></a>';
	} else {
		$comments = __('Comments are closed');
	}
	
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list('<div class="tags-list">', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';
}

function travomath_get_attachment( $num = 1 ){
	
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
	return $output;
}


function travomath_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	
	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	else:
		$output = $embed[0];
	endif;
	
	return $output;
}


/*
    ========================
        SIDEBAR FUNCTIONS
    ========================
*/
function travomath_sidebar_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('TravOMath News Letter', 'travomath'),
            'id' => 'travomath-newsletter-widget',
            'description' => 'Widgets For News Letter',
            'before_widget' => '<section id="%1$s" class="travomath-newsletter-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="travomath-newsletter-widget-title">',
            'after_title' => '</h2>',
        )
	);
	
	
    register_sidebar(
        array(
            'name' => esc_html__('TravOMath Travel By Location', 'travomath'),
            'id' => 'travomath-travelbylocation-widget',
            'description' => 'Widgets For Travel By Location',
            'before_widget' => '<section id="%1$s" class="travomath-travelbylocation-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="link-title">',
            'after_title' => '</h2>',
        )
	);
	
    register_sidebar(
        array(
            'name' => esc_html__('TravOMath Tips & Tricks', 'travomath'),
            'id' => 'travomath-tipsandtricks-widget',
            'description' => 'Widgets For Tips & Tricks',
            'before_widget' => '<section id="%1$s" class="travomath-tipsandtricks-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="link-title">',
            'after_title' => '</h2>',
        )
	);
	
    register_sidebar(
        array(
            'name' => esc_html__('TravOMath Travel Shops', 'travomath'),
            'id' => 'travomath-travelshops-widget',
            'description' => 'Widgets For Tips & Tricks',
            'before_widget' => '<section id="%1$s" class="travomath-travelshops-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="link-title">',
            'after_title' => '</h2>',
        )
	);
	
    register_sidebar(
        array(
            'name' => esc_html__('TravOMath Videos', 'travomath'),
            'id' => 'travomath-videos-widget',
            'description' => 'Widgets For Tips & Tricks',
            'before_widget' => '<section id="%1$s" class="travomath-videos-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="link-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'travomath_sidebar_init');

/*
	========================
		SINGLE POST CUSTOM FUNCTIONS
	========================
*/
function travomath_post_navigation(){
	
	$nav = '<div class="row">';
	
	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> %link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;
	
}

/*
function travomath_share_this( $content ){
	
	if( is_single() ){
	
		$content .= '<div class="sunset-shareThis"><h4>Share This</h4>';
				
		$title = get_the_title();
		$permalink = get_permalink();
		
		$twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
		
		$twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
			
		$content .= '<ul>';
		$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="sunset-icon sunset-twitter"></span></a></li>';
		$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="sunset-icon sunset-facebook"></span></a></li>';
		$content .= '</ul></div><!-- .sunset-share -->';
		
		return $content;
	
	} else {
		return $content;
	}
	
}
add_filter( 'the_content', 'travomath_share_this' );

*/

/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}


/**CUSTOM META BOXE */
$slider_active = get_option('homepage_slider');
if( @$slider_active == 1){
	add_action( 'add_meta_boxes', 'travomath_add_post_meta_box' );
	add_action( 'save_post', 'travomath_save_adding_slide_data' );
}

function travomath_add_post_meta_box() {
	add_meta_box( 'adding_slide_meta_box', 'Slider Option', 'travomath_add_slide_meta_callback', 'post', 'side', 'high' );
}

function travomath_add_slide_meta_callback( $post ) {
	wp_nonce_field( 'travomath_save_adding_slide_data', 'travomath_adding_slide_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_adding_slide_value_key', true );
	$checked = ( $value == 1 ? 'checked' : '' );
	
	echo '<label><input type="checkbox" id="travomath_add_slide_field" name="travomath_add_slide_field" value="1" '.$checked.' /> ADD TO SLIDER</label><br>';

}


function travomath_save_adding_slide_data( $post_id ) {

	if( ! isset( $_POST['travomath_adding_slide_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['travomath_adding_slide_meta_box_nonce'], 'travomath_save_adding_slide_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	$checked_or_unchecked = '';
	if( isset( $_POST['travomath_add_slide_field'] ) ) {
		$checked_or_unchecked = $_POST['travomath_add_slide_field'];
	}
	
	$my_data = $checked_or_unchecked;
	
	update_post_meta( $post_id, '_adding_slide_value_key', $my_data );
	
}

