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
        define('PUB_PATH',dirname($_SERVER['SCRIPT_NAME']));
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
        spl_autoload_register(array(__CLASS__,'loading'));
    }
    private static function loading($class)
    {
        if (substr($class,-10) == "Controller"){
            require_once "Framework.php";
        }
        elseif (substr($class,-5) == "Model"){
            require_once "Framework.php";
        }
    }

    private static function switcher()
    {
        $getParamUrl = $_SERVER['REQUEST_URI'];
        $getParamUrlArray = explode("/", $getParamUrl);

        if (count($getParamUrlArray) == 3 && $getParamUrlArray[2] == "") {
            include VIEW_PATH . "accueil.php";
        }else{
            var_dump('pm');
            if (isset($getParamUrlArray[3])) {
                var_dump('lol');
                if ($getParamUrlArray[2] != "" && $getParamUrlArray[3] != "") {
                    var_dump('ok');
                    if (file_exists(CTRL_PATH . CONTROLLER . "Controller.php")) {
                        $controllerName = CONTROLLER . "Controller";
                        $actionName = ACTION;


                        $controller = new $controllerName;
                        if (method_exists($controller, ACTION)) {
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