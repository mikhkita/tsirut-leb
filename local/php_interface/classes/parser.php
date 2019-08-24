<?

Class Parser {
    function __construct() {

    }

    public function parse($country, $departure, $regions = NULL){
        $visor = new Tourvisor();
        $data = new TourList();
        $curDate = time()+60*60*24;
        $out = array();

        for( $i = 0; $i < 6; $i++ ){
            // $curDate = date("d.m.Y", time()-10*60*60*24);
            $params = array(
                "datefrom" => date("d.m.Y", $curDate),
                "dateto" => date("d.m.Y", $curDate + 10*60*60*24),
                "country" => $country,
                "departure" => $departure,
            );

            if( $regions !== NULL ){
                $params["regions"] = $regions;
            }

            // var_dump($params);

            $requestID = $visor->getRequestID($params);

            $visor->search($requestID, $data);

            $curDate += (11*60*60*24);
        }
        $out["MIN_PRICE"] = $data->getFormatted("MP");

        $out["DAY_PRICE"] = $data->getFormatted("DP");

        return $out;
    }

    public function parse_old(){
        $visor = new Tourvisor();

        $params = array(
            "datefrom" => "17.11.2017",
            "dateto" => "30.11.2017",
            "country" => "2",
            "departure" => "9",
            "regions" => "8",
        );

        $data = new TourList();

        $requestID = $visor->getRequestID($params);

        $visor->search($requestID, $data);

        // $data->sort("MIN_PRICE");

        // foreach ($data->obj as $key => $date) {
        //     echo $date["DATE"]." на ".(intval($date["NIGHTS"])+1)." дней/".$date["NIGHTS"]." ночей <b>".$date["MIN_PRICE"]."</b> руб (".$date["DAY_PRICE"]." руб в сутки)<br>";

        //     // if( $key == 10 ){
        //         // break;
        //     // }
        // }
        // echo "<br>";

        $data->sort("DP");

        // foreach ($data->obj as $key => $date) {
        //     echo $date["DATE"]." на ".(intval($date["NIGHTS"])+1)." дней/".$date["NIGHTS"]." ночей <b>".$date["MIN_PRICE"]."</b> руб (".$date["DAY_PRICE"]." руб в день)<br>";

        //     // if( $key == 10 ){
        //     //     echo "<br>";
        //     //     break;
        //     // }
        // }
    }

    public function test(){
        $json = file_get_contents("tours.txt");
        
        $obj = json_decode($json);

        $data = new TourList();

        $data->addList($obj);

        $data->sort("MP");

        foreach ($data->obj as $key => $date) {
            $ht = array_shift($date["HT"]);
            echo $ht["NM"];
            die();
            // echo $date["DT"]." на ".(intval($date["NT"])+1)." дней/".$date["NT"]." ночей <b>".$date["MP"]."</b> руб (".$date["DP"]." руб в день)<br>";

            // if( $key == 10 ){
            //     echo "<br>";
            //     continue;
            // }
        }

        // $data->sort("DP");

        // foreach ($data->obj as $key => $date) {
        //     echo $date["DT"]." на ".(intval($date["NT"])+1)." дней/".$date["NT"]." ночей <b>".$date["MP"]."</b> руб (".$date["DP"]." руб в день)<br>";

        //     if( $key == 10 ){
        //         echo "<br>";
        //         continue;
        //     }
        // }

        // print_r($data->obj);
    }

    public function self(){
        return new Parser();
    }
}

?>