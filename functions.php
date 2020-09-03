<?php
//Copyright
function copyright()
  { ?>
 <meta name="copyright" content="Copyright (c) SmartyPants Design. All Rights Reserved." />
<?php }
add_action('wp_head', 'copyright');
//Title
add_theme_support( 'title-tag' );
//Add site specific favicon
function SPD_favicon()
  { ?>
 <link rel="shortcut icon" href="http://www.smartypantsdesign.ca/public/favicon.png" />
 <link rel="apple-touch-icon" href="http://www.smartypantsdesign.ca/public/apple-touch-icon.png" />
 <link rel="apple-touch-icon" sizes="72x72" href="http://www.smartypantsdesign.ca/public/apple-touch-icon-ipad.png" />
 <link rel="apple-touch-icon" sizes="114x114" href="http://www.smartypantsdesign.ca/public/apple-touch-icon-iphone4.png" />
<?php }
add_action('wp_head', 'SPD_favicon');
//Load Google Font (prevents failure in https)
function mytheme_SPD_fonts()
{
  wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic:latin');
  wp_enqueue_style( 'googleFonts');
  wp_register_style('googleFonts2', '//fonts.googleapis.com/css?Playfair+Display:400,400italic,700,700italic,900,900italic:latin');
  wp_enqueue_style( 'googleFonts2');
}
add_action('init', 'mytheme_SPD_fonts');
//Remove WP Generator Meta Tag
remove_action('wp_head', 'wp_generator');
//Remove feeds links in header.
function remove_thefeeds()
{
  remove_theme_support( 'automatic-feed-links' ); //remove feed links in head
}
add_action( 'after_setup_theme', 'remove_thefeeds', 100 );
// No Self Pings - ERROR 500
//function no_self_ping( &$links ) {
//	$home = get_option( 'home' );
//	foreach ( $links as $l => $link )
//		if ( 0 === strpos( $link, $home ) )
//			unset($links[$l]);
//}
//add_action( 'pre_ping', 'no_self_ping' );
//disables WYSIWYG editor everywhere
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);
// Disable WYSIWYG for wp-client
add_filter('user_can_richedit', 'disable_wyswyg_for_custom_post_type');
function disable_wyswyg_for_custom_post_type( $default ){
  global $post;
  if( $post->post_type === 'portalhub') return false;
  return $default;
}
//Register Menu(s)
function register_my_menus()
{
  register_nav_menu('primary', __( 'Primary Menu' ));
}
add_action( 'init', 'register_my_menus' );
require_once 'functions/adminmenus.php';
//Remove Default Widget Areas
function lose_the_widgets ()
{
  unregister_sidebar( 'sidebar-1' );
  unregister_sidebar( 'sidebar-2' );
  unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'lose_the_widgets' );
//Add New Widget Areas
function add_some_widgets()
{
  register_sidebar( array(
      'name' => __( 'Sidebar', 'sidebar' ),
      'id' => 'sidebar',
      'description' => __( 'This will be displayed followed by the regular sidebar', 'spd' ),
      'before_widget' => '<div id="sidebar-%i" class="widget"><div class="widgetcontent">',
      'after_widget' => '</div></div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );
}
add_action( 'widgets_init', 'add_some_widgets' );
//Update Featured Image Size
update_option( 'post-thumbnail_size_w', 240 );
update_option( 'post-thumbnail_size_h', 240 );
update_option( 'post-thumbnail_crop', 1 );
//Image Compression
function custom_theme_setup()
{
  add_theme_support( 'advanced-image-compression' );
  add_filter('jpeg_quality', create_function('', 'return 100;'));
  add_filter('wp_editor_set_quality', create_function('', 'return 100;'));
}
//add_action( 'after_setup_theme', 'custom_theme_setup' );
//* Login Screen: Change login logo
function SPD_custom_login_logo()
{
  echo '<style type="text/css">
    h1 a { background-image:url(https://www.smartypantsdesign.ca/public/apple-touch-icon-ipad.png) !important; background-size: 72px 72px !important;height: 72px !important; width: 72px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
    .login form { margin-top: 10px !important; }
    </style>';
}
add_action( 'login_head', 'SPD_custom_login_logo' );
//* Change the URL of the WordPress login logo
function SPD_url_login_logo()
{
  return site_url();;
}
add_filter('login_headerurl', 'SPD_url_login_logo');
//* Login Screen: Set 'remember me' to be checked
function SPD_login_checked_remember_me()
{
  add_filter( 'login_footer', 'SPD_rememberme_checked' )
  ;
}
function SPD_rememberme_checked()
{
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
add_action( 'init', 'SPD_login_checked_remember_me' );
require_once 'functions/disable-deactivate.php';
?>