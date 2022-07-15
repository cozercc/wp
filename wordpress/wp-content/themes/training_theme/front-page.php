<?php get_header(); ?>
	<main id="top_page">
        <section class="cover_white" id="top_mv">
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/top/title.png" alt="毎週2時間で人生が変わる　アルタスクール"></h1>
        </section>
        <section id="top_lead">
            <div class="container">
                <div class="lead_thinking">
                    <p>「　　　社会に出るって不安じゃない？　　　」</p>
                    <p>「　　就職先って面接だけで決めていいの？　」</p>
                    <p>「&ensp;大学で学んだことって社会で役に立つの？&ensp;」</p>
                </div>
                <div class="lead_appeal">
                    <p>そんな思いを抱えているのに、アルタスクールを<br class="hidden-pc">知らないなんてもったいない！</p>
                </div>
            </div>
        </section>
        <section class="bg_blue" id="top_about">
            <div class="container">
                <h2 class="ttl"><img src="<?php echo get_template_directory_uri(); ?>/img/top/about_h2.png" alt="What’s ALTA SCHOOL?"><span>アルタスクールとは</span></h2>
                <figure><img src="<?php echo get_template_directory_uri(); ?>/img/top/about_img.jpg" alt=""></figure>
                <p>
                    第一線の経営者たちが本来学生には教えない経営学を
                    カリキュラム化!これを学べば社会や企業がわかり、
                    企業選びも悩まない！
                </p>
                <div class="btn_detail">
                    <a href="<?php echo home_url(); ?>/about/">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/btn_detail.png" alt="詳しく見る">
                    </a>
                </div>
            </div>
        </section>
        <?php get_template_part("module-voice"); //受講者の声のモジュール呼出 ?>
        <?php get_template_part("module-apply"); //参加方法はこちら！のモジュール呼出 ?>
        <section class="bg_blue" id="top_info">
            <div class="container">
                <h2 class="ttl"><img src="<?php echo get_template_directory_uri(); ?>/img/top/info_h2.png" alt="INFORMATION"><span>新着情報</span></h2>
<div class="info_list">
    <?php
    $args = array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post_status' => 'publish',
    );
    $my_posts = get_posts($args);
    ?>
    <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
        <a href="<?php the_permalink();?>">
            <div class="post">
                <div class="txt">
                    <span class="category"><?php $cat = get_the_category(); $cat=$cat[0]; {echo $cat->cat_name;} ?></span>
                    <span class="date"><?php the_time('Y.m.d'); ?></span>
                    <h3><?php the_title(); ?></h3>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php else: ?>
                <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/news/noimage.png" alt=""></div>
            <?php endif; ?>
            </div>
        </a>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    <p class="btn_list">
        <a href="<?php echo home_url(); ?>/news/"><img src="<?php echo get_template_directory_uri(); ?>/img/common/btn_list.png" alt="一覧を見る"></a>
    </p>
</div>
            </div>
        </section>
        <section class="bg_blue" id="top_nav">
            <div class="container">
                <ul>
                    <li><a href="<?php echo home_url(); ?>/info/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/nav_01.png" alt="私たちについて"></a></li>
                    <li><a href="<?php echo home_url(); ?>/contact/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/nav_02.png" alt="お問い合わせ"></a></li>
                    <li><a href="<?php echo home_url(); ?>/sitemap/"><img src="<?php echo get_template_directory_uri(); ?>/img/top/nav_03.png" alt="サイトマップ"></a></li>
                    <li><a href="http://www.alta.co.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/top/nav_04.png" alt="株式会社アルタ"></a></li>
                </ul>
            </div>
        </section>
	</main>
<?php get_footer(); ?>
