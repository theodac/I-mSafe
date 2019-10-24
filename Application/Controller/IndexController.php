<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 17/09/2019
 * Time: 13:58
 */

class IndexController extends Framework
{
    public function index(){
        $file= PUB_PATH."/pharmacies.json";
        $csv= file_get_contents($file);
        $csv = json_decode($csv);
        // Changer en GPS recupéré de l'utilisateur
        $mylat = 49.441530;
        $myLong= 1.093110;
        $teste = [];
        foreach ($csv as $json){

           $distance =  $this->get_distance_m($mylat,$myLong,$json->fields->coordinates[1],$json->fields->coordinates[0]);

            $url = (object) [];
            if($distance < 1000){
                $url->name = $json->name;
                $url->addressOrigin = $json->address;
                $url->lat = $json->fields->coordinates[1];
                $url->lng = $json->fields->coordinates[0];
                array_push($teste,$url);
            }
        }
        if(isset($_GET['person']) && $_GET['person']){
            $client = new GuzzleHttp\Client();
            $client->get('https://platform.clickatell.com/messages/http/send?apiKey=HHlPhOXSTcSJvQxv3KeuFg==&to=33667720419&content=Un groupe de '.$_GET['person'].' personnes est en route vers votre refuge');
        }


        $this->render('choice',['pharmacy' => $teste]);
    }
    function get_distance_m($lat1, $lng1, $lat2, $lng2) {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin(
                    $dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return ($earth_radius * $d);
    }

}