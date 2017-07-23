<?php 
function wpj_register_menu() {
         if (function_exists('register_nav_menu')) {
         register_nav_menu( 'main-menu', __( 'Main Menu') );
    }
        }
	function wpj_default_menu() {
        echo '<ul class="nav navbar-nav">';
        if ('page' != get_option('show_on_front')) {
        echo '<li><a href="'. home_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}
add_action('init', 'wpj_register_menu');

?>