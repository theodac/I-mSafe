<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 22/10/2019
 * Time: 10:10
 */

class EvacuateController extends Framework
{
    public function inscription(){

        include_once MDL_PATH.'User/Users.php';
        $user = new Users();
        $user->test();

        $this->render('inscription',[]);
    }

    //renvoi la vue pour compter evacuation
    public function number(){
        $_SESSION['type'] = 'Evacuation';
        if(!isset($_SESSION['uuid'])){
        $client = new GuzzleHttp\Client();
        $client = $client->post('http://localhost:3000/api/users/add',[

        ]);
        $json = $client->getBody()->getContents();
        $json = json_decode($json);
        $_SESSION['uuid'] = $json->data;
        }
        $this->render('nombre', []);

    }

    //renvoi la vue pour abri evacuation
    public function abri(){
        if(!isset($_SESSION['situation_id'])){
        $client = new GuzzleHttp\Client();
        $client = $client->post('http://localhost:3000/api/situation/add',[
            'Content-Type' => 'application/x-www-form-urlencoded',
            "form_params" => [
                "uuid" => $_SESSION['uuid'],
                "type" => 'Evacuation',
                "nbrPeople" => $_POST['number']
            ]
        ]);
        $json = $client->getBody()->getContents();

        $json = json_decode($json);
        $_SESSION['situation_id'] = $json->data;
        }
        $_SESSION['number'] = $_POST['number'];


        $this->render('abri', []);
    }


    public function abriOui(){
        $this->render('AbriOui', []);
    }

    public function abriNon(){
        $file= PUB_PATH."/reception_structures_list.json";
        $csv= file_get_contents($file);
        $csv = json_decode($csv);
        // Changer en GPS recupéré de l'utilisateur
        $mylat = 49.441530;
        $myLong= 1.093110;
        $teste = [];
        foreach ($csv as $json){

            $distance =  $this->get_distance_m($mylat,$myLong,$json->coordinates->lat,$json->coordinates->lng);

            $url = (object) [];
            if($distance < 1000){
                $url->name = $json->name;
                $url->addressOrigin = $json->zip_code;
                $url->phone = $json->phone;
                $url->owner = $json->owner;
                $url->lat = $json->coordinates->lat;
                $url->lng = $json->coordinates->lng;
                array_push($teste,$url);
            }
        }
        if(isset($_GET['person']) && $_GET['person']){

            $file = PUB_PATH."/reception_structures.json";

            $json = json_decode(file_get_contents($file),true);

            if(isset($_GET['id'])){

            $json['receptionStructures'][$_GET['id']]['capacity'] = $json['receptionStructures'][$_GET['id']]['capacity'] - $_GET['person']  ;

            $fp = fopen($file, 'w');
            fwrite($fp, json_encode($json));
            fclose($fp);
            }

            $client = new GuzzleHttp\Client();
            $client->get('https://platform.clickatell.com/messages/http/send?apiKey=HHlPhOXSTcSJvQxv3KeuFg==&to=33'.$_GET['phone'].'&content=Un groupe de '.$_GET['person'].' personnes est en route vers votre refuge');
        }
        $this->render('AbriNon', ["rassembly" => $teste]);
    }

    public function validation(){
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

        $this->render('Validation', []);
    }

    public function map(){
        var_dump($_SESSION['number']);

        $this->render('map', ["nbr"=> $_SESSION['number']]);
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
