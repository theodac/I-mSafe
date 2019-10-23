<?php


class SituationController extends Framework
{
    public function create(){
        include_once MDL_PATH.'SituationModel.php';
        $uuid= $_SESSION['uuid'];
        $type = $_SESSION['choix'];
        $nbr_people = $_POST['nbr_personne'];
        $situation = new SituationModel();
        $situation->create($uuid,$type,$nbr_people);

    }

}