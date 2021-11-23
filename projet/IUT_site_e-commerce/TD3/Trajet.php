<?php

require_once 'Model.php';
require_once 'Utilisateur.php';

class Trajet {

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($data = array()) {
        if (!empty($data)) {
            $this->id = $data["id"];
            $this->depart = $data["depart"];
            $this->arrivee = $data["arrivee"];
            $this->date = $data["date"];
            $this->nbplaces = $data["nbplaces"];
            $this->prix = $data["prix"];
            $this->conducteur_login = $data["conducteur_login"];
        }
    }
    // une methode d'affichage.
    public function afficher() {
        echo "Ce trajet du {$this->date} partira de {$this->depart} pour aller à {$this->arrivee}.";
    }

    public static function getAllTrajets() {
        try {
            $pdo = Model::$pdo;
            $sql = "SELECT * from trajet";
            $rep = $pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function findPassagers($id) {
        try {
            $sql = "SELECT * from trajet INNER JOIN passager ON id = trajet_id INNER JOIN utilisateur ON utilisateur_login = login WHERE id = :idTrajet";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "idTrajet" => $id,
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);


            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $tab_utilisateur = $req_prep->fetchAll();

            if (empty($tab_utilisateur)) { return false; }
            return $tab_utilisateur;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}
