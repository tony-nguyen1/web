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
        $view = 'create';
        require File::build_path(array("view","view.php"));
    }
    public static function created() {

        $array = array(
            "immatriculation" => $_GET["immatriculation"],
            "marque" => $_GET["marque"],
            "couleur" => $_GET["couleur"]
        );
        $v = new ModelVoiture($array);
        $v->save();

        ControllerVoiture::readAll();
    }
    public static function error() {
        $controller='voiture';
        $pagetitle='Erreur';
        $view = 'error';
        require File::build_path(array("view","view.php"));
    }
}
?>
