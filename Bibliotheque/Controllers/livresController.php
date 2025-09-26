<?php

class LivresController{
    private $connecteur;
    private $connexion;

    public function __construct(){
        require_once __DIR__ ."/../Core/connecteur.php";
        require_once __DIR__ ."/../Models/livres.php";

        $this->connecteur = new Connecteur();
        $this->connexion=$this->connecteur->connexion();
    }

    public function run($action){
        switch ($action){
            case "index" :
                $this->index();
                break;
            case "detail" :
                $this->detail();
                break;
            case "creer" :
                $this->creer();
                break;
            case "maj" :
                $this->maj();
                break;
            case "supprimer" :
                $this->supprimer();
                break;
            default :
                $this->index();
                break;
        }
    }

    function index(){
        $Livre = new Livres($this->connexion);
        $listeLivres = $Livre->getAll();
        $this->view("index", array("livre"=>$listeLivres,"titre" => "PHP MVC EXEMPLE"));
    }

    function detail(){
        $Livre = new Livres($this->connexion);
        $unLivre = $Livre->getById($_GET["id"]);
        $this->view("detail", array("livre"=>$unLivre,"titre" => "DETAIL ARTICLE"));
    }

    function creer(){
        $Livre = new Livres($this->connexion);
        $Livre->setNom_livre($_POST["nom_livre"]);
        $Livre->setNombre_pages($_POST["nombre_pages"]);
        $Livre->setNom_auteur($_POST["nom_auteur"]);
        if($Livre->insert()){
            header('Location: index.php');
        }
    }

    function maj(){
        $Livre = new Livres($this->connexion);
        $Livre->setId_livre($_POST["id"]);
        $Livre->setNom_livre($_POST["nom"]);
        $Livre->setNombre_pages($_POST["pages"]);
        $Livre->setNom_auteur($_POST["auteur"]);
        if($Livre->update()){
            header('Location: index.php');
        }
    }

    function supprimer(){
        $Livre = new Livres($this->connexion);
        $Livre->setId_livre($_POST["id"]);
        if($Livre->delete()){
            header('Location: index.php');
        }
    }


    function view($name, $data){
        require_once __DIR__."/../Views/".$name."View.php";
    }
}

?>