<?php if ( has_post_thumbnail() ) : ?>
<section id="featuredimage">
  <div class="innercontainer">
    <?php $image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, true);  ?>
    <img src="<?php echo $image_url[0]; ?>" class="aligncenter" />
  </div>
</section>
<?php endif; ?>