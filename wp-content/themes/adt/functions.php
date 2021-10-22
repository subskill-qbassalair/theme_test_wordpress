<?php
//debug
define('WP_DEBUG', true);


/**
 * adt functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adt
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'adt_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adt_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on adt, use a find and replace
		 * to change 'adt' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adt', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Mon menu principal', 'adt' ),
			)
		);
		require_once("inc/Adt_Walker_nav_menu.php");

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'adt_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'adt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adt_content_width', 640 );
}
add_action( 'after_setup_theme', 'adt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adt_scripts() {
	wp_enqueue_style( 'adt-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adt-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adt_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


///////////////////////////// Custom search


add_filter('pre_get_posts','custom_search_filter');

 function custom_search_filter( $query ) {

    if ( $query->is_search ) {

 	switch( $_GET['search']  ) {

	    case 'cat1':
 		$query->set( 'post_type','equipe' );
 		break;

 	    case 'cat2':
		$query->set( 'post_type','membre' );
 		break;
 	}
     }
     return $query;
 }

 ///////////////////////////////////////////// Fonction csv

function create_export_data(){
		//EXPORT PART
		$args = array(
			'numberposts' => -1 ,
			'post_type' => "membre",
		);

		$membres = get_posts($args);
		$headers = array("Nom", "Prenom", "Equipe");


		$fields   = [];
		$infos    = [];

		array_push($fields, $headers);

		foreach($membres as $key => $membre){
			$infos[]      = get_field("nom", $membre->ID);
			$infos[]      = get_field("prenom", $membre->ID);
			$equipe       = get_field("equipe", $membre->ID);
			$equipe_name  = $equipe[0]->post_name;
			$infos[]      = $equipe_name;
			array_push($fields, $infos);

			$infos = [];
		}

		$path = get_stylesheet_directory();

		$infos_membre = fopen($path . "/exports/" . "infos_membre.csv", "w");

		foreach($fields as $field) {
			fputcsv($infos_membre, $field, ";");
		}
		fclose($infos_membre);


		//  TODO : 
		// - GET membres (get_posts())  --  sans limite de nombre (on prend la totalité)
		// - fopen en PHP
		// - fputcsv en PHP 
		// - fclose 
		// ------ créer un fichier CSV enregistré dans le dossier du thème avec toutes les infos des membres 
		// - header type csv pour envoyer l'information au navigateur qu'il faut télécharger le fichier CSV créé 

}

function create_button_export(){
	global $post;
	if( $post->post_type == "membre" ) {
		echo '<a href="#"><input type="submit" name="export" class="button-primary" value="Exporter"></a>';
	}
}

function export_data_button() {
	// Membres 
	if( $_GET['post_type'] == "membre" ) {
		// DOWNLOAD PART
		if(!empty($_GET['export']) && $_GET['export'] == "Exporter") {
		
			$args = array(
				'numberposts' => -1 ,
				'post_type' => "membre",
			);
	
			$membres = get_posts($args);
			$headers = array("Nom", "Prenom", "Equipe");
	
	
			$fields   = [];
			$infos    = [];
	
			array_push($fields, $headers);
	
			foreach($membres as $key => $membre){
				$infos[]      = get_field("nom", $membre->ID);
				$infos[]      = get_field("prenom", $membre->ID);
				$equipe       = get_field("equipe", $membre->ID);

				$equipe_name  = $equipe[0]->post_name;
				$infos[]      = $equipe_name;
				array_push($fields, $infos);
	
				$infos = [];
			}
	
			$path = get_stylesheet_directory();
	
			$filename = "infos_membre.csv";
			$filepath = get_stylesheet_directory() . "/exports/";
			$infos_membre = fopen($filepath . $filename, "w");
	
			foreach($fields as $field) {
				fputcsv($infos_membre, $field, ";");
			}
			fclose($infos_membre);


			if(!empty($filename)){
				ob_start();
				$content = ob_get_contents();
				@ob_end_clean();

				//header("Cache-Control: public");

				//header("Content-Description: File Transfer");
				@header('Content-Type: application/csv');
				@header("Content-Disposition: attachment; filename=".$filename);
				@header("Content-Length: " . filesize($filepath . $filename));
				@readfile($filepath . $filename);
				@unlink($filepath . $filename);
				exit;
			} 
			// else {
			// 		echo "This File Does not exist.";
			// }
	}
	}
}


add_action('manage_posts_extra_tablenav', "create_button_export" );
add_action('admin_init',  "export_data_button" );











// @ADD CLASS ON <LI></LI> menu
// function add_additional_class_on_li($classes, $item, $args) {
// 		if(isset($args->add_li_class)) {
// 			$classes[] = $args->add_li_class;
// 		}
// 	return $classes;
// 	}
// 	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);