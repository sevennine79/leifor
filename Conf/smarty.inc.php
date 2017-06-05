<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/31
 * Time: 15:22
 */
include("./smarty/Smarty.class.php");//引入文件类
$tpl=new Smarty();
$tpl->template_dir="./View";//指定模版存放目录
$tpl->compile_dir="./View_c";//指定编译文件存放目录
$tpl->config_dir="./Conf";//指定配置文件存放目录
$tpl->cache_dir="./Cache";//指定缓存存放目录

$tpl->caching=false;//关闭缓存（设置为true表示启用缓存）
//$tpl->cache_lifetime=60*60*24;
$tpl->left_delimiter='<{';//指定左标签
$tpl->right_delimiter='}>';//指定右标签