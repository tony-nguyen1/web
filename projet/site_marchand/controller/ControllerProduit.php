<?php
require_once File::build_path(array("model","ModelProduit.php"));; // chargement du modèle
class ControllerProduit {
    protected static $object = 'produit';

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();     //appel au modèle pour gerer la BD
        $controller='produit';
        $view = 'list';
        $pagetitle='Liste des produits';
        require File::build_path(array("view","view.php"));
    }
    public static function read($immat) {
        $p = ModelProduit::select($immat);  
        $controller='produit';
        $pagetitle='Détails d\'un produit';
        if (empty($p)) {
            $view = 'error';
            require File::build_path(array("view","view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view","view.php"));
        }
    }
}
?>
