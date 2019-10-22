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


        $this->render('inscription',[]);
    }

    public function safe(){

        $this->render('safe',[]);
    }

    public function secured(){

        $this->render('secured',[]);
    }

    public function unsecured(){

        $this->render('unsecured',[]);
    }
    public function success(){

        $this->render('success',[]);

    }

}