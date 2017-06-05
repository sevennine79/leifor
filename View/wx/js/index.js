$(function(){
    $('.meus').click(function(){
        $('.nav').css('display',"block");
        $('.nav').css('width',"0px");
        $('.nav').animate({width:"80%"},100);
        $('.container').css('left',"0");
        $('.container').animate({left:"80%"},100);
        $('.container').addClass('left');
        $('.shade').css('display','block');
        $('body').css('overflow','hidden');
    })
    
    $('.shade').click(function(){
        $('.nav').css('width',"80%");
        $('.nav').animate({width:"0"},100,function(){$('.nav').css('display',"none");});
        $('.container').css('left',"80%");
        $('.container').animate({left:"0%"},100,function(){$('.container').removeClass('left');$('.shade').css('display','none');});
        $('body').css('overflow','scroll');
    })

})
/*var a_jax = {
    //ajax请求数据
    method:function(murl,mdata,method,success){
        $.ajax({
            type:method,
            url:murl,
            dataType:"json",
            data:mdata,
            error: function (data) {
                console.log(data);
                alert("请求失败");
            },
            success: function (data) {
                //console.log(data);
                success?success(data):function(){};
            }
        })
    }
}*/