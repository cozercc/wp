<?php
/*
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here



/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 1140;//テーマ内任意のoEmbedsや画像の最大許容幅を設定
}

if (function_exists('add_theme_support'))
{
    // メニュー機能をON
    add_theme_support('menus');

    // アップロード画像のサムネイルサイズを設定
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    //RSSの出力をON
    add_theme_support('automatic-feed-links');

    add_theme_support( 'title-tag' );//タイトルタグ使用をサポート
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// ヘッダへのスクリプト読み込み（サイト共通）
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        //conditionizrとmodernizrはブラウザ・OS振り分け用
    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr');
        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr');

        //テーマ用のjsファイルを読み込み
        wp_register_script('themescripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
        wp_enqueue_script('themescripts');
    }
}

// ページ専用jsの読み込みはここに書く
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'));
        wp_enqueue_script('scriptname');
    }
}

//指定のjsにdefer（レンダリングブロック防止の記述）をつける。
function add_defer_to_script($tag, $handle, $url) {
    if ('themescripts' === $handle) {
        $tag = '<script src="' . esc_url($url) . '" defer></script>';
    }
    return $tag;
}
//指定のjsにasync（レンダリングブロック防止の記述）をつける。
//function add_async_to_script($tag, $handle, $url) {
//    if ('hoge' === $handle) {//hogeにasyncをつけてもいいjsのハンドル名。
//       $tag = '<script src="' . esc_url($url) . '" async></script>';
//    }
//    return $tag;
//}

// CSSファイルの読み込み
function html5blank_styles()
{
    //テーマ情報css
    wp_register_style('theme', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('theme');

    //カスタムcss
    wp_register_style('custom', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('custom');
}
// 登録したcssの出力時に 'text/css' は消す。
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}



// メニューの種類を登録
function register_html5_menu()
{
    register_nav_menus(array( //メニューを追加する場合は行を追加
        'global-menu' => "グローバルナビ",
        'header-menu' => "ヘッダーナビ",
        'footer-menu' => "フッターメニュー"
    ));
}

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'global-menu',//メニューの位置（どのメニューか）
            'menu'            => '',
            'menu_class'      => 'menu_class', // メニューを構成するul要素につけるCSSクラス名
            'menu_id'         => 'menu_id', // メニュを構成するul要素につけるCSSI ID名
            'container'       => 'div', // ulを囲う要素を指定。div or nav。なしの場合には false
            'container_class' => 'container_class', // コンテナに適用するCSSクラス名
            'container_id'    => 'container_id', // コンテナに適用するCSS ID名
            'fallback_cb'     => 'wp_page_menu', // メニューが存在しない場合にコールバック関数を呼び出す
            'before'          => '[before]', // メニューアイテムのリンクの前に挿入するテキスト
            'after'           => '[after]', // メニューアイテムのリンクの後に挿入するテキスト
            'link_before'     => '[link_before]', // リンク内の前に挿入するテキスト
            'link_after'      => '[link_after]', // リンク内の後に挿入するテキスト
            'echo'            => true, // メニューをHTML出力する（true）かPHPの値で返す（false）か
            'depth'           => 1, // 何階層まで表示するか。0は全階層、1は親メニューまで、2は子メニューまで…という感じ
            'walker'          => '', // カスタムウォーカーを使用する場合
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', // メニューアイテムのラップの仕方。%1$sには'menu_id'のパラメータ展開、%2$sには'menu_class'のパラメータ展開、%3$sはリストの項目が値として展開されます
        )
    );
}
// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}



// the_category() の出力のrel="category tag"はinvalidになるので、rel="tag"に変換
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// body_class()にページのslugが入るようになる。cssでbody.{slugname}とすればページ専用記述に
// Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // ウィジェットエリア1を定義
    register_sidebar(array(
        'name' => 'ウィジェット1',
        'description' => 'このウィジェットエリアの説明文',
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',//ウィジェットエリアの囲み
        'after_widget' => '</div>',//ウィジェットエリアの囲み終了
        'before_title' => '<h3>',//ウィジェットエリアのタイトル囲み
        'after_title' => '</h3>'//ウィジェットエリアのタイトル囲み終了
    ));

    // ウィジェットエリア2を定義
    register_sidebar(array(
        'name' => 'ウィジェット2',
        'description' => 'このウィジェットエリアの説明文',
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',//ウィジェットエリアの囲み
        'after_widget' => '</div>',//ウィジェットエリアの囲み終了
        'before_title' => '<h3>',//ウィジェットエリアのタイトル囲み
        'after_title' => '</h3>'//ウィジェットエリアのタイトル囲み終了
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'prev_text' => '<span>&lt;</span>',
        'next_text' => '<span>&gt;</span>',
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' .'続きを読む'. '</a>';
}

// Admin bar（ログイン中に出る黒いバー）を消すかどうか。
function remove_admin_bar()
{
    return false;
}


// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}




// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
    <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
        <?php printf('<cite class="fn">%s</cite> <span class="says">says:</span>', get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation">コメントは承認待ちです。</em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
            <?php
            printf( '%1$s at %2$s', get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link('編集','  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
// remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
// remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
// remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
// remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
// remove_action('wp_head', 'index_rel_link'); // Index link
// remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
// remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
// remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // 'text/css' を削除
add_filter('script_loader_tag', 'add_defer_to_script', 10, 3); // jsにdefer
//add_filter('script_loader_tag', 'add_async_to_script', 10, 3); // jsにasync
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

//ショートコードでphp呼出出来るようにします。
//[myphp file="module-***"]
function my_php_Include($params = array()) {
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "/$file.php");
    return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');



?>
