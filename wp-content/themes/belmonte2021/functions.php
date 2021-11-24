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


/* Google API key */

	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyB3fEYzUVrANDuM8mlF3MrcJevAqg_NtPM');
	}
	add_action('acf/init', 'my_acf_init');




// Add theme support for Featured Images
	add_theme_support('post-thumbnails', array( 'post', 'page' ));

/* Hide Menu Items for Editors */
	function hide_menu() {
		global $current_user;
		$user_id = get_current_user_id();

		$user = wp_get_current_user();
		$author = array( 'author' );
		$editor = array( 'editor' );

		if ( array_intersect( $author, $user->roles ) ) {
			remove_menu_page( 'index.php' );                    	//Dashboard
			remove_menu_page( 'upload.php' );                   	//Media
			remove_menu_page( 'edit.php' );            				//Entradas?
			remove_menu_page( 'edit-comments.php' );            	//Comments
			remove_menu_page( 'plugins.php' );                  	//Plugins
			remove_menu_page( 'options-general.php' );          	//Settings
			remove_menu_page( 'tools.php' );                    	//Tools
			remove_menu_page( 'general-settings' ); 	//Settings
			remove_menu_page( 'wpcf7' );          	//CONTACTO
		} elseif ( array_intersect( $editor, $user->roles ) ) {
			remove_menu_page( 'index.php' );                    	//Dashboard
			remove_menu_page( 'upload.php' );                   	//Media
			remove_menu_page( 'edit.php' );            				//Entradas?
			remove_menu_page( 'edit-comments.php' );            	//Comments
			remove_menu_page( 'plugins.php' );                  	//Plugins
			remove_menu_page( 'options-general.php' );          	//Settings
			remove_menu_page( 'tools.php' );                    	//Tools
			remove_menu_page( 'general-settings' ); 	//Settings
			remove_menu_page( 'wpcf7' );          	//CONTACTO

		} elseif ($user_id != '1') {
			remove_menu_page( 'index.php' );                    //Dashboard
			//remove_menu_page( 'edit.php' );            			//Entradas?
			remove_menu_page( 'edit-comments.php' );            //Comments
			remove_menu_page( 'plugins.php' );                  //Plugins
			remove_menu_page( 'options-general.php' );          //Settings
			remove_menu_page( 'tools.php' );                     //Tools
			remove_menu_page( 'options-general.php' );           //Settings
			remove_menu_page( 'general-settings' );              //Options
			remove_menu_page( 'wpcf7' );          //CONTACTO
			remove_menu_page( 'edit.php?post_type=acf-field-group' );   //ACF
			remove_menu_page( 'pp-capabilities' );   //CAPABILITIES
			remove_menu_page( 'themes.php' );   //THEMES
			//Hide KAYA PLUGIN PAGE.
			remove_menu_page( 'kayastudio-plugins-admin-main-page' );
			//Hide "CPT UI".
			remove_menu_page('cptui_main_menu');
			//Hide "CPT UI → Add/Edit Post Types".
			remove_submenu_page('cptui_main_menu', 'cptui_manage_post_types');
			//Hide "CPT UI → Add/Edit Taxonomies".
			remove_submenu_page('cptui_main_menu', 'cptui_manage_taxonomies');
			//Hide "CPT UI → Registered Types/Taxes".
			remove_submenu_page('cptui_main_menu', 'cptui_listings');
			//Hide "CPT UI → Tools".
			remove_submenu_page('cptui_main_menu', 'cptui_tools');
			//Hide "CPT UI → Help/Support".
			remove_submenu_page('cptui_main_menu', 'cptui_support');
			//Hide "CPT UI → About CPT UI".
			remove_submenu_page('cptui_main_menu', 'cptui_main_menu');
		}
	}
	add_action('admin_head', 'hide_menu');

// css admin wp FOR AUTHOR AND EDITOR
	function admin_style() {
			$user1 = wp_get_current_user();
			$author1 = array( 'author' );
			$editor1 = array( 'editor' );
			if ( array_intersect( $author1, $user1->roles ) ) {
				wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
				wp_enqueue_script( 'Magic', get_template_directory_uri() . '/js/admin-script.js', '', true );
			} elseif ( array_intersect( $editor1, $user1->roles ) ) {
				wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
				wp_enqueue_script( 'Magic', get_template_directory_uri() . '/js/admin-script.js', '', true );
			}
		}
	add_action('admin_enqueue_scripts', 'admin_style');


