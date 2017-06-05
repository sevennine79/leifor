$(function(){
    $('.useronload').click(function(){
        $('.shade').fadeIn();
        $('.loading').fadeIn();
    })
    $('.warning span').click(function(){
        $('.shade').fadeIn();
        $('.loading').fadeIn();
    })
    /*登录按钮点击事件*/

    $('.change_logUp').click(function(){
        $('.signUp').css('display','none');
        $('.logUp').css('display','block');
    })
    $('.change_signUp').click(function(){
        $('.logUp').css('display','none');
        $('.signUp').css('display','block');
    })
    /*登录注册切换*/

    $('.shade').click(function(){
        $('.shade').fadeOut();
        $('.loading').fadeOut();
    })
    /*遮罩点击事件*/

    $('.off_btn').click(function(){
        $('.shade').fadeOut();
        $('.loading').fadeOut();
    })
    /*关闭按钮点击事件*/

    $('.search').click(function(){
        $('.search_box').css('display','block');
        return false;
    })
    $('.search_box').click(function(){
        return false;
    })
    $('body').click(function(){
        $('.search_box').css('display','none');
    })
    /*搜索弹出*/

    $('.shopCar').mouseover(function(){
        $('.shopCar_cont').css('display','block');
    })
    $('.header_container').mouseleave(function(){
        $('.shopCar_cont').css('display','none');
    })
    /*购物车悬浮*/

    $('.pro').mouseover(function(){
        $('.search_box').css('display','none');
        $('.product').css('display','block');
    })
    $('.header_container').mouseleave(function(){
        $('.product').css('display','none');
    })
    /*产品中心鼠标悬浮*/

    /*登录注册验证*/
    var logUpBtn = $('.logUpBtn');
    var signUpBtn = $('.signUpBtn');
    var username = $('.username');
    var password = $('.password');
    var nickname = $('.nickname');
    var email = $('.email');
    var spassword = $('.spassword');
    var tel = $('.tel');
    var ck = $('.ck');
    var msg = $('.msg');
    logUpBtn.click(function(){
        if($.trim(username.val()) == ''){
            msg.html('* 账号不能为空');
            return false;
        }else if($.trim(password.val()) == ''){
            msg.html('* 密码不能为空');
            return false;
        }else{
            msg.html('');
            return true;
        }
    })
    /*登录*/
    signUpBtn.click(function(){
        if($.trim(nickname.val()) == ''){
            msg.html('* 名不能为空');
            return false;
        }else if($.trim(email.val()) == ''){
            msg.html('* 邮箱不能为空');
            return false;
        }else if($.trim(spassword.val()) == ''){
            msg.html('* 密码不能为空');
            return false;
        }else if($.trim(tel.val()) == ''){
            msg.html('* 电话号码不能为空');
            return false;
        }else{
            msg.html('');
            return true;
        }
    })
    /*注册*/
})