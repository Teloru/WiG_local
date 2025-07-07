<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

require_once('wp-advanced-search/wpas.php');
define('WPAS_URI', get_stylesheet_directory_uri() . '/wp-advanced-search');
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
    function my_theme_enqueue_styles() { 
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_action( 'wp_loaded','my_flush_rules' );
function my_flush_rules() {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

/*
 * Initialise les Custom Post-Types créés
 * ----------------------------------------------------------------------------*/
add_action( 'init', 'register_my_cpt_intervenantes', 10 );

function register_my_cpt_intervenantes() {
register_post_type( "intervenantes", array (
    'labels' => 
    array (
    'name' => 'intervenantes',
    'singular_name' => 'intervenante',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une nouvelle intervenante',
    'edit_item' => 'Modifier le intervenante',
    'new_item' => 'Nouvelle intervenante',
    'view_item' => 'Voir l intervenante',
    'search_items' => 'Chercher un intervenante',
    'not_found' => 'Aucun intervenante trouvé',
    'not_found_in_trash' => 'Aucun intervenante trouvé dans la corbeille',
    'parent_item_colon' => 'intervenante parent:',
    ),
    'description' => '',
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'map_meta_cap' => true,
    'capability_type' => 'post',
    'public' => true,
    'hierarchical' => false,
    'rewrite' => 
    array (
        'slug' => 'intervenantes',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    ),
    'has_archive' => true,
    'query_var' => 'intervenantes',
    'supports' => 
    array (
        0 => 'title',
        1 => 'editor'
    ),
    'show_ui' => true,
    'menu_position' => 30,
    'menu_icon' => false,
    'can_export' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
    )
    );
}
  
  
register_taxonomy('metiers', array('intervenantes'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Métiers' ),
            'singular_name' => __( 'métier' ),
            'search_items' =>  __( 'Rechercher un métier' ),
            'all_items' => __( 'Toutes les metiers' ),
            'edit_item' => __( 'Editer les metiers' ),
            'update_item' => __( 'Mettre à jour le métier' ),
            'add_new_item' => __( 'Ajouter un nouveau métier' ),
            'new_item_name' => __( 'Nom de le nouveau métier' ),
            'menu_name' => __( 'Métiers' ),
        ),
        'rewrite' => array(
            'slug' => 'metiers',
            'with_front' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_ui' => true,
        ),
    )
);

register_taxonomy('dept', array('intervenantes'), array(
    'hierarchical' => true,
    'labels' => array(
        'name' => __( 'Départements' ),
        'singular_name' => __( 'département' ),
        'search_items' =>  __( 'Rechercher un département' ),
        'all_items' => __( 'Toutes les départements' ),
        'edit_item' => __( 'Editer les départements' ),
        'update_item' => __( 'Mettre à jour le département' ),
        'add_new_item' => __( 'Ajouter un nouveau département' ),
        'new_item_name' => __( 'Nom de le nouveau département' ),
        'menu_name' => __( 'Départements' ),
    ),
    'rewrite' => array(
        'slug' => 'departements',
        'with_front' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_ui' => true,
    ),
)
);


function ajax_search() {
    $args = array();
    $args['wp_query'] = array( 'post_type' => array('intervenantes', 'field', 'param'), 
                               'orderby' => 'title',
                               'posts_per_page' =>'999',
                               'post_status' => 'publish',
                               'order' => 'ASC' );

    $args['form'] = array( 'auto_submit' => true );

    $args['form']['ajax'] = array( 'enabled' => true,
                                   'show_default_results' => true,
                                   'results_template' => 'template-ajax-results.php', // This file must exist in your theme root
                                   'button_text' => 'Afficher plus de résultats');

    $args['fields'][] = array( 'type' => 'search', 
                               'placeholder' => 'Rechercher' );
    $args['fields'][] = array('type' => 'html',
                               'value' => '<div class="wpas-and">et/ou</div>');
    $args['fields'][] = array('type' => 'taxonomy',
                               'allow_null' => 'sélectionner un métier',
                               'taxonomy' => 'metiers',
                               'format' => 'select');
    $args['fields'][] = array('type' => 'html',
                               'value' => '<div class="wpas-and">et/ou</div>');
    $args['fields'][] = array('type' => 'taxonomy',
                               'allow_null' => 'sélectionner un département',
                               'taxonomy' => 'dept',
                               'format' => 'select');                           
    $args['fields'][] = array( 'type' => 'reset',
                               'class' => 'button',
                               'value' => 'Effacer' );

    register_wpas_form('myform', $args);
}
add_action('init', 'ajax_search');


function ajax_search_res() {
    $args = array();
    $args['wp_query'] = array( 'post_type' => array('ressources'), 
                               'orderby' => 'title',
                               'posts_per_page' =>'3',
                               'post_status' => 'publish',
                               'order' => 'ASC' );

    $args['form'] = array( 'auto_submit' => true );

    $args['form']['ajax'] = array( 'enabled' => true,
                                   'show_default_results' => true,
                                   'results_template' => 'template-ajax-resultsRes.php', // This file must exist in your theme root
                                   'button_text' => 'Afficher plus de résultats');

    $args['fields'][] = array( 'type' => 'search', 
                               'placeholder' => 'Rechercher' );                 
    $args['fields'][] = array( 'type' => 'reset',
                               'class' => 'button',
                               'value' => 'Effacer' );

    register_wpas_form('myformRes', $args);
}
add_action('init', 'ajax_search_res');

// END ENQUEUE PARENT ACTION

/* CPT ressources */
add_action( 'init', 'register_my_cpt_ressources', 10 );

function register_my_cpt_ressources() {
register_post_type( "ressources", array (
    'labels' => 
    array (
    'name' => 'Ressources',
    'singular_name' => 'ressource',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une nouvelle ressource',
    'edit_item' => 'Modifier la ressource',
    'new_item' => 'Nouvelle ressource',
    'view_item' => 'Voir la ressource',
    'search_items' => 'Chercher une ressource',
    'not_found' => 'Aucun ressource trouvée',
    'not_found_in_trash' => 'Aucun ressource trouvée dans la corbeille',
    'parent_item_colon' => 'ressource parente:',
    ),
    'description' => '',
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'map_meta_cap' => true,
    'capability_type' => 'post',
    'public' => true,
    'hierarchical' => false,
    'rewrite' => 
        array (
            'slug' => 'ressources-new',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        ),
    'has_archive' => false,
    'query_var' => 'ressources',
    'supports' => 
    array (
        0 => 'title',
        1 => 'editor',
        3 => 'thumbnail', 
        4 => 'excerpt'
    ),
    'show_ui' => true,
    'menu_position' => 30,
    'menu_icon' => false,
    'can_export' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
    )
    );


}

register_taxonomy('categories-ressources', array('ressources'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Catégories' ),
            'singular_name' => __( 'categorie' ),
            'search_items' =>  __( 'Rechercher une catégorie' ),
            'all_items' => __( 'Toutes les catégories' ),
            'edit_item' => __( 'Editer les catégories' ),
            'update_item' => __( 'Mettre à jour la catégorie' ),
            'add_new_item' => __( 'Ajouter une nouvelle catégorie' ),
            'new_item_name' => __( 'Nom de la nouvelle catégorie' ),
            'menu_name' => __( 'Catégories' ),
        ),
        'rewrite' => array(
            'slug' => 'categories-ressources',
            'with_front' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_ui' => true,
        ),
    )
);


register_taxonomy('categories-formats', array('ressources'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Formats' ),
            'singular_name' => __( 'format' ),
            'search_items' =>  __( 'Rechercher un format' ),
            'all_items' => __( 'tous les formats' ),
            'edit_item' => __( 'Editer les formats' ),
            'update_item' => __( 'Mettre à jour le format' ),
            'add_new_item' => __( 'Ajouter un nouveau format' ),
            'new_item_name' => __( 'Nom du nouveau format' ),
            'menu_name' => __( 'Formats' ),
         ),
        'rewrite' => array(
            'slug' => 'categorie-formats'
        ),
        'with_front' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_ui' => true,
        'show_in_rest' => true,
    )
);
    
// Disable plugin update emails
add_filter( 'auto_plugin_update_send_email', '__return_false' );
