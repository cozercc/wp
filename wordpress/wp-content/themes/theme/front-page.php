<?php get_header(); ?>
<main>
  <section class="text-center">
    <h2>チョウムライ練習用</h2>
    <p>株式会社アルタ　プログラマー課　チョウムライWordPress研修練習用</p>
  </section>

  <div class="card w-50 mx-auto">
    <div class="card-header">
    <h2 class="top_info--ttl ">お知らせ</h2>
    </div>
    <div class="card-body">
    <?php
      $args=array('posts_per_page'=>3, 'post_type'=>'post', //postは通常の投稿機能
          'post_status'=>'publish');
      $my_posts=get_posts($args);
      ?>
    <dl class="top_info--list">
      <?php foreach($my_posts as $post): setup_postdata($post); ?>
      <dt class="top_info--term">
        <span class="top_info--time"><?php the_time('Y.m.j'); ?></span>
      </dt>
      <dd class="top_info--detail">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </dd>
      <?php endforeach; ?>
    </dl>
    </div>
  </div>
  <div class="metaslider">
    <?php echo do_shortcode('[metaslider id="21"]'); ?>
    </div>

<!-- posts by cards -->
<section>
  <div class="row row-cols-1 row-cols-md-2 g-4">
  <?php if (have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="col">
    <div class="card h-100 w-50 mx-auto">
        <img src="<?php echo catch_that_image(); ?>" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p class="card-text">
          <?php the_date(); ?> by
          <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
        </p>
        <p><?php the_excerpt(); ?></p>
      </div>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
</section>
</main>
<?php get_footer(); ?>