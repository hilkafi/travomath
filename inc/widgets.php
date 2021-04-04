<?php	
/*
	
@package travomath
	
	========================
		WIDGET CLASS
	========================
*/

class Travomath_Newsletter_Widget extends WP_Widget {
	
	// setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'travomath-newsletter-widget',
			'description' => 'Custom TravOMath News Letter Widget',
		);
		parent::__construct( 'travomath_newsletter', 'TravOMath NewsLetter', $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
        /*
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Subscribe To Our Weekly News Letter' );
		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
        $output .= '</p>'; 
        */
        
		echo '<p><strong>No options for this Widget!</strong></p>';
    }
    

   /* // update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		
		return $instance;
		
	}
    */
    

	//front-end display of widget
	public function widget( $args, $instance ) {
		
        echo $args['before_widget'];
        
        /*
        if( !empty( $instance[ 'title' ] ) ):
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
        endif;
        */
        
		?>
            <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup">
            <form action="https://compromath.us17.list-manage.com/subscribe/post?u=d3de034d77a2923f1dc47b2af&amp;id=0549bc24ad" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                <div id="mc_embed_signup_scroll">
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
            </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
            <div class="mc-field-group">
                <label for="mce-FNAME">Name  <span class="asterisk">*</span>
            </label>
                <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
            </div>
            
                <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d3de034d77a2923f1dc47b2af_0549bc24ad" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
            </div>
            
            <!--End mc_embed_signup-->
		<?php
		echo $args['after_widget'];
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Travomath_Newsletter_Widget' );
} );


/**
 * 
 * ===============================
 * TRAVEL BY LOCATION WIDGET
 * ==============================
 * 
 */


class Travomath_Hamburger_Menu_Widget extends WP_Widget {
	
	// setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'travomath-hamburgermenu-widget',
			'description' => 'Custom Hamburger Menu Widget',
		);
		parent::__construct( 'travomath_hamburgermenu', 'TravOMath Hamburger Menu', $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
        
        $widget_heading = ( !empty( $instance[ 'widget_heading' ] ) ? $instance[ 'widget_heading' ] : '' );
        $title_one = ( !empty( $instance[ 'title_one' ] ) ? $instance[ 'title_one' ] : 'Demo Title' );
        $link_one = ( !empty( $instance[ 'link_one' ] ) ? $instance[ 'link_one' ] : '#' );

        $title_two = ( !empty( $instance[ 'title_two' ] ) ? $instance[ 'title_two' ] : '' );
        $link_two = ( !empty( $instance[ 'link_two' ] ) ? $instance[ 'link_two' ] : '' );

        $title_three = ( !empty( $instance[ 'title_three' ] ) ? $instance[ 'title_three' ] : '' );
        $link_three = ( !empty( $instance[ 'link_three' ] ) ? $instance[ 'link_three' ] : '' );

        $title_four = ( !empty( $instance[ 'title_four' ] ) ? $instance[ 'title_four' ] : '' );
        $link_four = ( !empty( $instance[ 'link_four' ] ) ? $instance[ 'link_four' ] : '' );

        $title_five = ( !empty( $instance[ 'title_five' ] ) ? $instance[ 'title_five' ] : '' );
        $link_five = ( !empty( $instance[ 'link_five' ] ) ? $instance[ 'link_five' ] : '' );

        $title_six = ( !empty( $instance[ 'title_six' ] ) ? $instance[ 'title_six' ] : '' );
        $link_six = ( !empty( $instance[ 'link_six' ] ) ? $instance[ 'link_six' ] : '' );
        
        $output = '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'widget_heading' ) ) . '"><strong>Widget Title:</strong></label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'widget_heading' ) ) . '" name="' . esc_attr( $this->get_field_name( 'widget_heading' ) ) . '" value="' . esc_attr( $widget_heading ) . '"';

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_one' ) ) . '">Title One:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_one' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_one' ) ) . '" value="' . esc_attr( $title_one ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_one' ) ) . '">Link One:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_one' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_one' ) ) . '" value="' . esc_attr( $link_one ) . '"';
        $output .= '</p>'; 

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_two' ) ) . '">Title Two:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_two' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_two' ) ) . '" value="' . esc_attr( $title_two ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_two' ) ) . '">Link Two:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_two' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_two' ) ) . '" value="' . esc_attr( $link_two ) . '"';
        $output .= '</p>'; 

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_three' ) ) . '">Title Three:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_three' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_three' ) ) . '" value="' . esc_attr( $title_three ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_three' ) ) . '">Link Three:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_three' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_three' ) ) . '" value="' . esc_attr( $link_three ) . '"';
        $output .= '</p>'; 

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_four' ) ) . '">Title Four:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_four' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_four' ) ) . '" value="' . esc_attr( $title_four ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_four' ) ) . '">Link Four:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_four' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_four' ) ) . '" value="' . esc_attr( $link_four ) . '"';
        $output .= '</p>'; 

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_five' ) ) . '">Title Five:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_five' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_five' ) ) . '" value="' . esc_attr( $title_five ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_five' ) ) . '">Link Five:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_five' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_five' ) ) . '" value="' . esc_attr( $link_five ) . '"';
        $output .= '</p>'; 

        $output .= '<p>';
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title_six' ) ) . '">Title Six:</label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title_six' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title_six' ) ) . '" value="' . esc_attr( $title_six ) . '"';
        $output .= '</p>';
        $output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'link_six' ) ) . '">Link Six:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'link_six' ) ) . '" name="' . esc_attr( $this->get_field_name( 'link_six' ) ) . '" value="' . esc_attr( $link_six ) . '"';
        $output .= '</p>'; 
        
        echo $output;
    }
    

    // update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
        $instance[ 'widget_heading' ] = ( !empty( $new_instance[ 'widget_heading' ] ) ? strip_tags( $new_instance[ 'widget_heading' ] ) : '' );
        
		$instance[ 'title_one' ] = ( !empty( $new_instance[ 'title_one' ] ) ? strip_tags( $new_instance[ 'title_one' ] ) : '' );
		$instance[ 'link_one' ] = ( !empty( $new_instance[ 'link_one' ] ) ? strip_tags( $new_instance[ 'link_one' ] ) : '' );
        
        $instance[ 'title_two' ] = ( !empty( $new_instance[ 'title_two' ] ) ? strip_tags( $new_instance[ 'title_two' ] ) : '' );
		$instance[ 'link_two' ] = ( !empty( $new_instance[ 'link_two' ] ) ? strip_tags( $new_instance[ 'link_two' ] ) : '' );
            
        $instance[ 'title_three' ] = ( !empty( $new_instance[ 'title_three' ] ) ? strip_tags( $new_instance[ 'title_three' ] ) : '' );
		$instance[ 'link_three' ] = ( !empty( $new_instance[ 'link_three' ] ) ? strip_tags( $new_instance[ 'link_three' ] ) : '' );
        
        $instance[ 'title_four' ] = ( !empty( $new_instance[ 'title_four' ] ) ? strip_tags( $new_instance[ 'title_four' ] ) : '' );
		$instance[ 'link_four' ] = ( !empty( $new_instance[ 'link_four' ] ) ? strip_tags( $new_instance[ 'link_four' ] ) : '' );
        
        $instance[ 'title_five' ] = ( !empty( $new_instance[ 'title_five' ] ) ? strip_tags( $new_instance[ 'title_five' ] ) : '' );
		$instance[ 'link_five' ] = ( !empty( $new_instance[ 'link_five' ] ) ? strip_tags( $new_instance[ 'link_five' ] ) : '' );
        
        $instance[ 'title_six' ] = ( !empty( $new_instance[ 'title_six' ] ) ? strip_tags( $new_instance[ 'title_six' ] ) : '' );
		$instance[ 'link_six' ] = ( !empty( $new_instance[ 'link_six' ] ) ? strip_tags( $new_instance[ 'link_six' ] ) : '' );
		
		return $instance;
		
	}
    

	//front-end display of widget
	public function widget( $args, $instance ) {
		
        echo $args['before_widget'];
        
        
        if( !empty( $instance[ 'widget_heading' ] ) ):
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'widget_heading' ] ) . $args[ 'after_title' ];
        endif;
        
		?>
            <ul>
                <li><a href="<?php echo $instance['link_one'] ?>"><?php echo $instance['title_one'] ?></a></li>
                <li><a href="<?php echo $instance['link_two'] ?>"><?php echo $instance['title_two'] ?></a></li>
                <li><a href="<?php echo $instance['link_three'] ?>"><?php echo $instance['title_three'] ?></a></li>
                <li><a href="<?php echo $instance['link_four'] ?>"><?php echo $instance['title_four'] ?></a></li>
                <li><a href="<?php echo $instance['link_five'] ?>"><?php echo $instance['title_five'] ?></a></li>
                <li><a href="<?php echo $instance['link_six'] ?>"><?php echo $instance['title_six'] ?></a></li>
            </ul>
		<?php
		echo $args['after_widget'];
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Travomath_Hamburger_Menu_Widget' );
} );

