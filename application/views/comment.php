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
        <article class="am-article blog-article-p">
            <p class="comment-center">文章的评论</p>
        </article>


        <hr>




        <div class="am-g comment-div">

            <?php foreach ($comments as $v){?>
                <div class="am-g blog-author blog-article-margin">
                    <div class="am-u-sm-7 am-u-md-9 am-u-lg-10 ">
                        <span><?php if(isset($v)){echo $v->comment_user_name;}?>  &nbsp;</span>
                        <span><?php if(isset($v)){echo $v->comment_post_date;}?></span>
                        <p>评论内容:</p><p><?php if(isset($v)){echo $v->comment_content;}?></p>
                        <span>文章标题:</span> <a href='blog/get_blog?blogId=<?php echo $v->blog_id?>' class="blog-li"><?php if(isset($v)){echo $v->blog_title;}?></a>
                    </div>
                </div>
                <hr>
            <?php }?>


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