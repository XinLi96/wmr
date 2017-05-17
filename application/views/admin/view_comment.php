<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/admin/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/admin/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/admin/css/app.css">
    <script src="assets/admin/js/jquery.min.js"></script>

</head>

<body data-type="widgets">
<script src="assets/admin/js/theme.js"></script>
<div class="am-g tpl-g">
    <?php include('header.php');?>
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">评论列表</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                <div class="am-form-group tpl-table-list-select">

                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">

                                </div>
                            </div>

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>博客标题</th>
                                        <th>评论内容</th>
                                        <th>评论时间</th>
                                        <th>评论者</th>
                                        <th>邮箱</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($result as $row){?>
                                    <tr class="gradeX">
                                        <td class="am-text-middle"><?php echo $row->blog_title;?></td>
                                        <td class="am-text-middle"><?php echo $row->comment_content;?></td>
                                        <td class="am-text-middle"><?php echo $row->comment_user_name;?></td>
                                        <td class="am-text-middle"><?php echo $row->comment_user_email;?></td>
                                        <td class="am-text-middle"><?php echo $row->comment_post_date;?></td>
                                        <td><div class="tpl-table-black-operation">
                                                <a href="comment/del?comment_id=<?php echo $row->comment_id;?>" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div></td>

                                    </tr>
                                    <?php }?>
                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>