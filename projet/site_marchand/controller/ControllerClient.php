<?php
require_once File::build_path(array("model","ModelClient.php"));; // chargement du modèle
class ControllerClient {
    protected static $object = 'client';

    public static function readAll() {
        $tab_c = ModelClient::selectAll();     //appel au modèle pour gerer la BD
        $controller='client';
        $view = 'list';
        $pagetitle='Liste des clients';
        require File::build_path(array("view","view.php"));
    }
    public static function read($email) {
        $c = ModelClient::select($email);  
        $controller='client';
        $pagetitle='Détails d\'un client';
        if (empty($c)) {
            $view = 'error';
            require File::build_path(array("view","view.php"));
        } else {
            $view = 'detail';
            require File::build_path(array("view","view.php"));
        }
    }
}
?>
