<?php


function bbx_theme_setup() {
	if ( ! isset( $content_width ) ) $content_width = 1200;
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'after_setup_theme', 'bbx_theme_setup' );


function bbx_enqueue_scripts() {
	$js_directory = get_template_directory_uri() . '/javascript/';
	wp_register_script( 'global', $js_directory . 'global.js', 'jquery', '1.0' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'global' );
}
add_action( 'wp_enqueue_scripts', 'bbx_enqueue_scripts' );



// Page option

if( function_exists('acf_add_options_page') ) {
	// Page principale
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));

}


function check_user($post){
	global $post;
	$pageID = get_the_id();

	if((!is_user_logged_in()) && (get_field('active_cs', 'option')) && (get_field('page_coming_soon', 'option')) && ($pageID != get_field('page_coming_soon', 'option'))):
		wp_redirect(get_the_permalink(get_field('page_coming_soon', 'option')));
		die;
	endif;
}

add_action( 'wp', 'check_user' );


// POST TYPE

function create_post_type() {
  register_post_type( 'project',
    array(
      'labels' => array(
        'name' => __( 'Projets' ),
        'singular_name' => __( 'Projet' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_post_type' );


// Images Size
add_image_size( '1400x960', 1400, 960, true );
