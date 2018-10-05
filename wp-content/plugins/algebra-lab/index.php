<?php
/**
 * Plugin Name: Algebra Lab Plugin
 * Plugin URI: algebra.hr/lab/
 * Description: All custom functions and scripts are here
 * Version: 1.0.0
 * Author: Maja Brkljačić & Boris Agatić
 * Author URI: blocksize.hr
 * License: GPL2
 */



 /*
* Creating a function to create our CPT Challenges
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Challenges', 'Post Type General Name', 'algebra-lab' ),
        'singular_name'       => _x( 'Challenge', 'Post Type Singular Name', 'algebra-lab' ),
        'menu_name'           => __( 'Challenges', 'algebra-lab' ),
        'parent_item_colon'   => __( 'Parent Challenge', 'algebra-lab' ),
        'all_items'           => __( 'All Challenges', 'algebra-lab' ),
        'view_item'           => __( 'View Challenge', 'algebra-lab' ),
        'add_new_item'        => __( 'Add New Challenge', 'algebra-lab' ),
        'add_new'             => __( 'Add Challenge', 'algebra-lab' ),
        'edit_item'           => __( 'Edit Challenge', 'algebra-lab' ),
        'update_item'         => __( 'Update Challenge', 'algebra-lab' ),
        'search_items'        => __( 'Search Challenge', 'algebra-lab' ),
        'not_found'           => __( 'Not Found', 'algebra-lab' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'algebra-lab' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'challenge', 'algebra-lab' ),
        'description'         => __( 'Challenges are the main custom post type of this application', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array('post_tag','category'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'challenges', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );



/*
* Creating a function to create our CPT Idea
*/

// function custom_post_type_idea() {
//
// // Set UI labels for Custom Post Type
//    $labels = array(
//        'name'                => _x( 'Ideas', 'Post Type General Name', 'algebra-lab' ),
//        'singular_name'       => _x( 'Idea', 'Post Type Singular Name', 'algebra-lab' ),
//        'menu_name'           => __( 'Ideas', 'algebra-lab' ),
//        'parent_item_colon'   => __( 'Parent Idea', 'algebra-lab' ),
//        'all_items'           => __( 'All Idea', 'algebra-lab' ),
//        'view_item'           => __( 'View Idea', 'algebra-lab' ),
//        'add_new_item'        => __( 'Add New Idea', 'algebra-lab' ),
//        'add_new'             => __( 'Add Idea', 'algebra-lab' ),
//        'edit_item'           => __( 'Edit Idea', 'algebra-lab' ),
//        'update_item'         => __( 'Update Idea', 'algebra-lab' ),
//        'search_items'        => __( 'Search Idea', 'algebra-lab' ),
//        'not_found'           => __( 'Not Found', 'algebra-lab' ),
//        'not_found_in_trash'  => __( 'Not found in Trash', 'algebra-lab' ),
//    );
//
// // Set other options for Custom Post Type
//
//    $args = array(
//        'label'               => __( 'idea', 'algebra-lab' ),
//        'description'         => __( 'Ideas are the answers of this application', 'twentythirteen' ),
//        'labels'              => $labels,
//        // Features this CPT supports in Post Editor
//        'supports'            => array(  'author', 'revisions' ),
//        // You can associate this CPT with a taxonomy or custom taxonomy.
//
//        /* A hierarchical CPT is like Pages and can have
//        * Parent and child items. A non-hierarchical CPT
//        * is like Posts.
//        */
//        'hierarchical'        => true,
//        'public'              => true,
//        'show_ui'             => true,
//        'show_in_menu'        => true,
//        'show_in_nav_menus'   => true,
//        'show_in_admin_bar'   => true,
//        'menu_position'       => 5,
//        'can_export'          => true,
//        'has_archive'         => true,
//        'exclude_from_search' => false,
//        'publicly_queryable'  => true,
//        'capability_type'     => 'page',
//    );
//
//    // Registering your Custom Post Type
//    register_post_type( 'ideas', $args );
//
// }
//
// /* Hook into the 'init' action so that the function
// * Containing our post type registration is not
// * unnecessarily executed.
// */
//
// add_action( 'init', 'custom_post_type_idea', 0 );



//Change Comments to // IDEA:
function custom_gettext( $translated_text, $untranslated_text, $domain )
{
    if( FALSE !== stripos( $untranslated_text, 'comment' ) )
    {
            $translated_text = str_ireplace( 'Comment', 'Idea', $untranslated_text ) ;
    }
    return $translated_text;
}

is_admin() && add_filter( 'gettext', 'custom_gettext', 99, 3 );




 ?>
