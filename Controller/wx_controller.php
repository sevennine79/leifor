<?php
/**
 * Created by PhpStorm.
 * User: sevennine
 * Date: 2017/5/8
 * Time: 10:09
 */
class Weixin_driver
{
    //从redis获取access_token
    public function get_Access_token()
    {
        $obj=new Redis_driver();
        return $obj->redis_get('access_token');
    }
    //微信网页授权
    public function wx_login($_url)
    {
        global $url;
        $url=$_url;
        function get_code($login_type)
        {
            global $url;
            $new_url = urlencode($url);
            $code_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . APPID . '&redirect_uri=' . $new_url . '&response_type=code&scope=' . $login_type . '&state=1#wechat_redirect';
            header("Location:$code_url");
        }
        function get_userinfo()   //获取用户信息
        {
            $code=$_GET['code'];
            $token_url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APPID.'&secret='.APPSECRET.'&code='.$code.'&grant_type=authorization_code ';
            $curl=new Curl();
            $result = $curl->get(''.$token_url.'');
            $res=json_decode($result,true);
            $acc_token=$res['access_token'];
            $openid=$res['openid'];
            $info_url='https://api.weixin.qq.com/sns/userinfo?access_token='.$acc_token.'&openid='.$openid.'&lang=zh_CN';
            $obj = $curl->get(''.$info_url.'');
            $info=json_decode($obj,true);
            $_SESSION['user']=array();
            $_SESSION['user']=$info;
            return $info;
        }
        if(isset ($_GET['code'])){
            $userinfo = get_userinfo();
            if(isset ($userinfo['openid']) && ($userinfo['openid']!=='')) {
                return $userinfo;
            }else{
                get_code('snsapi_userinfo');
            }
        }else{
            get_code('snsapi_base');
        }
    }
}