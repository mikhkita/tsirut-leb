<?

Class TourList {
    public $obj = array();
    public $sortKey = "MIN_PRICE";

    function __construct() {
        
    }

    public function addList($obj){
        $hotels = $obj->data->decode->hotels;
        foreach ($obj->data->block as $i => $block) {
            foreach ($block->hotel as $j => $hotel) {
                foreach ($hotel->tour as $k => $tour) {
                    $this->addTour($tour->dt, $tour->nt, ceil($tour->pr/2), $hotel->id, $hotels->{$hotel->id}->name, $hotels->{$hotel->id}->link, $hotels->{$hotel->id}->stars, $tour->ml, $hotels->{$hotel->id}->pic);
                }
            }   
        }
    }

    public function addTour($date, $nights, $price, $hotelID, $hotelName, $hotelLink, $hotelStars, $meal, $picture){
        // MP - (MIN_PRICE) Минимальная цена
        // DP - (DAY_PRICE) Цена за сутки
        // DT - (DATE) Дата тура
        // NT - (NIGHTS) Количество ночей
        // HT - (HOTELS) Отели
        // NM - (NAME) Название
        // LN - (NAME) Ссылка на отель
        // ML - (MEAL) Питание
        // ST - (STARS) Количество звезд

        $key = $date."_".$nights;

        if( isset($this->obj[$key]) && is_array($this->obj[$key]) ){
            if( $price < $this->obj[$key]["MP"] ){
                $this->obj[$key]["MP"] = $price;
                $this->obj[$key]["DP"] = ceil($price/$nights);
            }
        }else{
            $this->obj[$key] = array(
                "MP" => $price,
                "DP" => ceil($price/$nights),
                "DT" => $date,
                "NT" => $nights,
                "HT" => array(),
            );
        }

        if( isset($this->obj[$key]["HT"][$hotelID]) ){
            if( $price < $this->obj[$key]["HT"][$hotelID]["MP"] ){
                $this->obj[$key]["HT"][$hotelID]["MP"] = $price;
                $this->obj[$key]["HT"][$hotelID]["DP"] = ceil($price/$nights);
                $this->obj[$key]["HT"][$hotelID]["NM"] = $hotelName;
                $this->obj[$key]["HT"][$hotelID]["LN"] = $hotelLink;
                $this->obj[$key]["HT"][$hotelID]["ST"] = $hotelStars;
                $this->obj[$key]["HT"][$hotelID]["ML"] = $meal;
            }
        }else{
            $this->obj[$key]["HT"][$hotelID] = array(
                "MP" => $price,
                "DP" => ceil($price/$nights),
                "NM" => $hotelName,
                "LN" => $hotelLink,
                "ST" => $hotelStars,
                "ML" => $meal,
                "PIC" => $picture
            );
        }
    }

    public function sort($attr = "MIN_PRICE", $obj = NULL){
        if( !function_exists("compare") ){
            function compare($attr) {
                return function ($a, $b) use ($attr) {
                    if ($a[$attr] == $b[$attr]) {
                        return 0;
                    }
                    return ($a[$attr] < $b[$attr]) ? -1 : 1;
                };
            }
        }

        if( $obj === NULL ){
            usort($this->obj, compare($attr));
        }else{
            usort($obj, compare($attr));

            return $obj;
        }
    }

    public function getFormatted($sort = "MP"){
        $this->sort($sort);

        $maxCount = 8;
        $maxHotelCount = 6;
        $k = ($sort == "MP")?2:2.2;
        $k4 = ($sort == "MP")?1.2:1.4;
        $k5 = ($sort == "MP")?1.4:1.6;
        $maxPrice = intval($this->obj[0][$sort])*$k;
        $out = array();

        foreach ($this->obj as $key => $value) {
            if( intval($value[$sort]) > intval($maxPrice) || $key >= $maxCount ){
                break;
            }

            $value["HT"] = $this->sort($sort, $value["HT"]);

            $outHotel = array();
            $outFour = array();
            $outFive = array();
            $fourTog = false;
            $fiveTog = false;
            foreach ($value["HT"] as $i => $hotel) {
                echo $hotel["ST"]."<br>";
                if( $i >= $maxHotelCount || intval($hotel[$sort]) > intval($maxPrice) ){

                    if( (count($outFour) > 1 && count($outFive)) || intval($hotel[$sort]) > intval($maxPrice*$k5) ){
                        break;
                    }

                    if( $hotel["ST"] == 4 && intval($hotel[$sort]) <= intval($maxPrice*$k4) ){
                        $outFour[$i] = $hotel;
                    }else if( $hotel["ST"] == 5 ){
                        $outFive[$i] = $hotel;
                    }
                }else{
                    $outHotel[$i] = $hotel;

                    if( $hotel["ST"] == 4 ) $fourTog = true;
                    if( $hotel["ST"] == 5 ) $fiveTog = true;
                }
            }
            echo "----<br>";
            if( count($outHotel) > 4 ){
                echo (($fourTog == true)?"1":"0")."-".(($fiveTog == true)?"1":"0")."-".count($outFour)."-".count($outFive)."<br>";
                if( !$fourTog && !$fiveTog ){
                    if( count($outFour) > 1 ){
                        echo "44<br>";
                        $outHotel[count($outHotel) - 2] = array_pop($outFour);
                        $outHotel[count($outHotel) - 1] = array_pop($outFour);
                    }else if( count($outFour) && count($outFive) ){
                        echo "41<br>";
                        $outHotel[count($outHotel) - 2] = array_pop($outFour);
                    }else if( count($outFour) ){
                        echo "42<br>";
                        $outHotel[count($outHotel) - 1] = array_pop($outFour);
                    }
                    if( count($outFive) ){
                        echo "5<br>";
                        $outHotel[count($outHotel) - 1] = array_pop($outFive);
                    }
                }else{
                    if( !$fourTog ){
                        if( count($outFour) ) {$outHotel[count($outHotel) - 1] = array_pop($outFour);echo "43<br>";}
                    }else if( !$fiveTog ){
                        if( count($outFive) ) {$outHotel[count($outHotel) - 1] = array_pop($outFive);echo "51<br>";}
                    }
                }
            }
            echo "-----------------------------------------<br>";

            $value["HT"] = $outHotel;
            array_push($out, $value);
        }

        return $out;
    }

    public function self(){
        return new TourList();
    }
}

?>