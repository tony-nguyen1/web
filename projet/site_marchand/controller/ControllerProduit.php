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
    public static function readFiltre() {
        $marque = $_GET["marque"];
        $categorie = $_GET["categorie"];
        $prix = $_GET["prix"];
        $order = $_GET["order"];
        $nom = $_GET["nom"];

        $data = array(
            "marque" => $marque,
            "categorie" => $categorie
        );

        //switch case prix
        if ($prix == "") { $prix = NULL; }
        if ($order == "") { $order = NULL; }
        if ($nom == "") { $nom = NULL; }

        $tab_temp = ModelProduit::selectFiltre($data, $prix, $order);
        

        $tab_p = array();
        //recherche  du nom
        if (!is_null($nom)) {
            foreach ($tab_temp as $p) {
                //var_dump($p);
                //echo $p->get("nom");
                if (strpos($p->get("nom"), $nom) == int) {
                    array_push($tab_p, $p);
                } else { /*rien*/ }
            }
        }

        

        $controller='produit';
        $view = 'list';
        $pagetitle='Liste des produits';
        require File::build_path(array("view","view.php"));
    } 
}
?>
