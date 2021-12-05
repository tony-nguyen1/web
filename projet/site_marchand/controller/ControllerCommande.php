<?php
require_once File::build_path(array("model","ModelCommande.php"));; // chargement du modèle
require_once File::build_path(array("lib","Security.php"));
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
        var_dump($tab_c);        
    }
}
?>
