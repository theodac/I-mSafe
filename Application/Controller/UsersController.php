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
        $this->render('groupe');
    }

}