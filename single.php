<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="innercontainer">
    <div id="mainbody" class="twocolcontent">
      <?php get_template_part( 'stickypost' ); ?>
      <main id="maincontent">
        <section>
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
             <div id="newscolumns">
              <div id="newscolumn1" class="newscolumn">
               <div class="newscolumncontent">
                <p class="postdate"><?php the_time('M') ?><br /><?php the_time('j') ?></p>
               </div>
              </div>
              <div id="newscolumn2" class="newscolumn">
               <div class="newsitem">
                 <?php if ( function_exists('yoast_breadcrumb') )
  {yoast_breadcrumb('<p id="breadcrumbs">', '</p>');} ?>
                <header>
                 <h4 class="posttitle print" style="display: none !important;"><?php the_title(); ?></h4>
                </header>
                <?php get_template_part( 'featuredimage' ); ?>
                <?php the_content(); ?>
                <footer>
                 <small>
                  <p>This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>.</p>
                 <?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?>
                </small>
                <?php trackback_rdf(); ?>
               </footer>
              </div>
              </div>
              <div style="clear:both;"></div>
             </div>
            </article>
          <?php endwhile; ?>
        </section>
        <?php get_template_part( 'comments' ); ?>
      </main>
      <?php get_sidebar(); ?>
      <div style="clear:both;"></div>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>