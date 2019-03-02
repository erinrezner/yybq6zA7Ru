<?php
//Custom Post Types
add_action('init', 'cptui_register_my_cpt_np_projects');
function cptui_register_my_cpt_np_projects()
{
  register_post_type('np-projects', array(
      'label' => 'Non Portfolio Projects',
      'description' => 'Projects that should not list under portfolio.',
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'edit.php?post_type=jetpack-portfolio',
      'capability_type' => 'page',
      'map_meta_cap' => true,
      'hierarchical' => false,
      'rewrite' => array(
        'slug' => 'nportfolio',
        'with_front' => true,
        'feeds' => false,
      ),
      'has_archive' => false,
      'show_in_nav_menus' => false,
      'query_var' => true,
      'exclude_from_search' => true,
      'menu_position' => 22,
      'supports' => array('title', 'editor', 'thumbnail', 'publicize', 'wpcom-markdown'),
      'taxonomies' => array('jetpack-portfolio-type', 'jetpack-portfolio-tag'),
      'labels' => array (
        'name' => 'Non Portfolio Projects',
        'singular_name' => 'Non Portfolio Project',
        'menu_name' => 'Non Portfolio Projects',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Project',
        'edit' => 'Edit',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view' => 'View Project',
        'view_item' => 'View Project',
        'search_items' => 'Search Projects',
        'not_found' => 'No Projects Found',
        'not_found_in_trash' => 'No Projects found in Trash',
        'parent' => 'Parent Project',
      )
    ) ); }
add_action('init', 'cptui_register_my_cpt_pressreleases');
function cptui_register_my_cpt_pressreleases()
{
  register_post_type('pressreleases', array(
      'label' => 'Press Releases',
      'description' => 'Press Releases',
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'edit.php',
      'capability_type' => 'post',
      'map_meta_cap' => true,
      'hierarchical' => false,
      'rewrite' => array(
        'slug' => 'pressreleases',
        'with_front' => true,
        'feeds' => false,
      ),
      'has_archive' => true,
      'show_in_nav_menus' => false,
      'query_var' => true,
      'menu_position' => 23,
      'supports' => array('title', 'editor', 'excerpt', 'trackbacks', 'revisions'),
      'taxonomies' => array('category', 'post_tag'),
      'menu_icon' => get_stylesheet_directory_uri() . '/images/press_release_16x16.png',
      'labels' => array (
        'name' => 'Press Releases',
        'singular_name' => 'Press Release',
        'menu_name' => 'Press Releases',
        'add_new' => 'Add Press Release',
        'add_new_item' => 'Add New Press Release',
        'edit' => 'Edit',
        'edit_item' => 'Edit Press Release',
        'new_item' => 'New Press Release',
        'view' => 'View Press Release',
        'view_item' => 'View Press Release',
        'search_items' => 'Search Press Releases',
        'not_found' => 'No Press Releases Found',
        'not_found_in_trash' => 'No Press Releases Found in Trash',
        'parent' => 'Parent Press Release',
      )
    ) ); }
//Disable Visual Editor for CPTs
function disable_visual_editor()
{
  if ( 'signature' == get_post_type() )
  {
    return false;
  }
  return true;
}
add_filter( 'user_can_richedit', 'disable_visual_editor' ); //was for the no-longer signature section
//Add new types to sitemap
function jeherve_add_cpt_sitemaps( $post_types )
{
  $post_types[] = 'pressreleases';
  return $post_types;
}
add_filter( 'jetpack_sitemap_post_types', 'jeherve_add_cpt_sitemaps' );
function jeherve_add_cpt_sitemaps2( $post_types )
{
  $post_types[] = 'np-projects';
  return $post_types;
}
add_filter( 'jetpack_sitemap_post_types', 'jeherve_add_cpt_sitemaps2' );
?>