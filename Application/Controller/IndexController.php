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
            $url = "https://route.api.here.com/routing/7.2/calculateroute.json?waypoint0=$mylat%2C$myLong&waypoint1=".$json->fields->coordinates[1]."%2C".$json->fields->coordinates[0]."&mode=fastest%3Bpedestrian&app_id=tImiZCCScS7B2KxD6mBE&app_code=-vR7CIddMnECkiw_Z56jeg";
            $url = file_get_contents($url);

            $url = json_decode($url);
            if($url->response->route[0]->summary->distance < 1000){
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


}