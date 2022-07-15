<section id="course_info">
    <div class="container">
        <h2 class="ttl ttl_inverse">
            <img src="<?php echo get_template_directory_uri(); ?>/img/common/h2_courseinfo.png" alt="INFORMATION">
            <span>講座情報</span>
        </h2>
        <p class="txtC mb30">
            <a href="<?php echo home_url(); ?>/wp-content/uploads/2018/08/schedule.pdf" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/about/btn_schedule.png" alt="全体スケジュールはこちら"></a>
        </p>
        <div class="info_list">
            <?php query_posts('post_type=post&posts_per_page=3&cat=2&paged=' . $paged); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink() ?>">
                        <div class="post">
                            <div class="txt">
                                <span class="date"><?php the_time('Y.n.j'); ?></span>
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                                <div class="img"><?php the_post_thumbnail(); ?></div>
                            <?php else: ?>
                                <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/news/noimage.png" alt=""></div>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <p>記事が見つかりません</p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>

        <p class="btn_list">
            <a href="<?php echo home_url(); ?>/category/course/"><img src="<?php echo get_template_directory_uri(); ?>/img/common/btn_list_inverse.png" alt="一覧を見る"></a>
        </p>
    </div>
</section>