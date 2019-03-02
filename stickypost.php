<?php
//Display 1 sticky post
$sticky = get_option( 'sticky_posts' ); //Get all Sticky Posts
// Find way to check if published - scheduled posts are still sticky and don't display next sticky while it waits - BEFORE slicing down to just one.
//$sticky = get_post_status($sticky == "publish");
rsort( $sticky ); //Sort Sticky Posts, newest at the top
//$sticky = array_slice( $sticky, 0, 1 ); //Get Newest Sticky Post Only
$sticky = array_slice( $sticky, 0, 3 );  //Temporary fix to pull 3 sticky posts so a published post will show when another is scheduled
if ( isset($sticky[0]) )
{
  /* Query sticky posts */
  $args = query_posts( array(
      'posts_per_page' => 1, // Only display 1
      'post__in' => $sticky,
      'ignore_sticky_posts' => 1,
      'post_status' => 'publish',
    )
  );
  $the_query = new WP_Query( $args ); ?>
   <?php if ( have_posts() ) : ?>
      <section id="stickypost">
        <div class="innercontainer">
        <?php while ( have_posts() ) : the_post(); ?>
          <div id="stickypostcolumns">
            <div id="stickypostcolumn1" class="stickypostcloumn">
              <div id="stickypostcolumncontent">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, true);  ?>
                  <img src="<?php echo $image_url[0]; ?>" class="stickypostimage" />
                <?php endif; ?>
                <div style="clear:both;width: 100%;max-height: 1px;"></div>
              </div>
            </div>
            <div id="stickypostcolumn2" class="stickypostcloumn">
              <div id="stickypostcolumncontent">
                <header>
                  <h3><?php the_title(); ?></h3>
                </header>
                <?php the_excerpt(); ?>
                <p><a href="<?php echo get_permalink(); ?>">But wait, there's more!</a></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <div style="clear:both;height: 1px;max-height: 1px;"></div>
        </div>
      </section>
   <?php endif; ?>
<?php
  wp_reset_query();
} ?>