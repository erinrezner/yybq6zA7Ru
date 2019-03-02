<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="innercontainer">
    <main id="mainbody" class="fullpagecontent">
      <div id="maincontent">
        <section>
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
             <?php if ( function_exists('yoast_breadcrumb') )
  {yoast_breadcrumb('<p id="breadcrumbs">', '</p>');} ?>
             <?php get_template_part( 'featuredimage' ); ?>
             <header>
              <h4 class="posttitle print" style="display: none !important;"><?php the_title(); ?></h4>
             </header>
             <?php the_content(); ?>
             <footer>
              <?php trackback_rdf(); ?>
             </footer>
            </article>
          <?php endwhile; ?>
        </section>
      </div>
      <div style="clear:both;"></div>
    </main>
  </div>
<?php endif; ?>
<?php get_footer(); ?>