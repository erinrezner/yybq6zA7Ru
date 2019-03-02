<div class="innercontainer">
  <main id="mainbody" class="fullpagecontent">
    <section>
      <article>
        <header >
          <h4 class="posttitle">Nothing Found</h4>
        </header>
        <?php if ( is_search() ) : ?>
          <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
          <?php get_search_form(); ?>
        <?php else : ?>
          <p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
          <?php get_search_form(); ?>
        <?php endif; ?>
      </article>
    </section>
  </main>
  <div style="clear:both;"></div>
</div>