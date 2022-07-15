<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php echo trim(wp_title('', false)); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
        <meta name="theme-color" content="#0a568e">
        
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php if(wp_title('', false)):?><?php bloginfo('name'); ?>の<?php echo trim(wp_title('', false)); ?>のページです。<?php endif;?><?php bloginfo('description'); ?>">

        
        <meta property="og:title" content="<?php echo trim(wp_title('', false)); ?>:毎週2時間で人生が変わる！ アルタスクール" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://alta-school.net/" />
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/ogp.png" />
        <meta property="og:site_name"  content="アルタスクール - 名古屋の若者向け「無料」スクール" />
        <meta property="og:description" content="名古屋の若者向け無料スクール「アルタスクール」では、第一線の経営者たちが本来学生には教えない経営学を カリキュラム化! これを学べば社会や企業がわかり、 企業選びも悩まない！" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@alta_school" />

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-2856510-31', 'auto');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
            setTimeout("ga('send','event','stay', 'read');", 60000);
        </script>
	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div id="wrap">
			<!-- header -->
                <header>
                    <div class="container">
                        <div class="headerlogo">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/common/header_logo.png" alt="アルタスクール">
                            </a>
                        </div>
                        <a id="header_apply" href="<?php echo home_url(); ?>/reserve/"><img src="<?php echo get_template_directory_uri(); ?>/img/common/header_btn_apply.png" alt="申し込む"></a>
                        <button id="btn_nav"><img src="<?php echo get_template_directory_uri(); ?>/img/common/btn_nav.png" alt="メニュー"></button>
                        <nav id="gnav">
                            <ul id="mainnav">
                                <li><a href="<?php echo home_url(); ?>/about/">アルタスクールとは</a></li>
                                <li><a href="<?php echo home_url(); ?>/wp-content/uploads/2018/08/schedule.pdf" target="_blank">スケジュール一覧</a></li>
                                <li><a href="<?php echo home_url(); ?>/about/#top_voice">受講者の声</a></li>
                                <li><a href="<?php echo home_url(); ?>/info/">私たちについて</a></li>
                                <li><a href="<?php echo home_url(); ?>/reserve/">申し込み方法</a></li>
                                <li><a href="<?php echo home_url(); ?>/news/">お知らせ</a></li>
                            </ul>
                            <div id="snsnav_wrap">
                            <p>- 公式SNS -</p>
                            <ul id="snsnav">
                                <li><a href="http://line.naver.jp/ti/p/kRH3xi-icv" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/nav_line.png" alt="Line@"></a></li>
                                <li><a href="https://www.facebook.com/altaschool/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/nav_fb.png" alt="Facebook"></a></li>
                                <li><a href="https://twitter.com/alta_school" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/nav_tw.png" alt="Twitter"></a></li>
                            </ul>
                            </div>
                        </nav>
                    </div>
                </header>
			<!-- /header -->
