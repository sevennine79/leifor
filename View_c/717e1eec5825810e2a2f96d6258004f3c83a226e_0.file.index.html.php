<?php
/* Smarty version 3.1.30, created on 2017-06-02 15:51:48
  from "D:\WWW\leifor\View\wap\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59311914b5ef17_33191106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '717e1eec5825810e2a2f96d6258004f3c83a226e' => 
    array (
      0 => 'D:\\WWW\\leifor\\View\\wap\\index.html',
      1 => 1495098883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59311914b5ef17_33191106 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<!-- <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=NO" /> -->
<link href="/view/web/css/index.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="/view/web/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/view/web/js/TouchSlide.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/view/web/js/index.js"><?php echo '</script'; ?>
>
<title>首页</title>
</head>
<body style="position: relative;height: 100%;overflow: hidden;max-width: 640px;">
	<div class="container" style="position: relative;height: 100%;overflow: hidden;max-width: 640px;">
        <div class="header">
            <div class="meus">
                <img src="/view/web/img/meus.jpg" alt="">
            </div>
            <a href="/view/web/index.html">
                <div class="logo">
                    <img src="/view/web/img/logo_04.jpg" alt="">
                </div>
            </a>   
            <a href="/view/web/cart.html">
                <div class="car">
                    <img src="/view/web/img/car.jpg" alt="">
                </div>
            </a> 
        </div>

        <div class="clearfix"></div>

        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                    <li>
                        <a class="pic" href="/view/web/product_01.html"><img src="/view/web/img/banner_01.jpg" /></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="/view/web/product_01.html"><button>探 索</button></a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a class="pic" href="/view/web/product_02.html"><img src="/view/web/img/banner_02.jpg"/></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="/view/web/product_02.html"><button>探 索</button></a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a class="pic" href="/view/web/product_03.html"><img src="/view/web/img/banner_03.jpg"/></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="/view/web/product_03.html"><button>探 索</button></a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
        </div>
    </div>
     
     <div class="nav">
         <img src="/view/web/img/navcolum.png" alt="">
         <div class="proList">
             <a href="/view/web/product_01.html"><div class="proItem">洁面乳</div></a>
             <a href="/view/web/product_02.html"><div class="proItem">冻干粉</div></a>
             <a href="/view/web/product_03.html"><div class="proItem">修护面膜</div></a>
         </div>
         <div class="sidebar">
             <a href="/view/web/Thelogin.html"><div class="sidebarItem">登录账号</div></a>
             <a href="/view/web/history.html"><div class="sidebarItem">品牌故事</div></a>
             <a href="/view/web/cart.html"><div class="sidebarItem">我的购物车</div></a>
             <a href="/view/web/order.html"><div class="sidebarItem">个人中心</div></a>
         </div>
     </div>

     <div class="shade"></div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
    TouchSlide({ 
        slideCell:"#slideBox",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul", 
        effect:"leftLoop", 
        autoPlay:true,
        autoPage:true //自动分页
    });
<?php echo '</script'; ?>
>
</html><?php }
}
