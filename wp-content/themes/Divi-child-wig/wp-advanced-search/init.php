<?php
/**
 * Class Autoloader
 *
 * Adapted from PHP-FIG:
 * http://www.php-fig.org/psr/psr-4/examples/
 *
 */
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'WPAS\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

/**
 * Enqueue JavaScripts
 */
function wpas_scripts() {
    wp_enqueue_script( 'wpas-scripts', get_wpas_uri() . '/js/scripts.js', array('jquery'), '1', false );
    wp_enqueue_script( 'wpas-admin-ajax', admin_url( 'admin-ajax.php' ), array(), '1', false );
    wp_localize_script( 'wpas-admin-ajax', 'WPAS_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'wpas_scripts');

/**
 * Set AJAX Handler
 */
function wpas_ajax_load() {
    echo wpas_build_ajax_response($_POST);
    wp_die();
}
function cf_search_join( $join ) {
    global $wpdb;
    $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    return $join;
}
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
    $where = preg_replace(
        "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
        "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    return $where;
}
function cf_search_distinct( $where ) {
    global $wpdb;
    return "DISTINCT";
}

add_filter( 'posts_join', 'cf_search_join' );
add_filter( 'posts_where', 'cf_search_where' );
add_filter( 'posts_distinct', 'cf_search_distinct' );
add_action( 'wp_ajax_nopriv_wpas_ajax_load', 'wpas_ajax_load' );
add_action( 'wp_ajax_wpas_ajax_load', 'wpas_ajax_load' );