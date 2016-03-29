<?php
// Ajouter les images à la une sur les articles

add_theme_support( 'post-thumbnails' );


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Menu' ),
) );



// Créer des Custom Post Type
add_action( 'init', 'create_post_type' );
function create_post_type() {
    // Dupliquer le register_post_type pour ajouter d'autres CPT
    register_post_type('prestation',
        array(
            'labels' => array(
                'name' => 'prestations',
                'singular_name' => 'prestation'
            ),
            'public' => true,
            'supports' => array('thumbnail', 'editor', 'title')
        )
    );
}