<?php get_header(); ?>

<div class="container">

  <!-- Announcement -->
  <div class="announcement">
    <?php the_field('announcement_text'); ?>
  </div>

  <!-- Hero -->
  <div class="hero">
    <?php 
    $hero_img = get_field('hero_image'); 
    if (is_array($hero_img)) {
      $hero_img = $hero_img['url'];
    }
    ?>
    <?php if($hero_img): ?>
      <img src="<?php echo $hero_img; ?>" alt="">
    <?php endif; ?>

    <h1><?php the_field('hero_heading'); ?></h1>
    <p><?php the_field('hero_subheading'); ?></p>

    <a class="hero-btn" href="<?php the_field('hero_button_link'); ?>">
      <?php the_field('hero_button_text'); ?>
    </a>
  </div>

  <!-- Brands -->
  <div class="brands">
    <?php 
    for ($i = 1; $i <= 4; $i++) {
      $logo = get_field('brand_logo_' . $i);

      if (is_array($logo)) {
        $logo = $logo['url'];
      }

      if ($logo) {
        echo '<img src="'.$logo.'" alt="brand">';
      }
    }
    ?>
  </div>

  <!-- New Arrivals -->
  <h2 class="section-title">New Arrivals</h2>

  <div class="products">

  <?php
  $args = array(
    'post_type' => 'product',
    'posts_per_page' => 2,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => 'new-arrivals',
      ),
    ),
  );

  $query = new WP_Query($args);
  ?>

  <?php if($query->have_posts()): ?>
    <?php while($query->have_posts()) : $query->the_post(); global $product; ?>

    <div class="card">
      <?php if(get_the_post_thumbnail_url()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
      <?php endif; ?>

      <h3><?php the_title(); ?></h3>

      <?php if($product): ?>
        <p><?php echo $product->get_price_html(); ?></p>
      <?php endif; ?>
    </div>

    <?php endwhile; ?>
  <?php else: ?>
    <p>No products found</p>
  <?php endif; wp_reset_postdata(); ?>

  </div>

</div>

<?php get_footer(); ?>