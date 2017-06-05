$(document).on("mousewheel DOMMouseScroll", function (e) {
    var delta = (e.originalEvent.wheelDelta && (e.originalEvent.wheelDelta > 0 ? 1 : -1)) ||  // chrome & ie
                (e.originalEvent.detail && (e.originalEvent.detail > 0 ? -1 : 1));            // firefox

    var $body = (window.opera) ? (document.compatMode == 'CSS1Compat' ? $('html') : $('body')) : $('html,body');

    var scltop = $(window).scrollTop();     //当前滚动条位置

    if (delta > 0) {
        // 向上滚
        if(!$body.is(":animated")){
            if(scltop == 3494){
                $body.animate({
                scrollTop:(3150)
                }, 500);
            }
            else{
                $body.animate({
                scrollTop:(scltop-1050)
                }, 500);
            }
        } else{
            return false;
        }
    } else if (delta < 0) {
        // 向下滚
        if(!$body.is(":animated")){
            $body.animate({
                scrollTop:(scltop+1050)
            }, 500);
        } else{
            return false;
        }
    }
});