<?php get_header(); ?>
  <div class="eyecatch">
    <h1><a><?php the_title(); ?></a></h1>
  </div>
<?php the_field('test_cho'); ?>
    </main>
    <div class="mx-auto w-50">
    <?php ; 
    the_content();
    ?>
    </div>
  <div>
  <p class="text-center">I am working on single page of post</p>
  </div>
<?php get_footer(); ?>