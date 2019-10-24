<?php


class UsersController extends Framework
{
    public function test(){
        $data = file_get_contents(API_URL.'imsafeapi/api/testUser');
        echo $data;

    }

    public function choice(){
        if(isset($_POST['evacuation'])){
            $_SESSION['choix'] = 'Evacuation';
            $_SESSION['uuid'] = file_get_contents(API_URL.'imsafeapi/api/createUser');
            header('Location:'. API_URL.'I-mSafe/Users/redirectChoice ');
        } elseif (isset($_POST['confinement'])){
            $_SESSION['choix'] = 'Confinement';
            $_SESSION['uuid'] = file_get_contents(API_URL.'imsafeapi/api/createUser');
            header('Location:'. API_URL.'I-mSafe/Users/redirectChoice ');
        }

       $this->render('choice');
    }

    public function redirectChoice(){
        if(isset($_GET['send'])){
            $_SESSION['nbr_personne']=$_POST['nbr_personne'];
            header('Location:'. API_URL.'I-mSafe/situation/create ');
        }
        $this->render('groupe');
    }

}