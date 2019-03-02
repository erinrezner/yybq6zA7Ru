<?php if ( post_password_required() )
{
  return;
}
?>
<section class="postcomments">
  <hr />
  <?php
comment_form();
?>
</section>