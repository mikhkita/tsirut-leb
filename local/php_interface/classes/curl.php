<?

Class Curl {

    public $cookie = NULL;
    public $proxy_login = NULL;
    public $proxy_ip = NULL;
    public $ip = NULL;
    public $cookieChanged = false;

    function __construct($type = NULL) {
        if($type !== NULL) {
            if(strpos($type, "@")) {
                $this->proxySet($type);
                $this->checkProxy();
            } else $this->ip = $type;
        }
        $this->cookie = md5(rand().time());
        // $this->removeCookies();
    }

    function __destruct() {
        if(!$this->cookieChanged)
            $this->removeCookies();
    }

    public function request($url = NULL,$post = NULL,$gzdecode = false,$customHeader = false){  
        $url_info = parse_url($url);

        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout' => 5,
                'header'=>  "Accept:*/*\r\n" .
                            "Accept-Encoding:gzip, deflate, br\r\n" .
                            "Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4,sv;q=0.2\r\n" .
                            "Cache-Control:no-cache\r\n" .
                            "Connection:keep-alive\r\n" .
                            "Cookie:tv-user-id=3952382\r\n" .
                            "Host:".$url_info["host"]."\r\n" .
                            "Pragma:no-cache\r\n" .
                            "Referer:http://bel.redder.pro/tours/\r\n" .
                            "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"
            )
        );

        $context = stream_context_create($opts);

        $fp = fopen($url, 'rb', false, $context);

        $resultText = stream_get_contents($fp);

        fclose($fp);

        // $resultText = file_get_contents("https://tourvisor.ru/xml/modsearch.php?".http_build_query($out), false, $context);

        if( $gzdecode ){
            return gzdecode($resultText);
        }else{
            return $resultText;
        }

        // $header =  array(
        //     'Accept:*/*',
        //     'Accept-Encoding:gzip, deflate, br',
        //     'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4,sv;q=0.2',
        //     'Cache-Control:no-cache',
        //     'Connection:keep-alive',
        //     'Cookie:tv-user-id=3952382',
        //     'Host:'.$url_info["host"],
        //     'Pragma:no-cache',
        //     'Referer:https://kru-god.ru/services/search/',
        //     'User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'
        // );       
        // if( is_array($customHeader) ){
        //     $header = array_merge($header, $customHeader);
        // }
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        // curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, 1);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_AUTOREFERER, 1);

        // // if($this->proxy_login && $this->proxy_ip) {
        // //     curl_setopt($ch, CURLOPT_PROXY, $this->proxy_ip);
        // //     curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_login); 
        // // }

        // if($this->ip) {
        //     // curl_setopt($ch, CURLOPT_URL, "http://".$this->ip."/redirect.php");
        //     // if($post) {
        //     //     $post['cookie'] = $this->cookie;
        //     // } else $post = array("cookie" => $this->cookie);
        //     // if($url) $post['url'] = $url;
        // } else {
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     if (!is_dir(dirname(__FILE__).'/cookies')) mkdir(dirname(__FILE__).'/cookies',0777, true);
        //     curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookies/'.$this->cookie.'.txt');
        //     curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).'/cookies/'.$this->cookie.'.txt');
        // }
        // if( is_array($post) ){
        //     // if($this->ip)
        //         // $post = array("json" => json_encode($post));
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // }
        // $result = curl_exec($ch);
        // print_r($result);
        // curl_close( $ch );
        // if( $gzdecode ){
        //     return gzdecode($result);
        // }else{
        //     return $result;
        // }
    }

    public function proxySet($proxy) {
        $proxy = explode("@", $proxy);
        $this->proxy_login = $proxy[0];
        $this->proxy_ip = $proxy[1];
    }

    public function checkProxy(){
        include_once Yii::app()->basePath.'/extensions/simple_html_dom.php';

        $i = 0;
        do {
            $i++;
            $result = $this->request("http://www.seogadget.ru/location");
            $html = str_get_html($result);
        } while ( !is_object($html) && $i < 5 );

        if( !is_object($html) ){
            Log::debug("Прокси ".$temp_ip[0]." упал");
            return false;
        }
        $ip = $html->find('.url',0)->value;

        $temp_ip = explode(":", $this->proxy_ip);
        if( $ip == $temp_ip[0]) {
            Log::debug("Прокси ".$ip." успешно установлен");
            return true;
        }else{
            Log::debug("Прокси ".$temp_ip[0]." не был установлен. Выдало ".$ip);
            return false;
        }
    }

    public function proxyUnset() {
        $this->$proxy_login = NULL;
        $this->$proxy_ip = NULL;
    }

    public function changeCookies($login){
        $this->removeCookies();
        $this->cookie = md5($login);
        $this->cookieChanged = true;
        print_r($this->cookie);
        echo " ";
    }

    public function removeCookies(){
        if($this->ip) {
            $this->request(NULL,array("remove" => 1));
        } else {
            if( file_exists(dirname(__FILE__).'/cookies/'.$this->cookie.'.txt') )
                unlink(dirname(__FILE__).'/cookies/'.$this->cookie.'.txt');
        }
    }
}

?>