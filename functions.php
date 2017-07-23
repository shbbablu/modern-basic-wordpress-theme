<?php
//include all style & script
include_once('/inc/shahadat_all_files.php');

include_once('/inc/menus.php');

/* Enable support for Post Formats. */
add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
add_theme_support( 'post-thumbnails' );
/* Set the image size by cropping the image */
add_image_size('slider',1024,360, true);
add_image_size('portfolio_image',400,305, true);
//add_image_size('post-thumbnail', 250, 250, true);
add_image_size( 'post-thumbnail-large', 750, 500, true ); /* blog thumbnail */
//add_image_size( 'post-thumbnail-large-table', 600, 300, true ); /* blog thumbnail for table */
//add_image_size( 'post-thumbnail-large-mobile', 400, 200, true ); /* blog thumbnail for mobile */
//add_image_size('zerif_project_photo', 285, 214, true);
//add_image_size('zerif_our_team_photo', 174, 174, true);
    
   
// Our custom post type function========================//

function create_posttype() {//custom pst type for slider=======//
 register_post_type( 'slider',

                        array(
                            'labels' => array(
                                'name' => __( 'slider' ),
                                'singular_name' => __( 'slide' )

                            ),

                            'public' => true,

                            'has_archive' => true,

                            'rewrite' => array('slug' => 'slide'),
                            
                            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments','custom-fields', ),
                ));
    
    
register_post_type( 'Services',//custom post type for service============//
                        array(
                            'labels' => array(
                                'name' => __( 'Services' ),
                                'singular_name' => __( 'Service' )

                            ),

                            'public' => true,

                            'has_archive' => true,

                            'rewrite' => array('slug' => 'Services'),
                            
                            'supports' => array( 'title', 'editor', 'excerpt','custom-fields', ),
                ));
    
    
register_post_type( 'portfolio',//custom post type for portfolio=============//
                        array(
                            'labels' => array(
                                'name' => __( 'portfolio' ),
                                'singular_name' => __( 'portfolio' )

                            ),

                            'public' => true,

                            'has_archive' => true,

                            'rewrite' => array('slug' => 'portfolio'),
                            
                            'supports' => array( 'title', 'editor', 'excerpt','custom-fields','thumbnail' ),
                ));

}

add_action( 'init', 'create_posttype' );//finish of custom post type================//

?>




<?php 
//============this is for widget registration=================//
function theme_slug_widgets_init() {//===========sidebar registration===========//
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.' ),
        'before_widget' => '<div class="col-lg-3"><div class="widget widget_extra_class">',
	    'after_widget'  => '</div></div>',
	    'before_title'  => '<h5 class="widgetheading">',
	    'after_title'   => '</h5>',
    ) );
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
    
?>



<?php 
//================shortcode registration===================//
function shortcode_with_attributes( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(//===========shortcode for buttons===========//
        'link' => '',
        'type' => '',
        'icon' => '',
        'text' => '',
    ), $atts ) );
    
    if($icon == twitter) :
        return '<a href="'.$link.'" class="btn btn-'.$type.'"><i class="fa fa-'.$icon.'"></i> '.$text.'</a>';
    elseif($icon == facebook) :
        return 'facebook';
    else:
        return '<a href="'.$link.'" class="btn btn-'.$type.' ">'.$text.'</a>';
    endif;
}   
add_shortcode('btn', 'shortcode_with_attributes');

?>


<?php 

function shortcode_progress_bar( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(//===========shortcode for progress bars===========//
      
        'value' => '',
        'active' => '',
        'type' => '',
         'text' => '',
    ), $atts ) );
    
   
        return '<div class="progress progress-bar-'.$type.' progress-striped ">
              <div class="progress-bar" role="progressbar" aria-valuenow="'.$value.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$value.'">
                <span class="sr-only">'.$text.'</span>
              </div>
            </div>'
            
            ;
          

}   
add_shortcode('bar', 'shortcode_progress_bar');


function pricing_shortcodes( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(//===========shortcode for pricing box===========//
        'head_1' => 'very',
        'head_2' => 'Basic',
        'price' => '$15/year',
        'btn_text' => 'register',
        'btn_type' => 'theme',
        'btn_link' => '#',
        'column' => '4'
        
    ), $atts ) );
 
    return '
    <div class="col-lg-'.$column.'">
        <div class="pricing-box-alt">
            <div class="pricing-heading">
                <h3>'.$head_1.' <strong>'.$head_2.'</strong></h3>
            </div>
            <div class="pricing-terms">
                <h6>'.$price.'</h6>
            </div>
            <div class="pricing-content">
                '.$content.'
            </div>
            <div class="pricing-action">
                <a href="'.$btn_link.'" class="btn btn-medium btn-'.$btn_type.'"><i class="icon-bolt"></i> '.$btn_text.'</a>
            </div>
        </div>
    </div>
    ';
}   
add_shortcode('Pricing', 'pricing_shortcodes');



// Hooks your functions into the correct filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = get_template_directory_uri() .'/js/mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}






function custom_shortcode($atts, $content = null ){
            extract( shortcode_atts( array(
                'type' => 'post',
                'count' => '6',
            ), $atts) );

            $q = new WP_Query(
                array('posts_per_page' => $count, 'post_type' => $type,)
                );		


            $list = '<ul>';
            while($q->have_posts()) : $q->the_post();
                
                $list .= '
                
                <li><a href="'.get_permalink().'">'.get_the_title().'</a></li>
                
                ';        
            endwhile;
            $list.= '</ul>';
            wp_reset_query();
            return $list;
        }
add_shortcode('post', 'custom_shortcode');	





function portfolio_shortcode($atts, $content = null ){
	extract( shortcode_atts( array(
		'expand' => '',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => '4', 'post_type' => 'portfolio')
        );		
		
		
	$list = '<div class="row">
				<section id="projects">
					<ul id="thumbs" class="portfolio">';
    
    
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
    
		$portfolio_small = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio_image'); 
		$portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail-large'); 
    
		$list .= '
        
        
        <!-- Item Project and Filter Name -->
                                            <li class="col-lg-3 design" data-id="id-0" data-type="web">
                                                <div class="item-thumbs">
                                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.get_the_title().'" href="'.$portfolio_large[0].'">
                                                <span class="overlay-img"></span>
                                                <span class="overlay-img-thumb font-icon-plus"></span>
                                                </a>
                                                <!-- Thumb Image and Description -->
                                                <img src="'.$portfolio_small[0].'" alt="'.get_the_title().'"/>
                                                </div>
                                            </li>';  endwhile;
	$list.= '</ul></section></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('custom', 'portfolio_shortcode');	


?>





