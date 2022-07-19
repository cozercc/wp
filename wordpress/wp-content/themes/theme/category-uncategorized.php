<?php get_header(); ?>
  <div class="eyecatch">
    <h1>お知らせ</h1>
  </div>

  <?php get_template_part('include/common', 'breadcrumb'); ?> 

  <div class="has_sidebar news_page">
    <main>
      <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <section class="card">
          <div class="card-body">
          <h2><a class="card-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="post_excerpt--img">
            <?php if(has_post_thumbnail()): // サムネイルを持っているとき ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
              <?php elseif(catch_that_image() == './wp-content/themes/theme/img/top/default.jpg') : ?>
            <?php else: // サムネイルを持っていない ?>
              <img src=<?php echo catch_that_image(); ?> class="card-img-bottom">
              <?php endif; ?>
          </div>
          <div class="post_excerpt--txt">
            <div class="post_meta">
              <p class="post_meta--date"><?php the_time('Y.m.d'); ?></p>
              <ul class="post_meta--cat_list">
                <?php categories_label() ?>
              </ul>
              <p class="post_meta--tag">
                <?php echo get_the_tag_list('#', ' #', ''); ?>
              </p>
            </div>
            <p class="card-text"> <?php the_excerpt(); ?> </p>
          </div>
          </div>
        </section>
      <?php endwhile; ?><?php endif; ?>
      <div class="pagination"><?php wp_pagination();//ページネーション ?></div>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <div>
  <p>I am working on uncategorized page!!!</p>
</div>
<?php get_footer(); ?>