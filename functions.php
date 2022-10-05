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

	wp_enqueue_style( 'tailword', tailword_asset( 'dist/css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailword', tailword_asset( 'dist/js/app.js' ), array(), $theme->get( 'Version' ) );
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

	if (in_array( 'menu-item-has-children', $item->classes ) ) {
		return 
			substr($item_output,0,-4) . 	
			'<svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
			</svg></a>';
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

	$wp_customize->add_section( 'first_contacts' , array(
		'title'      => __( 'Contatti', 'tailword' ),
		'priority'   => 30,
	));

	// ------

	$wp_customize->add_setting(
		'telephone', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'telephone', array(
		'label' => __( 'Telefono' ),
		'type' => 'text',
		'section' => 'first_contacts',
	));

	// ------

	$wp_customize->add_setting(
		'email', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'email', array(
		'label' => __( 'Email' ),
		'type' => 'text',
		'section' => 'first_contacts',
	));

	// ------

	$wp_customize->add_setting(
		'location', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'location', array(
		'label' => __( 'Posizione' ),
		'type' => 'text',
		'section' => 'first_contacts',
	));

	// ------

	$wp_customize->add_setting(
		'location_link', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'location_link', array(
		'label' => __( 'Link di Google Maps' ),
		'type' => 'text',
		'section' => 'first_contacts',
	));

	// ------

	$wp_customize->add_section( 'footer' , array(
		'title'      => __( 'Footer', 'tailword' ),
		'priority'   => 30,
	));

	// ------
	
	$wp_customize->add_setting(
		'facebook', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'facebook', array(
		'label' => __( 'Inserisci il link di facebook' ),
		'type' => 'text',
		'section' => 'footer',
	));

	// ------
	
	$wp_customize->add_setting(
		'instagram', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'instagram', array(
		'label' => __( 'Inserisci il link di instagram' ),
		'type' => 'text',
		'section' => 'footer',
	));

	// ------
	
	$wp_customize->add_setting(
		'twitter', array(
			'type' => 'theme_mod',
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control( 'twitter', array(
		'label' => __( 'Inserisci il link di twitter' ),
		'type' => 'text',
		'section' => 'footer',
	));

	
	
}

add_action( 'customize_register', 'tailword_customize_register' );


function cuar_change_default_customer_page( $redirect_to ) {
	// customer-private-files is the slug where we want the user to be redirected to
	return 'customer-private-files';
}

// customer-home is the slug of the redirect page we want to change
add_filter( 'cuar/routing/redirect/root-page-to-slug?slug=' . 'customer-home', 'cuar_change_default_customer_page' );
