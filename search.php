<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
if
( strlen($query_string) > 0 )
{
  foreach
  ($query_args as $key => $string)
  {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  } // foreach
} //if
$search = new WP_Query($search_query);
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="innercontainer">
    <div id="mainbody" class="twocolcontent">
      <?php get_template_part( 'stickypost' ); ?>
      <?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<main id="maincontent">
      <section>
        <p>Total Results: <?php echo $total_results; ?></p>
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" class="archivesarticle">
           <div id="newscolumns">
            <div id="newscolumn1" class="newscolumn">
             <div class="newscolumncontent">
              <p class="postdate"><?php the_time('M') ?><br /><?php the_time('j') ?></p>
             </div>
            </div>
            <div id="newscolumn2" class="newscolumn">
             <div class="newsitem">
              <header>
               <h4 class="posttitle"><?php the_title(); ?></h4>
              </header>
              <?php the_content(); ?>
              <p>Read full article: <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
              <footer>
                <small>
                  <p>This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>.</p>
                <?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
                </small>
              </footer>
              <hr />
             </div>
            </div>
            <div style="clear:both;"></div>
           </div>
          </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(
  array(
    'mid_size' => 2,
  )
); ?>
          <?php wp_reset_postdata(); ?>
      </section>
    </main>
    <?php get_sidebar(); ?>
    <div style="clear:both;"></div>
    </div>
  </div>
<?php else : ?>
  <?php get_template_part( 'content-none' ); ?>
<?php endif; ?>
<?php get_footer(); ?>