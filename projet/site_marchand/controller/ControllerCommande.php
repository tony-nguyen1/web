<?php
require_once File::build_path(array("model","ModelCommande.php")); // chargement du modèle
require_once File::build_path(array("lib","Security.php"));
require_once File::build_path(array("controller","ControllerPanier.php"));;
class ControllerCommande {
    protected static $object = 'commande';

    public static function readAll() {
        $tab_c = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
        $controller='commande';
        $view = 'list';
        $pagetitle='Liste des commandes';
        require File::build_path(array("view","view.php"));
    }
    public static function historique() {
        $email = $_SESSION['login'];
        $tab_c = ModelCommande::findCommandesByEmail($email);
        $controller='commande';
        $view = 'list';
        $pagetitle='Historique';
        
        require File::build_path(array("view","view.php"));    
    }
    public static function create() {
        //créer une une commande
        $date = getdate();
        $dat = "{$date['year']}-{$date['mon']}-{$date['mday']}";
        $data = array(
            "idCommande" => NULL,
            "date" => $dat,
            "email" => $_SESSION['login'],
            "etat" => "enCours"
        );
        ModelCommande::save($data);

        
        //créer une ligne commandes pour chaque produit acheté
        $idCommande = ModelCommande::getLastCommandeId();
        ControllerPanier::create($idCommande);
        //TODO pour chaque produit, décrementer des stocks la quantite achete

        //vider le panier
        ControllerPanier::clear();

        $tab_c = ModelCommande::selectAll();

        $controller='commande';
        $view = 'enregistre';
        $pagetitle='Liste des commandes';
        
        require File::build_path(array("view","view.php"));
    }
    public function acheter() {
        $id = $_GET[idCommande];
        $data = array(
            "idCommande" => $id,
            "etat" => "achetée"
        );
        ModelCommande::update($data);

        $controller='commande';
        $view = 'achete';
        $pagetitle='Commande achetée';

        $email = $_SESSION['login'];
        $tab_c = ModelCommande::findCommandesByEmail($email);

        require File::build_path(array("view","view.php"));
    }
}
?>