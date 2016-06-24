<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/includes/jquery-1.7.2.min.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/includes/jquery.mobile-1.1.1/jquery.mobile-1.1.1.min.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/jquery.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/jsjquery.easing.min.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/jquery.fittext.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/wow.min.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/creative.js', array( 'jquery' ) );

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
 
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

 
?>
 