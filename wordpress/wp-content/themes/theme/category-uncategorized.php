<?php get_header(); ?>
  <div class="eyecatch">
    <h1>チョウムライ練習用-test分類ページ</h1>
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
          <a><?php the_author_link(); ?></a>
        </p>
        <p><?php the_excerpt(); ?></p>
      </div>
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go to the page</a>
    </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
</section>
  <p class="text-center">I am working on list of the test分類 page !!!</p>
<?php get_footer(); ?>