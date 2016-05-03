<?php
// Ajouter les images à la une sur les articles

add_theme_support( 'post-thumbnails' );


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Menu' ),
) );

register_nav_menus( array(
    'secondary' => __( 'Secondary Menu', 'Menu2' ),
) );


// Créer des Custom Post Type
add_action( 'init', 'create_post_type' );
function create_post_type() {

    // Dupliquer le register_post_type pour ajouter d'autres CPT

    register_post_type('metiers',
        array(
            'labels' => array(
                'name' => _x( 'Métiers', 'metiers' ),
                'singular_name' => _x( 'Métier', 'metier' ),
                'add_new' => _x( 'Ajouter', 'metier' ),
                'add_new_item' => _x( 'Ajouter un métier', 'metier' ),
                'edit_item' => _x( 'Editer un métier', 'metier' ),
                'new_item' => _x( 'Nouveau métier', 'metier' ),
                'view_item' => _x( 'Voir le métier', 'metier' ),
                'search_items' => _x( 'Rechercher un métier', 'metier' ),
                'not_found' => _x( 'Aucun produit trouvé', 'metier' ),
                'not_found_in_trash' => _x( 'Aucun produit dans la corbeille', 'metier' ),
                'parent_item_colon' => _x( 'Métier parent :', 'metier' ),
                'menu_name' => _x( 'Métiers', 'metier' ),
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'taxonomies' => array( 'category')
        )
    );

    register_post_type('formations',
        array(
            'labels' => array(
                'name' => _x( 'Formations', 'formations' ),
                'singular_name' => _x( 'Formation', 'formation' ),
                'add_new' => _x( 'Ajouter', 'formation' ),
                'add_new_item' => _x( 'Ajouter une formation', 'formation' ),
                'edit_item' => _x( 'Editer une formation', 'formation' ),
                'new_item' => _x( 'Nouveau formation', 'formation' ),
                'view_item' => _x( 'Voir la formation', 'formation' ),
                'search_items' => _x( 'Rechercher une formation', 'formation' ),
                'not_found' => _x( 'Aucune formation trouvé', 'formation' ),
                'not_found_in_trash' => _x( 'Aucune formation dans la corbeille', 'formation' ),
                'parent_item_colon' => _x( 'Formation parent :', 'formation' ),
                'menu_name' => _x( 'Formations', 'formation' ),
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'taxonomies' => array( 'category')
        )
    );
	
    register_post_type('citation',
        array(
            'labels' => array(
                'name' => _x( 'Citation', 'citation' ),
                'singular_name' => _x( 'Citation', 'citation' ),
                'add_new' => _x( 'Ajouter', 'citation' ),
                'add_new_item' => _x( 'Ajouter une citation', 'citation' ),
                'edit_item' => _x( 'Editer une citation', 'citation' ),
                'new_item' => _x( 'Nouvelle citation', 'citation' ),
                'view_item' => _x( 'Voir la citation', 'citation' ),
                'search_items' => _x( 'Rechercher une citation', 'citation' ),
                'not_found' => _x( 'Aucune citation trouvé', 'citation' ),
                'not_found_in_trash' => _x( 'Aucune citation dans la corbeille', 'citation' ),
                'parent_item_colon' => _x( 'citation parent :', 'citation' ),
                'menu_name' => _x( 'Citation', 'citation' ),
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'taxonomies' => array( 'category')
        )
    );
	
    register_post_type('creation',
        array(
            'labels' => array(
                'name' => _x( 'Création', 'creation' ),
                'singular_name' => _x( 'Création', 'creation' ),
                'add_new' => _x( 'Ajouter', 'creation' ),
                'add_new_item' => _x( 'Ajouter une création', 'creation' ),
                'edit_item' => _x( 'Editer une création', 'creation' ),
                'new_item' => _x( 'Nouvelle création', 'creation' ),
                'view_item' => _x( 'Voir la creation', 'creation' ),
                'search_items' => _x( 'Rechercher une création', 'creation' ),
                'not_found' => _x( 'Aucune création trouvé', 'creation' ),
                'not_found_in_trash' => _x( 'Aucune creation dans la corbeille', 'creation' ),
                'parent_item_colon' => _x( 'creation parent :', 'creation' ),
                'menu_name' => _x( 'Création', 'creation' ),
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'taxonomies' => array( 'category')
        )
    );	

    flush_rewrite_rules();
}