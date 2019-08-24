<?

Class Tourvisor {
    function __construct() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/classes/simple_html_dom.php';
        $this->curl = new Curl();
    }

    public function search($requestID, &$tourList){
        $this->request($requestID);

        $end = false;
        $count = 0;

        while( !$end ){
            sleep(4);
            $result = $this->request($requestID, $count);

            if( isset($result->data->block) ){
                $tourList->addList($result);

                @Log::debug($requestID." progress: ".$result->data->status->progress." ".count($result->data->block));
            }else{
                @Log::debug($requestID." progress: ".$result->data->status->progress);
            }
            // print_r($result);

            $count++;
            if( (isset($result->data->status->finished) && $result->data->status->finished) || $count == 20 ){
                $end = true;
            }
            break;
        }
    }

    public function request($requestID, $lastblock = false){
        $params = array(
            "requestid" => $requestID,
            "json" => "1",
            "callback" => "callback".rand(0,999999999999999),
        );
        if( $lastblock ){
            $params["lastblock"] = 2;
        }

        echo "request()<br>";

        // $json = $this->curl->request("https://search3.tourvisor.ru/modresult.php?".http_build_query($params), NULL, true);
        $json = file_get_contents("https://search3.tourvisor.ru/modresult.php?".http_build_query($params));
        echo "https://search3.tourvisor.ru/modresult.php?".http_build_query($params)."<br>";
        print_r($json);
        $result = $this->toArray($json);

        // $hotels = $result->data->decode->hotels;
        return $result;
    }

    public function getRequestID($params){
        $default_params = array(
            "nightsfrom" => "6",
            "nightsto" => "14",
            "adults" => "2",
            "operators" => "",
            "meal" => "0",
            "stars" => "1",
            "rating" => "0",
            "hoteltypes" => "",
            "pricefrom" => "0",
            "priceto" => "200001",
            "currency" => "0",
            "directonly" => "0",
            "showoperator" => "1",
            "pricetype" => "0",
            "gettemp" => "theme2",
            "callback" => "callback".rand(0,999999999999999),
        );

        $out = array_merge($default_params, $params);

        // print_r($out);
        // die();

        // $opts = array(
        //     'http'=>array(
        //         'method'=>"GET",
        //         'header'=>  "Accept:*/*\r\n" .
        //                     "Accept-Encoding:gzip, deflate, br\r\n" .
        //                     "Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4,sv;q=0.2\r\n" .
        //                     "Cache-Control:no-cache\r\n" .
        //                     "Connection:keep-alive\r\n" .
        //                     "Cookie:tv-user-id=3952382\r\n" .
        //                     "Host:tourvisor.ru\r\n" .
        //                     "Pragma:no-cache\r\n" .
        //                     "Referer:https://kru-god.ru/services/search/\r\n" .
        //                     "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"
        //     )
        // );

        // $context = stream_context_create($opts);

        // $resultText = file_get_contents("https://tourvisor.ru/xml/modsearch.php?".http_build_query($out), false, $context);

        // $resultText = gzdecode($resultText);
        // print_r($resultText);
        // die();
        $resultText = $this->curl->request("https://tourvisor.ru/xml/modsearch.php?".http_build_query($out), NULL, true);
        $result = $this->toArray($resultText);

        if( !$result->result->requestid ){
            echo "Ошибка при создании запроса<br>";
            print_r($resultText);
            print_r($result);
            die();
        }else{
            echo "requestID: ". $result->result->requestid. "<br>";
        }

        @Log::debug("df: ".$out["datefrom"]." dt: ".$out["dateto"]." d: ".$out["departure"]." c: ".$out["country"].((isset($out["regions"]))?(" r: ".$out["regions"]):"")." requestID: ".$result->result->requestid);

        return $result->result->requestid;
    }

    public function hotelDetail($hotelCode){
        $params = array(
            "ajax_url" => "http://tourvisor.ru/module/ajax_country.php",
            "hotel" => $hotelCode,
            "width" => "780",
            "callback" => "jQuery211044235179907198563_1512195009887",
            "_" => "1512195009891",
        );

        $result = $this->curl->request("http://tourvisor.ru/module/ts_loader_local.php?".http_build_query($params), NULL, true);
        $result = $this->toArrayHotel($result);

        print_r($result);
    }

    public function getCountries($moduleid){
        $params = array(
            "page" => "1",
            "limit" => 100000,
            "sortProp" => "popularity",
            "sortDir" => "desc",
            "departure" => "1",
            "viewType" => "1",
        );

        $result = $this->curl->request("http://tourvisor.ru/api/v1/countries?".http_build_query($params));

        // $result = substr($result, strpos($result, "(")+1, -2);
        return json_decode($result, true);
        // var_dump($result);
        // die();
    }

    public function getMinPrices($moduleid){
        $params = array(
            "format" => "json",
            "moduleid" => $moduleid,
            "callback" => "callback05674129482521311",
        );

        $result = $this->curl->request("http://tourvisor.ru/xml/modmin.php?".http_build_query($params));

        $result = substr($result, strpos($result, "(")+1, -2);
        return json_decode($result, true);
        // var_dump($result);
        // die();
    }

    public function toArray($str){
        $str = substr($str, strpos($str, "(") + 1, -2 );
        return json_decode($str);
    }

    public function toArrayHotel($str){
        $str = str_replace(array("\'", '\"'), array('"', '"'), substr($str, strpos($str, ":") + 2, -3 ));
        return $str;
    }

    public function self(){
        return new Tourvisor();
    }
}

?>