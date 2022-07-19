<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="rrrviewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no">
  <!-- <meta name="description" content="<?php if(wp_title('', false)): ?><?php bloginfo('name'); ?>の<?php echo trim(wp_title('', false)); ?>のページです。<?php endif; ?><?php bloginfo('description'); ?>"> -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon.png">
  <?php wp_head(); ?>
</head>

<body>
  <div class="wrap">
    <header class="header">
      <?php if(has_nav_menu('global-menu')) { //管理画面からメニュー登録する時用のコード?>
      <?php add_globalmenu(); ?>
      <?php } ?>
      <nav class="navbar navbar-expand-xl navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="brutton" data-bs-toggle="collapse" data-bs-target="#navbarLight"
            aria-controls="navbarLight" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse show" id="navbarLight">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/お問い合わせページ">固定ページ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/category/uncategorized" tabindex="-1" aria-disabled="true">test分類</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/apple" tabindex="-1" aria-disabled="true">アップル製品ページ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="mx-auto">
        <?php echo do_shortcode( '[searchandfilter fields="search,appleproduct" post_types="apple" order_dir=",asc,desc" order_by=",price"]' ); ?>
      </div>
    </header>
    