<?php
/**
 * Created by PhpStorm.
 * User: seven9
 * Date: 2017/5/13
 * Time: 21:19
 */
session_start();
function run($tpl){
    //$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $action = $_GET['action'] == '' ? 'index' : $_GET['action'];
    if($action==='order'){
        $nickname=$_SESSION['user']['nickname'];$headimgurl=$_SESSION['user']['headimgurl'];
        $tpl->assign("nickname",$nickname);
        $tpl->assign("headimgurl",$headimgurl);
    }
    $run=new view($tpl,$action);
    $run->html_show();
}