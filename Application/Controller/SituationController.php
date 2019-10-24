<?php

use GuzzleHttp\Client;
class SituationController extends Framework
{
    public function create(){

            $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:3000/api/users/addOtherUser',[
                'form_params'=> [
                    'uuid'=>'2646d38b-b0c1-2dc4-6368-f04be1ed4e9e',
                    'lastname'=>'TestPost',
                    'firstname'=>'TestPost'
                ]
            ]);
            var_dump($response->getBody()->getContents());


        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            var_dump($e);
        }




    }

}