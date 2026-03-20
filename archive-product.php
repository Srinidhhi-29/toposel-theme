<?php get_header(); ?>

<div class="container">
  <h2>Shop</h2>

  <?php if (have_posts()) : ?>
    <div class="products">

      <?php while (have_posts()) : the_post(); global $product; ?>

        <div class="card">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
          <?php endif; ?>

          <h3><?php the_title(); ?></h3>

          <?php if ($product): ?>
            <p><?php echo $product->get_price_html(); ?></p>
          <?php endif; ?>
        </div>

      <?php endwhile; ?>

    </div>

  <?php else : ?>
    <p>No products found</p>
  <?php endif; ?>

</div>

<?php get_footer(); ?>