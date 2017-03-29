<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/css/pensonal.css">
</head>
<body>
<?php include('header.php')?>

<div id="zhuti">
    <div class="con">
        <div class="header">
            <span>个人信息</span>
        </div>
        <form action="user/update_info" method="post">
            <div class="nav">
                <ul class="information">
                    <li id="name">
                        <span class="left">头&nbsp;&nbsp;像:</span>
                        <span class="right"><img src="<?php echo $result->user_img;?>" style="width: 50px;height: 50px" alt=""></span>
                    </li>
                    <li id="name">
                        <span class="left">姓&nbsp;&nbsp;名:</span>
                        <span class="right"><input type="text" name="name" value="<?php echo $result->user_name;?>"></span>
                    </li>
                    <li id="name">
                        <span class="left">账&nbsp;&nbsp;号:</span>
                        <span class="right"><input type="text" readonly="readonly" value="<?php echo $result->email;?>"></span>
                    </li>
                    <li id="name">
                        <span class="left">密&nbsp;&nbsp;码:</span>
                        <span class="right"><input type="text" name="pass" value="<?php echo $result->pass;?>"></span>
                    </li>
                    <li id="name">
                        <span class="left">性&nbsp;&nbsp;别:</span>
                        <span class="right"><input type="text" name="sex" value="<?php echo $result->sex;?>">
                            </span>
                    </li>
                    <li id="name">
                        <span class="left">省&nbsp;&nbsp;份:</span>
                        <span class="right"><input type="text" name="pro" value="<?php echo $result->province;?>"></span>
                    </li>
                    <li id="name">
                        <span class="left">城&nbsp;&nbsp;市:</span>
                        <span class="right"><input type="text" name="city" value="<?php echo $result->city;?>"></span>
                    </li>
                    <li id="name">
                        <span class="left">个人介绍:</span>
                        <span class="right"><textarea name="js" id="" cols="30" rows="4"><?php echo $result->user_introduction;?></textarea></span>
                    </li>
                </ul>
                <div id="btn">
                    <button class="change">修&nbsp;&nbsp;改</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php')?>
</body>
</html>