<?php
    /**
 * oves_theme's functions and definitions
 *
 */

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

function oves_theme_custom_post_formats_setup() {
        add_post_type_support( 'page', 'post-formats' );
        //add_post_type_support( 'my_custom_post_type', 'post-formats' );
}

// Controle of onze functie bestaat als deze nog niet bestaat dan gaan ze onze functie inladen
if ( ! function_exists( 'oves_theme_setup' ) ) :
function oves_theme_setup() {
 
    /**
     * Toevoegen van default posts and comments RSS feed links in de <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Volgende post formaten inschakelen voor het thema oves_theme:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    add_action( 'init', 'oves_theme_custom_post_formats_setup' );

    /**
     * Inschakelen van post thumbnails en featured images voor het thema oves_theme.
     */
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    //add_theme_support( 'custom-logo' );

add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 300,
		'flex-width' => true,
	));
    add_theme_support( 'custom-background' );

  /*  $defaults = array(
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'default-color' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
     );
     add_theme_support( 'custom-background', $defaults );*/

    /**
     * 2 custom menu locations toevoegen...
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'Oves' ),
        'secondary' => __('Secondary Menu', 'Oves' ),
        'tertiary'  => __('Tertiary Menu', 'Oves'),
    ) );
}
endif; // oves_theme_setup
/**
 * Onze functie zal uitgevoerd worden in de after_setup_theme hook deze zal uitgevoerd 
 * worden voor de init hook. De init hook is te laat voor sommige functionaliteiten 
 * zoals enable post thumbnails,...
 */
add_action( 'after_setup_theme', 'oves_theme_setup' );

// In de functie add_theme_style gaan we een stylesheet toevoegen zodat WordPress deze gaat injecteren in de <head> van onze pagina...
function add_theme_scripts() {
  wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
  wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
  wp_register_style( 'OpenSans-Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,700|Open+Sans:300,400,400i,700' );

  wp_enqueue_script( 'bootstrap-js' );
  wp_enqueue_style( 'bootstrap-css' );

  wp_enqueue_style( 'OpenSans-Montserrat');
  wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery-v-2', 'http://code.jquery.com/jquery-2.1.3.min.js', false );

   wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0' );
    add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

  wp_enqueue_script( 'script', get_template_directory_uri() . '/main.js');


  
  //( $handle, $src, $deps, $ver, $in_footer );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
// In welke hook voeren we add_theme_scripts uit?




// Doe nu net hetzelfde voor een JavaScript.
// 1. Maak een JavaScript file aan en geef een alert weer met de tekst Gelukt!
// 2. Maak een functie voor de enqueue van de JS file.
// 3. Voeg de add_action toe zodat je functie zal uitgevoerd worden.
// 4. Controleer de uitvoering van je JavaScript.

// Maak een page template file aan en doe dit ook om specifieker te werken met id en slug...


function register_sidebar_locations() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary-sidebar',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'Main sidebar displaying the usual post info' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
    register_sidebar(
        array(
            'id'            => 'secondary-sidebar',
            'name'          => __( 'Secondary Sidebar' ),
            'description'   => __( 'Secondary sidebar with the twitter feed widget' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
     register_sidebar(
        array(
            'id'            => 'tertiary-sidebar',
            'name'          => __( 'Tertiary Sidebar' ),
            'description'   => __( 'Tertiary sidebar for links to social media' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'register_sidebar_locations' );

function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login/login_style.css');
}
add_action('login_enqueue_scripts', 'my_logincustomCSSfile');

function themename_custom_header_setup() {
    $args = array(
        'default-image'      => 'http://i.imgur.com/EEV6zOZ.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 350,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );

/* Filter the single_template with our custom function*/
add_filter('single_template', 'my_custom_template');

function my_custom_template($single) {

    global $wp_query, $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'model' ) {
        if ( file_exists( PLUGIN_PATH . '/modelpage/single-model.php' ) ) {
            return PLUGIN_PATH . '/modelpage/single-model.php';
        }
    }

    return $single;

}
