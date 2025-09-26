<?php

require_once 'Config/global.php';

//Gestion du controller par defaut
if(isset($_GET["controller"])){
    $controllerObj = loadController($_GET["controller"]);
    loadAction($controllerObj);
}else{
    $controllerObj = loadController(CONTROLLER_DEFAULT);
    loadAction($controllerObj);
}

function loadController($controller){
    switch($controller){
        case 'livre' :
            $strFileController = 'Controllers/livresController.php';
            require_once $strFileController;
            $controllerObj = new LivresController();
        break;
        
        default :
            $strFileController = 'Controllers/livresController.php';
            require_once $strFileController;
            $controllerObj = new LivresController();
        break;
    }
    return $controllerObj;
}

function loadAction($controllerObj){
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    }else{
        $controllerObj->run(ACTION_DEFAULT);
    }
}

?>