// REDIRECT HOMEPAGE
	// HIDE INDEX.PHP
	function hide_the_dashboard() {
		global $current_user;
		// is there a user ?
		if ( is_array( $current_user->roles ) ) {
			// substitute your role(s):
			if ( in_array( 'custom_role', $current_user->roles ) ) {
				// hide the dashboard:
				remove_menu_page( 'index.php' );
			}
		}
	}
	add_action( 'admin_menu', 'hide_the_dashboard' );


// CUSTOM POST TYPE COUNT?
	add_action('manage_users_columns','yoursite_manage_users_columns');
	function yoursite_manage_users_columns($column_headers) {
		unset($column_headers['posts']);
		$column_headers['custom_posts'] = 'Assets';
		return $column_headers;
	}

	add_action('manage_users_custom_column','yoursite_manage_users_custom_column',10,3);
	function yoursite_manage_users_custom_column($custom_column,$column_name,$user_id) {
		if ($column_name=='custom_posts') {
			$counts = _yoursite_get_author_post_type_counts();
			$custom_column = array();
			if (isset($counts[$user_id]) && is_array($counts[$user_id]))
				foreach($counts[$user_id] as $count) {
					$link = admin_url() . "edit.php?post_type=" . $count['type']. "&author=".$user_id;
					// admin_url() . "edit.php?author=" . $user->ID;
					$custom_column[] = "\t<tr><th><a href={$link}>{$count['label']}</a></th><td>{$count['count']}</td></tr>";
				}
			$custom_column = implode("\n",$custom_column);
			if (empty($custom_column))
				$custom_column = "<th>[none]</th>";
			$custom_column = "<table>\n{$custom_column}\n</table>";
		}
		return $custom_column;
	}

	function _yoursite_get_author_post_type_counts() {
		static $counts;
		if (!isset($counts)) {
			global $wpdb;
			global $wp_post_types;
			$sql = <<<SQL
			SELECT
			post_type,
			post_author,
			COUNT(*) AS post_count
			FROM
			{$wpdb->posts}
			WHERE 1=1
			AND post_type NOT IN ('revision','nav_menu_item')
			AND post_status IN ('publish','pending', 'draft')
			GROUP BY
			post_type,
			post_author
			SQL;
			$posts = $wpdb->get_results($sql);
			foreach($posts as $post) {
				$post_type = $post->post_type;
				$post_author = $post->post_author;
				$post_type_object = $wp_post_types[$post_type];
				if (!empty($post_type_object->label))
					$label = $post_type_object->label;
				else if (!empty($post_type_object->labels->name))
					$label = $post_type_object->labels->name;
				else
					$label = ucfirst(str_replace(array('-','_'),' ',$post_type));
				if (!isset($counts[$post_author])) {
					$counts[$post_author] = array();
					$counts[$post_author][] = array(
						'label' => $label,
						'count' => $post->post_count,
						'type' => $post->post_type,
					);
				}
			}
		}
		return $counts;
	}

// HIDE POST MEDIA BY OTHERS
	function hide_posts_media_by_other($query) {
		global $pagenow;

		if( ( 'edit.php' != $pagenow && 'upload.php' != $pagenow   ) || !$query->is_admin ){
			return $query;
		}

		if( !current_user_can( 'manage_options' ) ) {
			global $user_ID;
			$query->set('author', $user_ID );
		}
		return $query;
	}
	add_filter('pre_get_posts', 'hide_posts_media_by_other');

	/*
	 * Hide Media Images
	 */
	add_filter( 'posts_where', 'hide_attachments_wpquery_where' );
	function hide_attachments_wpquery_where( $where ){
		global $current_user;
		if( !current_user_can( 'manage_options' ) ) {
			if( is_user_logged_in() ){
				if( isset( $_POST['action'] ) ) {
					// library query
					if( $_POST['action'] == 'query-attachments' ){
						$where .= ' AND post_author='.$current_user->data->ID;
					}
				}
			}
		}

		return $where;
	}
