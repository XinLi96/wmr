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
            <div class="am-article-hd">
                <h1 class="am-article-title blog-text-center"><?php if(isset($rs)){echo $rs->blog_title;}?></h1>
                <p class="am-article-meta blog-text-center">
                    <span><a href="#" class="blog-color"><?php if(isset($rs)){echo $rs->cate_name;}?> &nbsp;</a></span>-
                    <span><a href="#"><?php if(isset($rs)){echo $rs->user_name;}?>  &nbsp;</a></span>-
                    <span><a href="#"><?php if(isset($rs)){echo $rs->postdate;}?></a></span>
                </p>
            </div>
            <div class="am-article-bd">
                <img src="<?php if(isset($rs)){echo $rs->blog_img;}?>" alt="" class="blog-entry-img blog-article-margin">
                <p class="class="am-article-lead"">

                <blockquote><p><?php if(isset($rs)){echo $rs->introduce;}?></p></blockquote>

                <p><?php if(isset($rs)){echo $rs->blog_content;}?></p>
                </p>
            </div>
        </article>


        <hr>
        <div class="am-g blog-author blog-article-margin">
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
                <img src="<?php if(isset($rs)){echo $rs->user_img;}?>" alt="" class="blog-author-img am-circle">
            </div>
            <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
                <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color"><?php if(isset($rs)){echo $rs->user_name;}?></span></h3>
                <p><?php if(isset($rs)){echo $rs->user_introduction;}?></p>
        </div>
        </div>
        <hr>
        <p class="comment-center">文章的评论</p>

        <div class="am-g comment-div">

            <?php foreach ($rs_all_comment as $v){?>
        <div class="am-g blog-author blog-article-margin">
               <div class="am-u-sm-7 am-u-md-9 am-u-lg-10 ">
                   <span><a href="#"><?php if(isset($v)){echo $v->comment_user_name;}?>  &nbsp;</a></span><span><a href="#"><?php if(isset($v)){echo $v->comment_post_date;}?></a></span><p><?php if(isset($v)){echo $v->comment_content;}?></p>
               </div>
        </div>
               <hr>
               <?php }?>


        </div>



       <div class="am-form am-g">
            <h3 class="blog-comment">评论</h3>
            <input type="hidden" class="hideBlogId"   value="<?php if(isset($rs)){echo $rs->blog_id;}?>" >
         
              <hr>
              <fieldset>
                  <div class="am-form-group am-u-sm-4 blog-clear-left">
                      <input type="text" class="comment-name"  name="comment-name" value="" placeholder="名字">
                  </div>
                  <div class="am-form-group am-u-sm-4">
                      <input type="email" class="comment-email" name="comment-email" class="" placeholder="邮箱">
                  </div>
                  <div class="am-form-group">
                      <textarea class="comment-content"  name="comment-content" rows="5" placeholder="一字千金"></textarea>
                  </div>


              </fieldset>
              <hr> 
          
            <p><button  class="am-btn am-btn-default pub-conmm-btn">发表评论</button></p>
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
<!--        <div class="blog-sidebar-widget blog-bor">-->
<!--            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>-->
<!--            <p>-->
<!--                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>-->
<!--                <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>-->
<!--                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>-->
<!--                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>-->
<!--                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>-->
<!--            </p>-->
<!--        </div>-->

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