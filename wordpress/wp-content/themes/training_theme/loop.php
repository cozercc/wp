<div class="info_list">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink() ?>">
        <div class="post">
            <div class="txt">
                <span class="category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
                <span class="date"><?php the_time('Y.n.j'); ?></span>
                <h3><?php the_title(); ?></h3>
            </div>
            <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                <div class="img"><?php the_post_thumbnail(); ?></div>
                                    <?php else:?>
                                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/news/noimage.png" alt=""></div>
            <?php endif; ?>
        </div>
    </a>
    <?php endwhile; ?>

<?php else: ?>

<?php endif; ?>
</div>
