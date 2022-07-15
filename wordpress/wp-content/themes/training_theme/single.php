<?php get_header(); ?><?php $slug_name = $post->post_name; ?>
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
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <div class="post_header">
                            <h2><?php the_title(); ?></h2>
                            <p><span class="category"><?php the_category(' '); ?></span><span class="date"><?php the_time("Y.m.d") ?></span></p>
                        </div>
                        <!-- post thumbnail -->
                        <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                            <div class="post_thumb">
                                <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                            </div>
                        <?php endif; ?>
                        <!-- /post thumbnail -->

                        <?php the_content(); ?>

                        <div class="post_bnr">
                            <ul>
                                <li>
                                    <a href="http://line.naver.jp/ti/p/kRH3xi-icv" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/bnr_line.png" alt="LINE@で簡単申し込み！"></a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url(); ?>/reserve/"><img src="<?php echo get_template_directory_uri(); ?>/img/common/bnr_reserve.png" alt="初めての方へ　詳しい参加方法"></a>
                                </li>
                            </ul>
                        </div>


                        <div class="post_sns">
                            <h3>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/common/ttl_share.png" alt="シェア">
                            </h3>

                            <ul>
                                <li>
                                    <a class="btn--twitter" href="http://twitter.com/share?url=<?php echo wp_get_shortlink($post_id); ?>&text=<?php echo get_the_title(); ?>&via=alta_school&tw_p=tweetbutton&related=alta_school" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/icon_twitter.png" alt="twitter"></a>
                                </li>
                                <li>
                                    <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/icon_fb.png" alt="facebook"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="post_pager">
                            <ul>
                                <li>
                                    <?php previous_post_link('%link', '<', TRUE); ?>
                                </li>
                                <li class="list">
                                    <a href="/news/">一覧に戻る</a>
                                </li>
                                <li>
                                    <?php next_post_link('%link', '>', TRUE); ?>
                                </li>

                            </ul>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>

        </div>
    </section>
</main>
<?php get_footer(); ?>
