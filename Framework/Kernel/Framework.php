<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 17/09/2019
 * Time: 14:03
 */
require_once './Application/Controller/IndexController.php';
require_once './Application/Controller/EvacuateController.php';

class Framework
{
    private $_viewparams;

    public static function run()
    {
        self::initialize();
        self::autoloader();
        self::switcher();

    }

    private static function initialize(){
        $getParamUrl= $_SERVER['REQUEST_URI'];
        $getParamUrlArray = explode("/",$getParamUrl);

        define('DIRSEP',DIRECTORY_SEPARATOR);
        define('ROOT', getcwd().DIRSEP);
        define('APPPATH',ROOT.'Application'.DIRSEP);
        define('FRAMEWORK_PATH',ROOT.'Framework'.DIRSEP);
        define('PUB_PATH',ROOT.'/public');
        define('CTRL_PATH', APPPATH. 'Controller'.DIRSEP);
        define('MDL_PATH', APPPATH. 'Model'.DIRSEP);
        define('VIEW_PATH', APPPATH. 'View'.DIRSEP);
        if (count($getParamUrlArray) == 5 || count($getParamUrlArray) == 4 ) {
            if ($getParamUrlArray[2] != "" && $getParamUrlArray[3] != "") {
                define('CONTROLLER', $getParamUrlArray[2]);
                define('ACTION', $getParamUrlArray[3]);

            }
        }
    }

    private static function autoloader()
    {
        var_dump(spl_autoload_register(array(__CLASS__,'load')));
    }

    private static function load($classname){
        var_dump($classname);
        var_dump(substr($classname, -5) );
        // Here simply autoload app’s controller and model classes

        if (substr($classname, -10) == "Controller"){

            // Controller

            require_once  CTRL_PATH . "$classname.php";

        } elseif (substr($classname, -5) == "Model"){

            // Model

            require_once  MDL_PATH . "$classname.php";

        }

    }

    private static function switcher()
    {
        $getParamUrl = $_SERVER['REQUEST_URI'];
        $getParamUrlArray = explode("/", $getParamUrl);

        if (count($getParamUrlArray) == 3 && $getParamUrlArray[2] == "") {
            include VIEW_PATH . "accueil.php";
        }else{
            if (isset($getParamUrlArray[3])) {
                if ($getParamUrlArray[2] != "" && $getParamUrlArray[3] != "") {
                    if (file_exists(CTRL_PATH . CONTROLLER . "Controller.php")) {
                        $controllerName = CONTROLLER . "Controller";



                        $controller = new $controllerName;
                        var_dump(ACTION);
                       $action =  explode('?',ACTION);
                        var_dump($controller);
                        $actionName = $action[0];
                        if (method_exists($controller, $action[0])) {
                            var_dump('okl');
                            $controller->$actionName();
                        } else {
                            echo 'Marcheead pas';
                        }
                    } else {
                        echo 'Marcheee pas';
                    }
                } else {
                    echo 'Marchees pas';

                }
            } else {
                echo 'Marche paas';

            }
        }
    }
    /**
     * Permet de générer l'affichage
     * de la vue passé en paramètre.
     * @param $view Vue à afficher.
     * @param array $viewparam Données à passer à la vue.
     */
    protected function render(string $view, Array $viewparams = []) {
        # Récupération et Affectation des Paramètres de la Vue
        $this->_viewparams = $viewparams;
        # Permet d'accéder au tableau directement dans des variables
        extract($this->_viewparams);
        # Chargement de la Vue
        $view = VIEW_PATH . '/' . $view . '.php';
        if( file_exists($view) ) :
            # Chargement de la Vue
            include_once $view;
        else :
            $this->render('Layout/404', [
                'message' => 'Aucune vue correspondante'
            ]);
        endif;
    }

}