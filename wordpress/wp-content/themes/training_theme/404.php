<?php get_header(); ?>
<main>
    <div id="mv">
        <div class="container">
            <div id="eyecatch">
            <img src="<?php echo get_template_directory_uri(); ?>/img/common/ttl_404.png" alt="404 NOT FOUND">
            </div>
            <h1>ページが見つかりません</h1>
        </div>
    </div>
    <section>
        <div class="container">
            <p class="mt30">
                お探しのページは、削除されたか、名前が変更されたか、一時的に使用できなくなっている可能性があります。 
                <br>
                <a href="<?php echo home_url(); ?>">←トップページへ</a>
            </p>
        </div>
    </section>
</main>
<?php get_footer(); ?>
