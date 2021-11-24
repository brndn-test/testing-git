<?php
// Belmonte

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/


/* Proper way to enqueue scripts and styles */

	function belmonte_scripts() {
		wp_enqueue_style( 'FontAwesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
		wp_enqueue_style( 'Style', get_stylesheet_uri() );

		if ( is_page( 'barbetta' ) ) {

			wp_enqueue_style( 'Barbetta-styles', get_template_directory_uri() . '/barbetta/css/style.css', '1.1');
			wp_enqueue_script( 'Barbetta-script', get_template_directory_uri() . '/barbetta/js/site.js', array('jquery'), '1.2' );

		} else {

			wp_enqueue_style( 'Main-styles', get_template_directory_uri() . '/css/style.css', '1.2');
	
			wp_enqueue_script( 'Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '0.1', true );
			wp_enqueue_script( 'Slickjs', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'Masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '1.1', true );
			wp_enqueue_script( 'Main-script', get_template_directory_uri() . '/js/site.js', array('jquery'), '1.1' );

			/*
			* ACF GOOGLE MAPS
			wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB3fEYzUVrANDuM8mlF3MrcJevAqg_NtPM', array(), '3', true );
			wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/maps.js', array('google-map', 'jquery'), '1.1', true ); 
			*/
	
			/* 
			* AJAX
			wp_localize_script( 'target-script-name', 'set_ajax_var_name', array(
				'url'    => admin_url( 'admin-ajax.php' ),
				'nonce'  => wp_create_nonce( 'ajax-nonce-name' ),
				'action' => 'action_name'
			)); 
			*/
	
			// CONDITIONAL ENQUE 
			if( is_front_page() ) {
				wp_enqueue_script( 'Marquee-script', get_template_directory_uri() . '/js/marquee.js', array(), '2.2' );
			}
			/* 
			if( is_page( 'page-name' ) ) {
				wp_enque...
			}
			*/

		}

	}
	add_action( 'wp_enqueue_scripts', 'belmonte_scripts' );


/* Add options pages */

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Opciones Generales',
			'menu_title'	=> 'Opciones',
			'menu_slug' 	=> 'general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Opciones de Header',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'general-settings',
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Opciones de Footer',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'general-settings',
		));
	}




/* Allow .SVG */

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types', 1, 1);

// Add theme support for Featured Images
	add_theme_support('post-thumbnails', array( 'post', 'page' ));
