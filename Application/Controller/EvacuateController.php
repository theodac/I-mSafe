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
        $this->render('nombre', []);

    }

    //renvoi la vue pour abri evacuation
    public function abri(){
        $this->render('abri', []);
    }

    public function abriOui(){
        $this->render('AbriOui', []);
    }

    public function abriNon(){
        $this->render('AbriNon', []);
    }

    public function validation(){
        $this->render('Validation', []);
    }

    public function map(){
        $this->render('map', []);
    }

}
