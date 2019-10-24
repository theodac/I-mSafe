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

        $this->render('nombreConf',[]);

    }


    public function abriConf(){

        $this->render('abriConf',[]);

    }

    public function abriConfNon(){

        $this->render('abriConfNon',[]);

    }

    public function abriConfOui(){

        $this->render('nombreConfOui',[]);

    }

    public function ValidConf(){

        $this->render('ValidConf',[]);

    }
}
