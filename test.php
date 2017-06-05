<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 13:09
 */
session_start();
define('_ROOT_',str_replace( '\\' , '/' , realpath(dirname(__FILE__))));
include (_ROOT_.'/Controller/data_controller.php');
include (_ROOT_.'/Controller/wx_controller.php');
include (_ROOT_.'/Controller/view_controller.php');
include (_ROOT_.'/Conf/config.php');
include (_ROOT_.'/Controller/function.php');
include (_ROOT_.'/smarty/Smarty.class.php');//引入文件类
global $tpl;
$tpl=new Smarty();
$tpl->template_dir=_ROOT_."/View";//指定模版存放目录
$tpl->compile_dir=_ROOT_."/View_c";//指定编译文件存放目录
$tpl->config_dir=_ROOT_."/Conf";//指定配置文件存放目录
$tpl->cache_dir=_ROOT_."/Cache";//指定缓存存放目录
$tpl->caching=false;//关闭缓存（设置为true表示启用缓存）
//$tpl->cache_lifetime=60*60*24;
$tpl->left_delimiter='<{';//指定左标签
$tpl->right_delimiter='}>';//指定右标签
run($tpl);