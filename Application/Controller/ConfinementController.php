<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 22/10/2019
 * Time: 10:23
 */

class ConfinementController extends Framework
{



    public function numberConf(){
        $_SESSION['type'] = 'Confinement';

        if(!isset($_SESSION['uuid'])){
            $client = new GuzzleHttp\Client();
            $client = $client->post('http://localhost:3000/api/users/add',[

            ]);
            $json = $client->getBody()->getContents();
            $json = json_decode($json);
            $_SESSION['uuid'] = $json->data;
        }
        $this->render('nombreConf',[]);

    }


    public function abriConf(){
        if(!isset($_SESSION['situation_id'])){
            $client = new GuzzleHttp\Client();
            $client = $client->post('http://localhost:3000/api/situation/add',[
                'Content-Type' => 'application/x-www-form-urlencoded',
                "form_params" => [
                    "uuid" => $_SESSION['uuid'],
                    "type" => 'Confinement',
                    "nbrPeople" => $_POST['number']
                ]
            ]);
            $json = $client->getBody()->getContents();

            $json = json_decode($json);
            $_SESSION['situation_id'] = $json->data;
        }
        $_SESSION['number'] = $_POST['number'];

        $this->render('abriConf',[]);

    }

        public function abriConfNon(){
            $file = PUB_PATH."/pharmacies.json";
            $csv = file_get_contents($file);
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
                    $url->distance = round($distance);
                    $url->lat = $json->fields->coordinates[1];
                    $url->lng = $json->fields->coordinates[0];
                    array_push($teste,$url);
                }
            }


        $this->render('abriConfNon',['confinements' => $teste]);

    }

    public function abriConfOui(){

        $this->render('abriConfOui',[]);

    }

    public function ValidConf(){
        $child = $_POST['nbrChild'] ;
        $baby = $_POST['nbrbaby'] ;
        $name = $_POST['name'] ;
        $firstname = $_POST['firstname'] ;
        $address = $_POST['address'] ;
        $city = $_POST['city'] ;
        $zip = $_POST['zip'] ;

        $client = new GuzzleHttp\Client();

        $client->put('http://localhost:3000/api/users/updateUser',[
            'Content-Type' => 'application/x-www-form-urlencoded',
            "form_params" => [
                "uuid" => $_SESSION['uuid'],
                "address" => $address,
                "city" => $city,
                "zip_code" => $zip,
                "firstname" => $firstname,
                "lastname" => $name,
            ]
        ]);

        $client->put('http://localhost:3000/api/situation/updateChilds',[
            'Content-Type' => 'application/x-www-form-urlencoded',
            "form_params" => [
                "uuid" => $_SESSION['uuid'],
                "childs" => $child,
                "babies" => $baby
            ]
        ]);

        $this->render('ValidConf',[]);

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
