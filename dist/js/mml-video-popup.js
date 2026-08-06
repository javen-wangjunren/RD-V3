"use strict";

/**
 * 自定义视频弹窗播放
 *
 * 目前支持 youku
 *
 * 使用方法:
 *   引用 <script src="<?php echo get_template_directory_uri(); ?>/dist/js/mml-video-popup.js"></script>
 *   后端套数据 - 输出视频 a 标签时，使用 mtf_video_start_tag($video_url, 'video1', [ 'title' => '' ]);
 *     第一个参数，视频 URL ，由客户在后台填入。若后台没有填入 URL ，则不输出这个 a 标签。
 *     第二个参数，css class ，字符串，非必填。
 *     第三个参数，数组，用在 a 标签身上的 HTML 属性，非必填。
 *   后端套数据 - 输出视频 a 标签结束标签时，使用 mtf_video_end_tag($video_url);
 *     参数: 视频 URL ，后台填入的。
 *   安装插件 "ARVE Advanced Responsive Video Embedder" ( https://en-gb.wordpress.org/plugins/advanced-responsive-video-embedder/ )
 *
 * 开发说明:
 *   在 src 文件夹开发，引用 dist 文件夹的文件
 *     npm run gulp-video-popup
 *   弹出框样式写在 src/sass/layout/common.sass
 *   弹出框的 HTML 代码请查看下面的代码。
 *   mml-video-popup 主要以这个类来写样式
 */
(function ($) {
  $(document).ready(function () {
    $('body').on('click', '.mml-vp-youku-iframe, .mml-vp-youku-link', function (e) {
      var $this = $(this);
      var $popup = getPopup();
      var $template = $('script[name=mml-video-popup-template]', $this);
      $('.bd', $popup).html($template.html());
      $popup.addClass('show');
      e.preventDefault();
    });
    $('body').on('click', '.mml-vp .J_mml_vp_close', function () {
      $('.mml-vp .bd').html('');
      $('.mml-vp').removeClass('show');
    });
  });

  function getPopup() {
    var $vp = $('.mml-vp');

    if ($vp.length < 1) {
      var html = "<div class=\"mml-vp\">\n\t\t\t\t<div class=\"mask\"></div>\n\t\t\t\t<div class=\"wrap\">\n\t\t\t\t\t<div class=\"cont\">\n\t\t\t\t\t\t<div class=\"hd\">\n\t\t\t\t\t\t\t<i class=\"dashicons dashicons-no J_mml_vp_close\"></i>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"bd\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>";
      $(html).appendTo('body');
      $vp = $('.mml-vp');
    }

    return $vp;
  }
})(jQuery);