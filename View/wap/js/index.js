window.addEventListener('load', function() {
    FastClick.attach(document.body);
}, false)
/*fastclick*/

$(function(){
    $('.meus').click(function(){
        $('.nav').css('display',"block");
        $('.nav').css('width',"0px");
        $('.nav').animate({width:"80%"},100);
        $('.shade').css('display','block');
        $('body').css('overflow','hidden');
    })
    
    $('.shade').click(function(){
        $('.nav').css('width',"80%");
        $('.nav').animate({width:"0"},100,function(){$('.nav').css('display',"none");});
        $('.shade').css('display','none');
        $('body').css('overflow','scroll');
    })
})