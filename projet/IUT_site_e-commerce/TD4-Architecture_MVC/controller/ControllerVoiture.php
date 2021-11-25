<?php
/**
 * TODO
 * TD4 - Exercice 9 - 3. Et si le temps le permet
 */
require_once File::build_path(array("model","ModelVoiture.php"));; // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","voiture","list.php"));  //"redirige" vers la vue
    }
    public static function read($immat) {
        $v = ModelVoiture::getVoitureByImmat($immat);  
        if (empty($v)) {
            require File::build_path(array("view","voiture","error.php"));
        } else {
            require File::build_path(array("view","voiture","detail.php"));  //"redirige" vers la vue
        }
    }
    public static function create() {
        //$v = ModelVoiture::getVoitureByImmat($immat);  
        /*if (empty($v)) {
            require ('../view/voiture/error.php');
        } else {
            require ('../view/voiture/detail.php');  //"redirige" vers la vue
        }*/
        require File::build_path(array("view","voiture","create.php"));
    }
    public static function created() {

        $array = array(
            "immatriculation" => $_GET["immatriculation"],
            "marque" => $_GET["marque"],
            "couleur" => $_GET["couleur"]
        );
        $v = new ModelVoiture($array);
        //print_r($array);
        //var_dump($v);
        $v->save();

        ControllerVoiture::readAll();
    }
}
?>
