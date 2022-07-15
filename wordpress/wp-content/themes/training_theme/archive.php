<?php get_header(); ?>
<main role="main">
    <div id="mv">
        <div class="container">
            <div id="eyecatch">
                <img src="<?php echo get_template_directory_uri(); ?>/img/news/h1.png" alt="">
            </div>

            <h1><?php single_cat_title(); ?>の一覧</h1>
        </div>
    </div>
    <div class="container">
        <?php wp_dropdown_categories(''); ?>
        <!-- section -->
        <section>
            <?php get_template_part('loop'); ?>

            <?php get_template_part('pagination'); ?>
        </section>
        <!-- /section -->
    </div>
</main>
<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");

    function onCatChange() {
        if (dropdown.options[dropdown.selectedIndex].value > 0) {
            location.href = "<?php echo get_option('home');
                ?>/?cat=" + dropdown.options[dropdown.selectedIndex].value;
        }
    }

    dropdown.onchange = onCatChange;
    --></script>
<?php get_footer(); ?>
