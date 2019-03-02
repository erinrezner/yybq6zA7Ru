<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/wpcore.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/alignment.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <?php
if (is_front_page())
{
?>
        <style>
          #mainheader #pagetitle {
            display: none !important;
          }
        </style>
        <?php
}
?>
  </head>
  <?php
$page = $_SERVER['REQUEST_URI'];
$page = str_replace('/', '', $page);
$page = str_replace('.php', '', $page);
$page = str_replace('?s=', '', $page);
$page = $page ? $page : 'default';
?>
  <body id="<?php echo $page ?>" <?php body_class(); ?>>
    <section id="mainheader">
      <div class="innercontainer upperhead">
        <header id="headercolumns">
          <div id="headercolumn1" class="headercolumn">
            <hgroup class="headercolumncontent">
              <h1><a href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            </hgroup>
          </div>
          <div id="headercolumn2" class="headercolumn">
            <nav class="headercolumncontent">
              <?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'depth' => 1,
    'menu' => 'Main Navigation',
    'container_class' => 'responsive-menu',
    'menu_class' => 'responsive-menu'
  ));
?>
            </nav>
          </div>
          <div style="clear:both;"></div>
          <div id="headerdesc" class="headercolumncontent">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/SPD_ROCKET.png" />
            <h2 style="display:none;"><?php bloginfo( 'description' ); ?></h2>
            <h2>We create logos, print design &amp; websites,<br />to help you <span class="greenunder">launch</span> your business.</h2>
          </div>
          <div style="clear:both;"></div>
        </header>
      </div>
      <div id="pagetitle">
        <div class="innercontainer">
          <?php if (is_home() || is_archive() || is_category() || is_tag() || is_date() || is_tax())
{
  ?>News<?php
} elseif (is_search())
{
  ?>Search<?php
} else
{
  the_title();
} ?>
        </div>
      </div>
    </section>