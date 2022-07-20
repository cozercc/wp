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
  <ul>
    <li>
      <?php the_field('category'); ?>
    </li>
    <li>
      <?php echo get_field('price').'$'; ?>
    </li>
    <li>
      <?php the_field('color'); ?>
    </li>
    <li>
      <?php the_field('storage'); ?>
    </li>
  </ul>
    </div>
  <div>
  <p class="text-center">I am working on single page of apple</p>
  </div>
<?php get_footer(); ?>