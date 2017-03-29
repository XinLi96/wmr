/**
 * Created by apple on 17/3/29.
 */
$(function () {
    $('.pub-mess-btn').on('click',function () {
        $messageContent=$('.message-content').val();
        $time=getNowFormatDate();
        $messageEmail=$('.message-email').val();
        $messageName=$('.message-name').val();
        $.get('message/do_message',{
            'name':$messageName,
            'email':$messageEmail,
            'content':$messageContent,
            'time':$time
        },function (data) {
            console.log(data);
            if(data){
                var html='';

                html+=
                    '<div class="am-g blog-author blog-article-margin">'+
                    '<div class="am-u-sm-7 am-u-md-9 am-u-lg-10 message-div">'+
                    '<span>'+$messageName+'</span>'+
                    '<span>'+$messageEmail+'</span>'+
                    '<span>'+$time+'</span>'+
                    '<p>'+$messageContent+'</p>'+
                    '</div>'+
                    '</div>'+
                    '<hr>';

                $('.message-div').prepend(html);

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