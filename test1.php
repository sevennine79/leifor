<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/31
 * Time: 15:31
 */
require("Conf/smarty.inc.php");//引入配置文件
$title="Smarty";//定义变量
$content="抬头挺胸，明天这个世界是我的";
$tpl->assign("title",$title);//用定义的变量替换模板中的变量
$tpl->assign("content",$content);
$tpl->display('test1.html');//显示模板文件
