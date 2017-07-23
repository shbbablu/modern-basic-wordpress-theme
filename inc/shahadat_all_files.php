<?php 
function learningWordPress_resources() {
	
wp_enqueue_style('shahadat-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
wp_enqueue_style('shahadat-owlcarousel', get_template_directory_uri() . '/css/fancybox/jquery.fancybox.css');
wp_enqueue_style('shahadat-font-awesome', get_template_directory_uri() . '/css/flexslider.css');
wp_enqueue_style('shahadat-style', get_template_directory_uri() . '/css/style.css');  
wp_enqueue_style('shahadat-skins', get_template_directory_uri() . '/skins/default.css');


	//[HERE A BIG PROBLEM I FOUND,THAT IS CANNOT FIND THE MAIN STYLESHEET.....IN THE HTML TEMPLATE THE RESPONSIVE IS BEHIND THE STYLE .CSS,BUT WHEN YOU CALL THAT IN FUNCTION.PHP THE STYLE.CSS MUST BE BEHIND THE RESPONSIVE.CSS]
    
  wp_enqueue_script('jquery');

 }

//registering scripts
wp_enqueue_script( 'shahadat-bootstrap', get_template_directory_uri() . '/js/jquery.easing.1.3.js"', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-parallax', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-smoothscroll', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-fitvids', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-owl.carousel', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-counterup', get_template_directory_uri() . '/js/portfolio/jquery.quicksand.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-waypoints', get_template_directory_uri() . '/js/portfolio/setting.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-isotope', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-magnific-popup', get_template_directory_uri() . '/js/animate.js', array(), '1.0.0', true );
wp_enqueue_script( 'shahadat-scripts', get_template_directory_uri() . '/js/custom.js',array(), '1.0.0', true );
    
    


add_action('wp_enqueue_scripts', 'learningWordPress_resources');
?>

