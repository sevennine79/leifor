<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 10:47
 */
//redis操作类
class Redis_driver{
     //redis连接
     private function redis_connect()
    {
        $redis = new Redis();
        $redis->connect(redis_host, redis_port);
        $redis->auth(redis_psw);
        $redis->select(redis_db);
        return $redis;
    }
     //写入缓存
     public function redis_set($key,$value){
         $redis = self::redis_connect()->set($key,$value);
         return $redis;
     }
     //读取缓存
     public function redis_get($key)
     {
         $redis = self::redis_connect()->get($key);
         return $redis;
     }
     //删除缓存
     public function redis_remove($key){
         $redis = self::redis_connect()->delete($key);
         return $redis;
     }
     //清空数据库
     public function redis_clear(){
         $redis = self::redis_connect()->flushDB();
         return $redis;
     }
}
//curl操作类
class Curl_Manager {
    private $_is_temp_cookie = false;
    private $_header;
    private $_body;
    private $_ch;

    private $_proxy;
    private $_proxy_port;
    private $_proxy_type = 'HTTP'; // or SOCKS5
    private $_proxy_auth = 'BASIC'; // or NTLM
    private $_proxy_user;
    private $_proxy_pass;

    protected $_cookie;
    protected $_options;
    protected $_url = array ();
    protected $_referer = array ();

    public function __construct($options = array()) {
        $defaults = array ();
        $defaults ['timeout'] = 30;
        $defaults ['temp_root'] = sys_get_temp_dir ();
        $defaults ['user_agent'] = 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A537a Safari/419.3';
        $this->_options = array_merge ( $defaults, $options );
    }

    public function open() {
        $this->_ch = curl_init ();
        //curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt ( $this->_ch, CURLOPT_HEADER, true );
        curl_setopt ( $this->_ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $this->_ch, CURLOPT_USERAGENT, $this->_options ['user_agent'] );
        curl_setopt ( $this->_ch, CURLOPT_CONNECTTIMEOUT, $this->_options ['timeout'] );
        curl_setopt ( $this->_ch, CURLOPT_HTTPHEADER, array('Expect:') ); // for lighttpd 417 Expectation Failed

        $this->_header = '';
        $this->_body = '';

        return $this;
    }

    public function close() {
        if (is_resource ( $this->_ch )) {
            curl_close ( $this->_ch );
        }

        if (isset ( $this->_cookie ) && $this->_is_temp_cookie && is_file ( $this->_cookie )) {
            unlink ( $this->_cookie );
        }
    }

    public function cookie() {
        if (! isset ( $this->_cookie )) {
            if (! emptyempty ( $this->_cookie ) && $this->_is_temp_cookie && is_file ( $this->_cookie )) {
                unlink ( $this->_cookie );
            }

            $this->_cookie = tempnam ( $this->_options ['temp_root'], 'curl_manager_cookie_' );
            $this->_is_temp_cookie = true;
        }

        curl_setopt ( $this->_ch, CURLOPT_COOKIEJAR, $this->_cookie );
        curl_setopt ( $this->_ch, CURLOPT_COOKIEFILE, $this->_cookie );

        return $this;
    }

    public function ssl() {
        curl_setopt ( $this->_ch, CURLOPT_SSL_VERIFYPEER, false );

        return $this;
    }

    public function proxy($host = null, $port = null, $type = null, $user = null, $pass = null, $auth = null) {
        $this->_proxy = isset ( $host ) ? $host : $this->_proxy;
        $this->_proxy_port = isset ( $port ) ? $port : $this->_proxy_port;
        $this->_proxy_type = isset ( $type ) ? $type : $this->_proxy_type;

        $this->_proxy_auth = isset ( $auth ) ? $auth : $this->_proxy_auth;
        $this->_proxy_user = isset ( $user ) ? $user : $this->_proxy_user;
        $this->_proxy_pass = isset ( $pass ) ? $pass : $this->_proxy_pass;

        if (! emptyempty ( $this->_proxy )) {
            curl_setopt ( $this->_ch, CURLOPT_PROXYTYPE, $this->_proxy_type == 'HTTP' ? CURLPROXY_HTTP : CURLPROXY_SOCKS5 );
            curl_setopt ( $this->_ch, CURLOPT_PROXY, $this->_proxy );
            curl_setopt ( $this->_ch, CURLOPT_PROXYPORT, $this->_proxy_port );
        }

        if (! emptyempty ( $this->_proxy_user )) {
            curl_setopt ( $this->_ch, CURLOPT_PROXYAUTH, $this->_proxy_auth == 'BASIC' ? CURLAUTH_BASIC : CURLAUTH_NTLM );
            curl_setopt ( $this->_ch, CURLOPT_PROXYUSERPWD, "[{$this->_proxy_user}]:[{$this->_proxy_pass}]" );
        }

        return $this;
    }

    public function post($action, $query = array()) {
        if (is_array($query)) {
            foreach ($query as $key => $val) {
                if ($val{0} != '@') {
                    $encode_key = urlencode($key);

                    if ($encode_key != $key) {
                        unset($query[$key]);
                    }

                    $query[$encode_key] = urlencode($val);
                }
            }
        }

        curl_setopt ( $this->_ch, CURLOPT_POST, true );
        curl_setopt ( $this->_ch, CURLOPT_URL, $this->_url [$action] );
        curl_setopt ( $this->_ch, CURLOPT_REFERER, $this->_referer [$action] );
        curl_setopt ( $this->_ch, CURLOPT_POSTFIELDS, $query );

        $this->_requrest ();

        return $this;
    }

