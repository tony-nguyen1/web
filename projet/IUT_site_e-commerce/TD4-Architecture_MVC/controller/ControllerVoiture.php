<?php
/**
 * TODO
 * TD4 - Exercice 9 - 3. Et si le temps le permet
 */
require_once File::build_path(array("model","ModelVoiture.php"));; // chargement du modèle
class ControllerVoiture {
    protected static $object = 'voiture';

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();     //appel au modèle pour gerer la BD
        //require File::build_path(array("view","voiture","list.php"));  //"redirige" vers la vue
        $controller='voiture';
        $view = 'list';
        $pagetitle='Liste des voitures';
        require File::build_path(array("view","view.php"));
    }
    public static function read($immat) {
        $v = ModelVoiture::select($immat);  
        $controller='voiture';
        $pagetitle='Détails d\'une voiture';
        if (empty($v)) {
            $view = 'error';
            require File::build_path(array("view","view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view","view.php"));
        }
    }
    public static function create() {
        //$v = ModelVoiture::getVoitureByImmat($immat);  
        /*if (empty($v)) {
            require ('../view/voiture/error.php');
        } else {
            require ('../view/voiture/detail.php');  //"redirige" vers la vue
        }*/
        $controller='voiture';
        $pagetitle='Création d\'une voiture';
        $view = 'update';
        $action = "create";
        require File::build_path(array("view","view.php"));
    }
    public static function created() {
        $array = array(
            "immatriculation" => $_GET["immatriculation"],
            "marque" => $_GET["marque"],
            "couleur" => $_GET["couleur"]
        );

        ModelVoiture::save($array);

        $tab_v = ModelVoiture::selectAll();
        $controller='voiture';
        $pagetitle='Voiture crée';
        $view = 'created';
        require File::build_path(array("view","view.php"));
    }
    public static function error() {
        $controller='voiture';
        $pagetitle='Erreur';
        $view = 'error';
        require File::build_path(array("view","view.php"));
    }
    public static function update($immat) {
        $v = ModelVoiture::select($immat);  
        $controller='voiture';
        $pagetitle='Modification d\'une voiture';
        if (empty($v)) {
            $view = 'error';
        } else {
            $view = 'update';
        }
        $action = "update";
        require File::build_path(array("view","view.php"));
    }
    public static function updated($immat) {
        $v = ModelVoiture::select($immat);
        $data = array(
            "immatriculation" => $_GET["immatriculation"],
            "marque" => $_GET["marque"],
            "couleur" => $_GET["couleur"]
        );

        ModelVoiture::update($data);
        $tab_v = ModelVoiture::selectAll();
        
        $controller='voiture';
        $pagetitle='Voiture modifié';
        $view = 'updated';
        require File::build_path(array("view","view.php"));
    }
    public static function delete($immat) {
        $v = ModelVoiture::delete($immat);  
        $controller='voiture';
        $pagetitle='Supression d\'une voiture';
        $view = 'deleted';

        $tab_v = ModelVoiture::selectAll();

        require File::build_path(array("view","view.php"));
    }
}
?>
