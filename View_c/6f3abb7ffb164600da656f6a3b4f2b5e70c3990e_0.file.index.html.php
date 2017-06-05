<?php
/* Smarty version 3.1.30, created on 2017-06-02 15:48:33
  from "D:\WWW\leifor\View\wx\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59311851c2df96_72519872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f3abb7ffb164600da656f6a3b4f2b5e70c3990e' => 
    array (
      0 => 'D:\\WWW\\leifor\\View\\wx\\index.html',
      1 => 1496300914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59311851c2df96_72519872 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<!-- <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=NO" /> -->
<link href="/view/wx/css/index.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="/view/wx/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/view/wx/js/TouchSlide.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/view/wx/js/index.js"><?php echo '</script'; ?>
>
<title>首页</title>
</head>
<body style="position: relative;height: 100%;overflow: hidden;max-width: 640px;overflow-y:hidden;overflow-x:hidden;">
	<div class="container" style="position: relative;height: 100%;overflow: hidden;max-width: 640px;">

        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                    <li>
                        <a class="pic" href="?action=product_01"><img src="/view/wx/img/banner_01.jpg" /></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="?action=product_01"><button>探 索</button></a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a class="pic" href="?action=product_02"><img src="/view/wx/img/banner_02.jpg"/></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="?action=product_02"><button>探 索</button></a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a class="pic" href="?action=product_03"><img src="/view/wx/img/banner_03.jpg"/></a>
                        <div class="footer">
                            <p class="p_01">光彩透白精华</p>
                            <p class="p_02">健康静澈 由心透亮</p>
                            <p class="p_03">健康静澈光芒</p>
                            <p class="button">
                                <a href="?action=product_03"><button>探 索</button></a>
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

     <div class="header">
        <a href="?action=index">
            <div class="index">
                <ul>
                    <li><img src="/view/wx/img/index2.png" alt=""></li>
                    <li style="font-weight: bold;color:#040a2b;">首页</li>
                </ul>
            </div>
        </a> 
        <a href="?action=Productcenter">
            <div class="mycar">
                <ul>
                    <li><img src="/view/wx/img/history1.png" alt=""></li>
                    <li>产品中心</li>
                </ul>
            </div>
        </a>
        <a href="?action=cart">
            <div class="history">
                <ul>
                    <li><img src="/view/wx/img/mycar1.png" alt=""></li>
                    <li>购物车</li>
                </ul>
            </div>
        </a>   
        <a href="?action=order">
            <div class="my" id="myorder">
                <ul>
                    <li><img src="/view/wx/img/my1.png" alt=""></li>
                    <li>个人中心</li>
                </ul>
            </div>
        </a>    
     </div>
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
