<?php

use GuzzleHttp\Client;
class SituationController extends Framework
{
    public function create(){
        /*include_once MDL_PATH.'SituationModel.php';
        $uuid= $_SESSION['uuid'];
        $type = $_SESSION['choix'];
        $nbr_people = $_POST['nbr_personne'];
        $situation = new SituationModel();
        $situation->create($uuid,$type,$nbr_people);*/

            $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8888/apisafe/api/situation/create.php');


        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            var_dump($e);
        }




    }

}