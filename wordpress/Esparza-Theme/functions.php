<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    //add_filter & special_nav_class will change the class name for the current navigation item
    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
    function special_nav_class($classes, $item){
        if( in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
    return $classes;
    }


    // Our custom post type function
    function create_posttype() {

    register_post_type( 'movies',
        // CPT Options
        array('labels' => array(
                            'name' => __( 'Web Parts' ),
                            'singular_name' => __( 'Web Part' )
                        ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'webparts'),
                'taxonomies' => array( 'webpartarea' ),

            )
        );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );


    // create two taxonomies, genres and writers for the post type "book"
    function create_book_taxonomies() {
        // Add new taxonomy, NOT hierarchical (like tags)
        $labels = array(
            'name'                       => _x( 'Web Part Areas', 'taxonomy general name' ),
            'singular_name'              => _x( 'Web Part Area', 'taxonomy singular name' ),
            'search_items'               => __( 'Search Web Part Areas' ),
            'all_items'                  => __( 'All Web Part Areas' ),
            'parent_item'                => __( 'Parent Web Part Area' ),
            'parent_item_colon'          => __( 'Parent Web Part Area:' ),
            'edit_item'                  => __( 'Edit Web Part Area' ),
            'update_item'                => __( 'Update Web Part Area' ),
            'add_new_item'               => __( 'Add New Web Part Area' ),
            'new_item_name'              => __( 'New Web Part Area Name' ),
            'menu_name'                  => __( 'Web Part Areas' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'webpart_areas' ),
        );

        register_taxonomy( 'webpartarea', array('webparts'), $args );
    }
    // hook into the init action and call create_book_taxonomies when it fires
    add_action( 'init', 'create_book_taxonomies', 0 );

?>