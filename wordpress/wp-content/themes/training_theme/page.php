<?php get_header(); ?>
<main>
    <div id="mv">
        <div class="container">
            <div id="eyecatch">
                <!-- post thumbnail -->
                <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                    <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                <?php endif; ?>
                <!-- /post thumbnail -->
            </div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
        <!-- /article -->
    <?php endwhile; ?>

    <?php else: ?>
    <?php endif; ?>
        <?php if (!is_page('reserve')): ?>
    <?php get_template_part("module-apply"); //参加方法はこちら！のモジュール呼出 ?>
<?php endif; ?>
        
</main>

<?php get_footer(); ?>




