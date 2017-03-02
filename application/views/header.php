<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title></title>
    <base href="<?php echo site_url();?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="assets/css/amazeui.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body id="blog">
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <h2 class="am-hide-sm-only"><a href="Welcome/login">登录/  注册</a></h2>
    </div>
</header>
<hr>
<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a href="">首页</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="">
                    发布文章<span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="lw-index.html">1.我的文章</a></li>
                    <li><a href="lw-index-nosidebar.html">2.我的评论</a></li>
                </ul>
            </li>
            <li><a href="">留言板</a></li>
            <li><a href="Welcome/time">时间线</a></li>
            <li><a href="">联系我们</a></li>
            <li><a href="">个人中心</a></li>
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
            </div>
        </form>
    </div>
</nav>
<hr>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
</body>
</html>