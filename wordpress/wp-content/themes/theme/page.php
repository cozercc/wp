<?php get_header(); ?>
<ul>
  <?php wp_list_pages(); ?>
</ul>
<div class="eyecatch">
  <?php if(has_post_thumbnail()): // サムネイルを持っているとき ?><?php the_post_thumbnail(); ?><?php else: // サムネイルを持っていない ?><?php endif; ?>
  <h1><?php the_title(); ?></h1>
</div>

<?php $slug_name=$post->post_name; ?>
<main class="<?php echo $slug_name; ?>_page">
  <?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?><?php endif; ?>
</main>
<div>
  <p class="text-center">I am working on static page!!!</p>
</div>
<?php get_footer(); ?>




