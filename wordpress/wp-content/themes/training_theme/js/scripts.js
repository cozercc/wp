(function ($, root, undefined) {
    $(function () {

        //グローバルナビゲーション（SP用）
        $("#btn_nav").click(function () {
            $('#gnav').fadeToggle().toggleClass('open');
        });

        $(document).on('click', function (e) {
            if ($('#gnav').hasClass('open')) {
                if (!$(e.target).closest('header').length) {
                    $('#gnav').removeClass('open').fadeOut();
                }
            }
        });

        //ページトップへ移動するボタン
        $(window).scroll(function () {
            var now = $(window).scrollTop();
            var under = $('body').height() - (now + $(window).height());
            if (now > 50 && under > 0) {
                $('#totop').fadeIn('fast');
            } else {
                $('#totop').fadeOut('fast');
            }
        });
        $('#totop').click(function () {
            $('html,body').animate({scrollTop: 0}, 'slow');
        });




        //fixedタイプのヘッダーがあるとき、ヘッダの高さをheaderHeightに入れるとアンカーリンクの位置をヘッダ高さ分ずらせる
        $(window).on('load', function () {
            var headerHeight = 50;
            var url = $(location).attr('href');
            if (url.indexOf("#") != -1) {
                var id = url.split("#");
                var $target = $('#' + id[id.length - 1]);
                if ($target.length) {
                    var pos = $target.offset().top - headerHeight;
                    $("html, body").animate({scrollTop: pos}, 10);
                }
            }
        });
        $(function () {
            if ($('a[href*=#]:not(.noscroll)').length) {
                $('a[href*=#]:not(.noscroll)').click(function () { // from http://memo.ravenalala.org/scroll-to-anchor/
                    var headerHeight = 50;
                    var target = $(this.hash);
                    if (target) {
                        var targetOffset = target.offset().top - headerHeight;
                        $('html,body').animate({scrollTop: targetOffset}, 200, function () {
                            if (target) {
                                var targetOffset = target.offset().top - headerHeight;
                                $('html,body').animate({scrollTop: targetOffset}, 100)
                            }
                            ;
                        });
                        return false;
                    }
                });
            }
        });




        //レスポンシブ時に表示画像を取り換え（data-sp-src属性があるときだけ発火。data-sp-srcにSP画像のパスをセットして使う）
        $(window).on('load resize', function () {
            sp_process();
        });
        $('img[data-sp-src]').each(function () {
            $(this).attr('data-pc-src', $(this).attr('src'));
        });
        function sp_process() {
            var win_w = $(window).innerWidth();
            if (win_w < 768) {
                $('img[data-sp-src]').each(function () {
                    $(this).attr('src', $(this).attr('data-sp-src'));
                });
            } else {
                $('img[data-sp-src]').each(function () {
                    $(this).attr('src', $(this).attr('data-pc-src'));
                });
            }
        }



        //アコーディオン
        $(".answer").hide();
        $('.question_wrap').each(function (i,el) {
            $(el).find(".question").click(function () {
                $(el).find(".answer").slideToggle(200);
                $(this).toggleClass("open");
            });
        });
    });

})(jQuery, this);
