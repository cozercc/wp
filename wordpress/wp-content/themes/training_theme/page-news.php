<?php get_header(); ?>

<?php $slug_name = $post->post_name; ?>
<main role="main" id="news_page">
    <div id="mv">
        <div class="container">
            <div id="eyecatch">
                <img src="<?php echo get_template_directory_uri(); ?>/img/news/h1.png" alt="">
            </div>
            <h1>お知らせ</h1>
        </div>
    </div>

    <section>
        <div class="container">
            <?php wp_dropdown_categories('&show_option_none=カテゴリを選ぶ'); ?>

            <div class="info_list">

                <?php query_posts('post_type=post&paged=' . $paged); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink() ?>">
                            <div class="post">
                                <div class="txt">
                                    <span class="category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
                                    <span class="date"><?php the_time('Y.m.d'); ?></span>
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
                <?php else : ?>
                    <div class="post">
                        <h2>記事が見つかりません</h2>
                        <p>記事が存在しないときのテキスト</p>
                    </div>
                <?php endif; ?>
                <div class="pagination"><?php html5wp_pagination(); ?></div>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>
</main>
    <script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
    ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>
<?php get_footer(); ?>
