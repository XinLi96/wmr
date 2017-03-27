$(function () {
    $('.pub-conmm-btn').on('click',function () {
        $commentContent=$('.comment-content').val();
        $time=getNowFormatDate();
        $commentEmail=$('.comment-email').val();
        $commentName=$('.comment-name').val();
        $hideBlogId=$('.hideBlogId').val();
        $.get('comment/do_comment',{
            'name':$commentName,
            'email':$commentEmail,
            'content':$commentContent,
            'hideBlogId':$hideBlogId,
            'time':$time
        },function (data) {
            console.log(data);
            if(data){
                var html='';
                html+=
            '<div class="am-g blog-author blog-article-margin">'+
                    '<div class="am-u-sm-7 am-u-md-9 am-u-lg-10 comment-div">'+
                    '<span>'+$commentName+'</span>'+
                    '<span>'+$time+'</span>'+
                    '<p>'+$commentContent+'</p>'+
                '</div>'+
                '</div>'+
                '<hr>';
               
                $('.comment-div').prepend(html);

            }else if(data==false){

            }
        },'text');
        //js获取当前时间
        function getNowFormatDate() {
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                + " " + date.getHours() + seperator2 + date.getMinutes()
                + seperator2 + date.getSeconds();
            return currentdate;
        }

    })
});