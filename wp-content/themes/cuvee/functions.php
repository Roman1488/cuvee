<?php
function theme_scripts()
{
    // Register and including styles
    wp_enqueue_style('main_style', get_template_directory_uri().'/css/style.min.css', array(), false, '');
    //wp_enqueue_style('fonts', get_template_directory_uri().'/fonts/fonts.css', array(), false, '');

    // Register and including scripts
    //wp_deregister_script( 'jquery' );
    //wp_register_script( 'jquery', get_theme_file_uri( 'front-end/libs/jquery/dist/jquery.min.js' ), false, null, true );
    //wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script('main_scripts', get_template_directory_uri().'/js/scripts.min.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


function my_theme_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'my_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'my_theme' );

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

	add_image_size( 'my_theme-featured-image', 2000, 1200, true );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'my_theme' ),
		'social' => __( 'Social Links Menu', 'my_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );


}
add_action( 'after_setup_theme', 'my_theme_setup' );


function starter_customize_register( $wp_customize ) 
{
    $wp_customize->add_section( 'header_section' , array(
        'title'    => __( 'Header', 'starter' ),
        'priority' => 30
    ) );   

    $wp_customize->add_setting( 'header_color' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'    => __( 'Header Color', 'starter' ),
        'section'  => 'header_section',
        'settings' => 'header_color',
    ) ) );
}
add_action( 'customize_register', 'starter_customize_register');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

add_action('init', 'register_event_post_types');
function register_event_post_types(){
    register_post_type('event', array(
        'label'  => 'event',
        'labels' => array(
            'name'               => 'Events&Specials', // основное название для типа записи
            'singular_name'      => 'Event&Special', // название для одной записи этого типа
            'add_new'            => 'Add New ', // для добавления новой записи
            'add_new_item'       => 'Add New Event&Special', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit Event&Special', // для редактирования типа записи
            'new_item'           => 'New Event&Special', // текст новой записи
            'view_item'          => 'View Event&Special', // для просмотра записи этого типа.
            'search_items'       => 'Search Event&Special', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Event&Special', // название меню
        ),
        'menu_icon'           => 'dashicons-star-filled',
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'show_in_rest'        => false, // добавить в REST API. C WP 4.7
        'hierarchical'        => false,
        'supports'            => array('title','editor','thumbnail','revisions','excerpt'), // 'title','editor','author','thumbnail','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('post_tag', 'category'),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>