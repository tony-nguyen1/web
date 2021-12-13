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
    public static function read() {

        if (isset($_GET['idProduit'])) {
            $idProduit = $_GET["idProduit"];
            $p = ModelProduit::select($idProduit);  
            $controller='produit';
            $pagetitle='Détails d\'un produit';
            if (empty($p)) {
                $view = 'error';
                require File::build_path(array("view","view.php"));
            } else {
                $view = 'detail';
                require File::build_path(array("view","view.php"));
            }
        } else {
            //TODO
        }
    }
    public static function update() {

        if (isset($_GET['idProduit'])) {

            $idProduit = $_GET["idProduit"];
        }
        else {}
        $p = ModelProduit::select($idProduit);  
        $controller='produit';
        $pagetitle="Modification d'un produit";
        if (empty($p)) {
            $view = 'error';
        } else {
            $view = 'update';
        }
        $action = "update"; 
        require File::build_path(array("view","view.php"));
    }
    public static function updated() {
        //$idProduit = $_GET['idProduit'];
        //$v = ModelProduit::select($idProduit);
        /*var_dump($_GET);
        $data = array(
            "idProduit" => $_GET["idProduit"],
            "stock" => $_GET["stock"]
        );

        ModelProduit::update($data);
        $tab_v = ModelProduit::selectAll();
        
        $controller='produit';
        $pagetitle='Produit modifié';
        $view = 'updated';
        require File::build_path(array("view","view.php"));*/
    }
}
?>
