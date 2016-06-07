<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section class="container">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $images = get_post_meta($post->ID, '_igv_images');

?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <div class="row">

<?php 
    if (!empty(get_post_meta($post->ID, '_igv_images'))) {
      $images = get_post_meta($post->ID, '_igv_images');

      foreach ($images[0] as $image) {
?>
        <div class="text-align-center percent-col <?php if ($image['full']) { echo 's-into-1'; } else { echo 's-into-2 m-into-1'; } ?>">
          <img src="<?php echo $image['image']; ?>" class="img-padding">
        </div>
<?php        
      }
    }
?>
      </div>

      <div class="row u-cf">

        <div class="col col-3 percent-col m-into-0"></div>
        <div class="col col-6 percent-col m-into-1 padding-bottom-basic"><?php the_content(); ?></div>

      </div>


    </article>

<?php
  }
} else {
  // NO POSTS
} ?>

  <!-- end posts -->
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>