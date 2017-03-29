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

        <p class="comment-center">留言板</p>

        <div class="am-g message-div">

            <?php foreach ($messages as $v){?>
                <div class="am-g blog-author blog-article-margin">
                    <div class="am-u-sm-7 am-u-md-9 am-u-lg-10 ">
                        <span><a href="#"><?php if(isset($v)){echo $v->user_name;}?>  &nbsp;</a></span>
                        <span><a href="#"><?php if(isset($v)){echo $v->user_mail;}?>  &nbsp;</a></span>
                        <span><a href="#"><?php if(isset($v)){echo $v->message_date;}?></a></span>
                        <p><?php if(isset($v)){echo $v->message_content;}?></p>
                    </div>
                </div>
                <hr>
            <?php }?>


        </div>



        <div class="am-form am-g">
            <h3 class="blog-comment">留言</h3>
            <input type="hidden" class="hideBlogId"   value="<?php if(isset($rs)){echo $rs->blog_id;}?>" >

            <hr>
            <fieldset>
                <div class="am-form-group am-u-sm-4 blog-clear-left">
                    <input type="text" class="message-name"  name="message-name" value="" placeholder="名字">
                </div>
                <div class="am-form-group am-u-sm-4">
                    <input type="email" class="message-email" name="message-email" class="" placeholder="邮箱">
                </div>
                <div class="am-form-group">
                    <textarea class="message-content"  name="message-content" rows="5" placeholder="一字千金"></textarea>
                </div>


            </fieldset>
            <hr>

            <p><button  class="am-btn am-btn-default pub-mess-btn">发表留言</button></p>
        </div>


    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="<?php if(isset($rs)){echo $rs->user_img;}?>" alt="about me" class="blog-entry-img" >
            <p><?php if(isset($rs)){echo $rs->sex;}?></p>
            <p>
                <?php if(isset($rs)){echo $rs->user_introduction;}?>
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
<script src="assets/js/message.js"></script>

<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>