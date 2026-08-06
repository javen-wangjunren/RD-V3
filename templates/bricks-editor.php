<?php
/**
 * Template Name: Bricks Editor
 * Template Post Type: page
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>中台编辑器</title>
    <link rel="stylesheet" href="/wp-content/themes/mml-theme/dist/css/bricks.core.css">

    <!-- 项目资源列表 -->
    <link rel="stylesheet" href="/wp-content/themes/mml-theme/dist/css/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/wp-content/themes/mml-theme/dist/css/main.css">
    <link rel="stylesheet" href="/wp-content/themes/mml-theme/dist/js/libs/slick-1.8.1/slick.css">
    <style id="abc">.daf{}</style>

</head>
<body class="mml-bricks">

<div id="section-styles"></div>

<div class="brk-container brk-off-sidebar">

    <!-- 侧边栏 -->
    <div class="brk-sidebar">
        <header>
            <a class="brk-save">保存</a>
            <div class="brk-pages">
                <input type="text" name="template" placeholder="Home" value="Home">
                <div class="brk-dropdown">
                    <a class="brk-li" data-name="Products"></a>
                    <a class="brk-li" data-name="About"></a>
                    <a href="/bricks-editor?page=contact" class="brk-li" data-name="Contact"></a>
                </div>
                <a class="brk-caret"></a>
            </div>
        </header>
        <div class="brk-toolkits">
            <h3>搜索组件</h3>
            <div class="brk-search">
                <input type="text" name="widgets" placeholder="Feature_001">
                <a>搜索</a>
            </div>
            <ul class="brk-list">
                <li class="brk-li" data-name="Nav_001"></li>
                <li class="brk-li" data-name="Banner_004"></li>
                <li class="brk-li" data-name="Feature_024"></li>
                <li class="brk-li" data-name="Cta_002"></li>
                <li class="brk-li" data-name="Footer_001"></li>
            </ul>
        </div>
        
        <footer>
            <div class="brk-history">
                <!-- <a>历史</a> -->
            </div>
        </footer>
    </div>

    <a class="brk-tgl-sidebar">≡</a>

    <!-- 页面编辑框 -->
    <div class="brk-sketch mml-body brk-loading" oncontextmenu="return false;"></div>

    <!-- 右键菜单 -->
    <ul class="brk-contextmenu" oncontextmenu="return false;">
        <li data-act="edit">编辑</li>
        <li data-act="copy">复制</li>
        <li data-act="paste">粘贴</li>
        <li data-act="remove">删除</li>
    </ul>


    <!-- 属性编辑框 -->
    <div class="brk-editor">
        <header></header>
        <form class="brk-editor-form" name="brk-editor"></form>
    </div>


    <!-- 消息提醒 -->
    <div class="brk-message"></div>

</div>

<!-- 项目资源列表 -->
<!-- mml-menu、jquery、slick -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="/wp-content/themes/mml-theme/dist/js/mml-menu.js"></script>
<script src="/wp-content/themes/mml-theme/dist/js/mml-faq.js"></script>
<script src="/wp-content/themes/mml-theme/dist/js/libs/slick-1.8.1/slick.min.js"></script>
<script src="/wp-content/themes/mml-theme/dist/js/libs/lazysizes.min.js"></script>
<script src="/wp-content/themes/mml-theme/dist/js/mml-page.js"></script>

<div id="section-scripts"></div>
<script src="/wp-content/themes/mml-theme/dist/js/bricks.core.js"></script>
</body>
</html>


