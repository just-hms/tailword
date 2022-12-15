<?php

/**
 * Theme setup.
 */
function tailword_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailword' ),
			'secondary' => __( 'Secondary Menu', 'tailword' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailword_setup' );

/**
 * Enqueue theme assets.
 */
function tailword_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailword', tailword_asset( 'assets/css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailword', tailword_asset( 'assets/js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailword_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailword_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailword_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailword_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailword_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailword_nav_menu_add_submenu_class', 10, 3);

function parent_menu_dropdown( $item_output, $item, $depth, $args ) {

	if($args->theme_location !== "primary"){
		return $item_output;
	}
	// TODO find a way to extract the a tag

	if (in_array( 'menu-item-has-children', $item->classes ) ){
		
		$item_output = str_replace("class=\"", "class=\"lg:!px-5 cursor-pointer w-full lg:shadow lg:border lg:border-zinc-200 lg:rounded-xl ", $item_output);
		$item_output = str_replace("underline", "", $item_output);
		// TODO fix this
		// $item_output = preg_replace('\w[href="].*"', "", $item_output);
		$item_output = str_replace('<a', "<div", $item_output);

		return 
			substr($item_output,0,-4) . 	
			'<svg class="ml-1 w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
			</svg></div>';
    }
	
    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'parent_menu_dropdown', 10, 4 );


function tailword_nav_menu_add_anchor_class( $attr, $item, $args, $depth ) {


	if ( isset( $args->anchor_class ) ) {
		$attr['class'] = $args->anchor_class;
	}
	
	if ( isset( $args->{"anchor_class_$depth"} ) ) {
		$attr['class'] = $args->{"anchor_class_$depth"};
	}

	if (!$item->current) return $attr;

	if (isset($args->active_link)){
		$attr['class'] = $args->active_link;
	}

	if (isset($args->{"active_link_$depth"})){
		$attr['class'] = $args->{"active_link_$depth"};
	}


	return $attr;
}

add_filter( 'nav_menu_link_attributes', 'tailword_nav_menu_add_anchor_class', 10, 4);


function tailword_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'wp' , array(
		'title'      => __( 'Work in progress', 'tailword' ),
		'priority'   => 30,
	));

	$wp_customize->add_setting(
		'is_wp', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'is_wp', array(
		'label' => __( 'Attiva la modalità in lavorazione' ),
		'type' => 'checkbox',
		'section' => 'wp',
	));	

	// ---------------

	$wp_customize->add_setting(
		'wp_text', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'wp_text', array(
		'label' => __( 'Scritta sostitutiva' ),
		'type' => 'text',
		'section' => 'wp',
	));	
}

add_action( 'customize_register', 'tailword_customize_register' );


function cuar_change_default_customer_page( $redirect_to ) {
	// customer-private-files is the slug where we want the user to be redirected to
	return 'customer-private-files';
}

// customer-home is the slug of the redirect page we want to change
add_filter( 'cuar/routing/redirect/root-page-to-slug?slug=' . 'customer-home', 'cuar_change_default_customer_page' );




// remove comments
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
 
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});