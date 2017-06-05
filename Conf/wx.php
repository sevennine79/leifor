<?php
/**自定义菜单*/
header('Content-Type: text/html; charset=UTF-8');
$APPID="wx9741c8018b9b52a7";
$APPSECRET="fdc06891a192c27f01cedc067bf7db4c";

$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

$json=file_get_contents($TOKEN_URL);
$result=json_decode($json);

$ACC_TOKEN=$result->access_token;

$data='{
		 "button":[
		 {
			   "name":"羽曦",
			   "sub_button":[
				{
				   "type":"click",
				   "name":"1",
				   "key":"tianQi"
				},
				{
				   "type":"click",
				   "name":"2",
				   "key":"gongJiao"
				},
				{
				   "type":"click",
				   "name":"3",
				   "key":"fanYi"
				},
				{
				   "type":"click",
				   "name":"4",
				   "key":"kuaiDi"
				}]
		  },
		  {
			   "name":"leifor",
			   "sub_button":[
				{
				   "type":"click",
				   "name":"1",
				   "key":"1"
				},
				{
				   "type":"click",
				   "name":"2",
				   "key":"suzhouScenic"
				},
				{
				   "type":"click",
				   "name":"3",
				   "key":"suzhouFood"
				},
				{
				   "type":"view",
				   "name":"test",
				   "url":"http://leifor.com/test.php"
				}]
		   },
		   {
			   "type":"view",
			   "name":"羽曦商城",
			   "url":"http://leifor.com/view/wx"
		   }]
       }';

$MENU_URL="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$ACC_TOKEN;

$ch = curl_init($MENU_URL);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//未配置https信任验证，跳过ssl检查项
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
$info = curl_exec($ch);
$menu = json_decode($info);
print_r($info);		//创建成功返回：{"errcode":0,"errmsg":"ok"}

if($menu->errcode == "0"){
    echo "菜单创建成功";
}else{
    echo "菜单创建失败";
}
?>