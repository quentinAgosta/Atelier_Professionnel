<?php

class Livres{
    private $table="livres";
    private $connexion;

    private $id_livre;
    private $nom_livre;
    private $nombre_pages;
    private $nom_auteur;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function getId_livre(){
        return $this->id_livre;
    }

    public function getNom_livre(){
        return $this->nom_livre;
    }

    public function getNombre_pages(){
        return $this->nombre_pages;
    }

    public function getNom_auteur(){
        return $this->nom_auteur;
    }

    public function setId_livre($id){
        $this->id_livre = $id;
    }

    public function setNom_livre($nom){
        $this->nom_livre = $nom;
    }

    public function setNombre_pages($pages){
        $this->nombre_pages = $pages;
    }

    public function setNom_auteur($auteur){
        $this->nom_auteur = $auteur;
    }

    public function getAll(){
        $query = $this->connexion->prepare("SELECT id_livre, nom_livre, nombre_pages, nom_auteur FROM "
        .$this->table);
        $query->execute();
        $result = $query->fetchAll();
        $this->connexion = null;
        return $result;
    }

    public function getById($id){
        $query = $this->connexion->prepare("SELECT id_livre, nom_livre, nombre_pages, nom_auteur FROM "
        .$this->table." WHERE id_livre =:id");
        $query->execute(array("id"=>$id));
        $result = $query->fetchObject();
        $this->connexion = null;
        return $result;
    }

    public function insert(){
        $query = $this->connexion->prepare("INSERT INTO ".$this->table." (nom_livre, nombre_pages, nom_auteur) 
        VALUES (:nom, :pages, :auteur)");

        $result = $query->execute(array(
            "nom" => $this->nom_livre,
            "pages" => $this->nombre_pages,
            "auteur" => $this->nom_auteur
        ));
        $this->connexion = null;
        return $result;
    }

    public function update(){
        $query = $this->connexion->prepare("UPDATE ".$this->table." SET nom_livre= :nom, nombre_pages= :pages, 
        nom_auteur =:auteur WHERE il_livre =: id");

        $result = $query->execute(array(
            "id" => $this->id_livre,
            "nom" => $this->nom_livre,
            "pages" => $this->nombre_pages,
            "auteur" => $this->nom_auteur
        ));
        $this->connexion = null;
        return $result;
    }

    public function delete(){
        $query = $this->connexion->prepare("DELETE FROM ".$this->table." WHERE ".$this->table.".id_livre =:id");

        $result = $query->execute(array(
            "id" => $this->id_livre
        ));
        $this->connexion = null;
        return $result;
    }
}

?>