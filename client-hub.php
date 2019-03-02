<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="innercontainer">
    <div id="mainbody" class="twocolcontent">
      <main id="maincontent">
        <section>
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
              <h3 class="print"><?php the_title(); ?></h3>
              <?php //get_template_part( 'featuredimage' ); //will this only not work in preview?  Won't work for (self created) SPD Hub.  Is it because it is a hub?  Won't insert in hub template. -- Added to client specific hub page in content ?>
              <?php the_content(); ?>
            </article>
          <?php endwhile; ?>
        </section>
      </main>
    </div>
    <?php get_sidebar(); ?>
    <div style="clear:both;"></div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>