<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>article </title>
    <base href="<?php echo site_url();?>" target=""/>
    <link rel="stylesheet" href="assets/css/amazeui.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/article.css">

</head>

<body id="blog-article-sidebar">


<?php include 'header.php'?>
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-md-8 am-u-sm-12">






        <div class="am-form am-g">
            <h3 class="blog-add">发表文章</h3>
            <form action="blog/do_add_article" method="post">
                <input type="hidden" class="hideUserId"  name="hideUserId" value="<?php if(isset($rs_user)){echo $rs_user->user_id;}?>" >
                <hr>
                <fieldset>
                    <div class="am-form-group am-u-sm-4 blog-clear-left">
                        <input type="text" class="addBlog-name"  name="addBlog-name" value="" placeholder="标题">
                    </div>
                    <div class="am-form-group am-u-sm-4">
                        <select name="select">
                            <?php foreach ($rs_cate as $v){?>
                                <option value="<?php if(isset($v)){echo $v->cate_id;}?>"><?php if(isset($v)){echo $v->cate_name;}?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="am-form-group">
                        <textarea class="addBlog-intro"  name="addBlog-intro" rows="5" placeholder="简介"></textarea>
                    </div>
                    <div class="am-form-group">
                        <textarea class="addBlog-content"  name="addBlog-content" rows="20" placeholder="一字千金"></textarea>
                    </div>


                </fieldset>
                <hr>

                <p><button  class="am-btn am-btn-default pub-srticle-btn">发表文章</button></p>
            </form>

        </div>


    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="<?php if(isset($rs_user)){echo $rs_user->user_img;}?>" alt="about me" class="blog-entry-img" >
            <p><?php if(isset($rs_user)){echo $rs_user->sex;}?></p>
            <p>
                <?php if(isset($rs_user)){echo $rs_user->user_introduction;}?>
            </p>
        </div>


        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>我的文章</span></h2>
            <ul class="am-list">
                <?php foreach ($rs_authorBlog as $v){?>
                    <li><a href="blog/get_blog?blogId=<?php if(isset($v)){echo $v->blog_id;}?>"><?php if(isset($v)){echo $v->introduce;}?></a></li>
                <?php }?>

            </ul>
        </div>

    </div>
</div>
<!-- content end -->
<?php include 'footer.php'?>


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/article.js"></script>

<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>