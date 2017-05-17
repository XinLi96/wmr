<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>社团管理</title>
    <link rel="stylesheet" href="assets/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/admin/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/admin/css/app.css">
    <link rel="stylesheet" href="assets/admin/css/index.css">
    <script src="assets/admin/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="assets/admin/js/theme.js"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;">个人博客后台管理系统</a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">

            <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="blog/get_all">欢迎你, 管理员<span> 退出</span> </a
                    </li>


                    <!-- 退出 -->
                    <li class="am-text-sm">

                    </li>
                </ul>
            </div>
        </div>

    </header>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img src="assets/admin/img/user04.png" alt="">
                </div>
                <span class="user-panel-logged-in-text">

          </span>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-link">
                <a href="blog/get_all" class="active">
                    <i class="am-icon-home sidebar-nav-link-logo"></i>博客首页
                </a>
            </li>



            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i>
                        管理模块
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="blog/admin_get_all">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 文章管理
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="Cate/admin_get_all">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 分类管理
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="comment/admin_get_all">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 评论管理
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="message/admin_get_all">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 留言管理
                        </a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-nav-link">
                <a href="user/login">
                    <i class="am-icon-key sidebar-nav-link-logo"></i> 用户登录
                </a>
            </li>


        </ul>
    </div>
</div>
</div>
</div>

<script src="assets/admin/js/amazeui.min.js"></script>
<script src="assets/admin/js/amazeui.datatables.min.js"></script>
<script src="assets/admin/js/dataTables.responsive.min.js"></script>
<script src="assets/admin/js/app.js"></script>
</body>

</html>