    public function get($action, $query = array()) {
        $url = $this->_url [$action];

        if (! emptyempty ( $query )) {
            $url .= strpos ( $url, '?' ) === false ? '?' : '&';
            $url .= is_array ( $query ) ? http_build_query ( $query ) : $query;
        }

        curl_setopt ( $this->_ch, CURLOPT_URL, $url );
        curl_setopt ( $this->_ch, CURLOPT_REFERER, $this->_referer [$action] );

        $this->_requrest ();

        return $this;
    }

    public function put($action, $query = array()) {
        curl_setopt ( $this->_ch, CURLOPT_CUSTOMREQUEST, 'PUT' );

        return $this->post ( $action, $query );
    }

    public function delete($action, $query = array()) {
        curl_setopt ( $this->_ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );

        return $this->post ( $action, $query );
    }

    public function head($action, $query = array()) {
        curl_setopt ( $this->_ch, CURLOPT_CUSTOMREQUEST, 'HEAD' );

        return $this->post ( $action, $query );
    }

    public function options($action, $query = array()) {
        curl_setopt ( $this->_ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS' );

        return $this->post ( $action, $query );
    }

    public function trace($action, $query = array()) {
        curl_setopt ( $this->_ch, CURLOPT_CUSTOMREQUEST, 'TRACE' );

        return $this->post ( $action, $query );
    }

    public function connect() {

    }

    public function follow_location() {
        preg_match ( '#Location:\s*(.+)#i', $this->header (), $match );

        if (isset ( $match [1] )) {
            $this->set_action ( 'auto_location_gateway', $match [1], $this->effective_url () );

            $this->get ( 'auto_location_gateway' )->follow_location ();
        }

        return $this;
    }

    public function set_action($action, $url, $referer = '') {
        $this->_url [$action] = $url;
        $this->_referer [$action] = $referer;

        return $this;
    }

    public function header() {
        return $this->_header;
    }

    public function body() {
        return $this->_body;
    }

    public function effective_url() {
        return curl_getinfo ( $this->_ch, CURLINFO_EFFECTIVE_URL );
    }

    public function http_code() {
        return curl_getinfo($this->_ch, CURLINFO_HTTP_CODE);
    }

    private function _requrest() {
        $response = curl_exec ( $this->_ch );

        $errno = curl_errno ( $this->_ch );

        if ($errno > 0) {
            throw new Curl_Manager_Exception ( curl_error ( $this->_ch ), $errno );
        }

        $header_size = curl_getinfo ( $this->_ch, CURLINFO_HEADER_SIZE );

        $this->_header = substr ( $response, 0, $header_size );
        $this->_body = substr ( $response, $header_size );
    }

    public function __destruct() {
        $this->close ();
    }
}
//cure
class Curl
{
    function Curl(){
        return true;
    }

    function execute($method, $url, $fields='', $userAgent='', $httpHeaders='', $username='', $password=''){
        $ch = Curl::create();
        if(false === $ch){
            return false;
        }
        if(is_string($url) && strlen($url)){
            $ret = curl_setopt($ch, CURLOPT_URL, $url);
        }else{
            return false;
        }
        //是否显示头部信息
        curl_setopt($ch, CURLOPT_HEADER, false);
        //
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($username != ''){
            curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
        }
        $method = strtolower($method);
        if('post' == $method){
            curl_setopt($ch, CURLOPT_POST, true);
            if(is_array($fields)){
                $sets = array();
                foreach ($fields AS $key => $val){
                    $sets[] = $key . '=' . urlencode($val);
                }
                $fields = implode('&',$sets);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }else if('put' == $method){
            curl_setopt($ch, CURLOPT_PUT, true);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//未配置https信任验证，跳过ssl检查项

        //curl_setopt($ch, CURLOPT_PROGRESS, true);
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        //curl_setopt($ch, CURLOPT_MUTE, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);//设置curl超时秒数
        if(strlen($userAgent)){
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        }
        if(is_array($httpHeaders)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeaders);
        }
        $ret = curl_exec($ch);
        if(curl_errno($ch)){
            curl_close($ch);
            return array(curl_error($ch), curl_errno($ch));
        }else{
            curl_close($ch);
            if(!is_string($ret) || !strlen($ret)){
                return false;
            }
            return $ret;
        }
    }

    function post($url, $fields, $userAgent = '', $httpHeaders = '', $username = '', $password = ''){
        $ret = Curl::execute('POST', $url, $fields, $userAgent, $httpHeaders, $username, $password);
        if(false === $ret){
            return false;
        }
        if(is_array($ret)){
            return false;
        }
        return $ret;
    }

    function get($url, $userAgent = '', $httpHeaders = '', $username = '', $password = ''){
        $ret = Curl::execute('GET', $url, '', $userAgent, $httpHeaders, $username, $password);
        if(false === $ret){
            return false;
        }
        if(is_array($ret)){
            return false;
        }
        return $ret;
    }

    function create(){
        $ch = null;
        if(!function_exists('curl_init')){
            return false;
        }
        $ch = curl_init();
        if(!is_resource($ch)){
            return false;
        }
        return $ch;
    }
}
