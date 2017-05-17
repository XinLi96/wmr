
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理员登录</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/admin/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/admin/css/app.css">
    <script src="assets/admin/js/jquery.min.js"></script>

</head>

<body data-type="login">
<script src="assets/admin/js/theme.js"></script>
<div class="am-g tpl-g">
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
    <div class="tpl-login">
        <div class="tpl-login-content">

            <form class="am-form tpl-form-line-form" action="user/admin_do_log" method="post">
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="num" id="user-name" placeholder="请输入账号">

                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="pass" id="user-name" placeholder="请输入密码">

                </div>

                <div class="am-form-group">

                    <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/admin/js/amazeui.min.js"></script>
<script src="assets/admin/js/app.js"></script>

</body>

</html>