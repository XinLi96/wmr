$(function(){
    // ServletActionContext.getResponse().setHeader("Access-Control-Allow-Origin", "*");
    $lunboImgWidth=$('body').width();
    $('.lunbo-li img').height($lunboImgWidth*0.4+'px');
    console.log(111);
   if($('.tilte-span').html()==''){
       $('.log-div').show();
       $('.out-div').hide();
   }else{
       $('.log-div').hide();
       $('.out-div').show();
    }


});
