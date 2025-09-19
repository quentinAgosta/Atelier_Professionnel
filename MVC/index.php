<?php

require_once 'Config/global.php';

//Gestion du controller par defaut
if(isset($_GET["controller"])){
    $controllerObj = loadController($_GET["controller"]);
    loadAction($controllerObj);
}else{
    $controllerobj = loadController(CONTROLLER_DEFAULT);
}

function loadController($controller){
    switch($controller){
        case 'articles' :
            $strFileController = 'Controllers/articlesController.php';
            require_once $strFileController;
            $controllerobj = new ArticlesController();
        break;
        
        default :
            $strFileController = 'Controllers/articlesController.php';
            require_once $strFileController;
            $controllerobj = new ArticlesController();
        break;
    }
    return $controllerobj;
}

function loadAction($controllerobj){
    if(isset($_GET["action"])){
        $controllerobj->run($_GET["action"]);
    }else{
        $controllerobj->run(ACTION_DEFAULT);
    }
}

?>