<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>历史记录</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/css/amazeui.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body id="blog-article-sidebar">

<?php include('header.php');?>
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-sm-12">
        <div class="timeline-year">
            <ul>
                <h3>历史记录</h3>
                <hr>
                <?php foreach($result as $row){?>
                <li>
                    <span class="am-u-sm-4 am-u-md-2 timeline-span"><?php echo $row->postdate;?></span>
                    <span class="am-u-sm-8 am-u-md-6"><a href=""><?php echo $row->blog_title;?></a></span>
                    <span class="am-u-sm-4 am-u-md-2 am-hide-sm-only"><?php echo $row->cate_name;?></span>
                    <span class="am-u-sm-4 am-u-md-2 am-hide-sm-only"><?php echo $row->user_name;?></span>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>


</div>
<!-- content end -->

<?php include('footer.php');?>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>