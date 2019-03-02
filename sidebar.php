<aside id="sidebar">
  <?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
   <div class="widget">
    <div class="widgetcontent">
     <?php get_search_form(); ?>
    </div>
   </div>
  <?php endif; // end sidebar widget area ?>
</aside>