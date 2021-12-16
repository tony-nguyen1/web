<?php
require_once File::build_path(array("model","ModelClient.php"));; // chargement du modèle
require_once File::build_path(array("lib","Security.php"));
require_once File::build_path(array("model","ModelProduit.php"));;
class ControllerClient {
    protected static $object = 'client';

    public static function readAll() {
        $tab_c = ModelClient::selectAll();     //appel au modèle pour gerer la BD
        $controller='client';
        $view = 'list';
        $pagetitle='Liste des clients';
        require File::build_path(array("view","view.php"));
    }
    public static function read() {
        $email = $_GET["email"];
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
    public static function create() {
        $controller='client';
        $pagetitle='Inscription';
        $view = 'update';
        $action = "create";
        require File::build_path(array("view","view.php"));
    }
    public static function created() {
        if (filter_var($_GET["identifiant"], FILTER_VALIDATE_EMAIL) == false) {
            echo "adresse email non valide mais c'est pas grave";
        } else {
            echo "adresse email validé par le serveur";
        }

        if (strcmp($_GET["mdp"], $_GET["mdp_confirm"]) == 0) {
            //mdp identique
        }  else {
            echo "mdp different mais c'est pas grave";
        }

        $array = array(
            "email" => $_GET["identifiant"],
            "motDePasse" => Security::hacher($_GET["mdp"]),
            "nom" => $_GET["nom"],
            "prenom" => $_GET["prenom"],
            "ville" => $_GET["ville"],
            "adresse" => $_GET["adresse"],
            "telephone" => $_GET["couleur"]
        );

        ModelClient::save($array);

        $tab_c = ModelClient::selectAll();
        $controller='client';
        $pagetitle='Inscription reussi';
        $view = 'created';
        require File::build_path(array("view","view.php"));
    }
    public static function connect() {
        $controller='client';
        $pagetitle='Connexion';
        $view = 'connect';
        require File::build_path(array("view","view.php"));
    }
    public static function connected() {

        $login = $_GET["identifiant"];
        $mdp = Security::hacher($_GET["mdp"]);

        if (ModelClient::checkPassword($login,$mdp)) {
            $_SESSION['login'] = $login;

            $controller='client';
            $pagetitle='Connecté';
            $view = 'detail';

            $c = ModelClient::select($login);

            require File::build_path(array("view","view.php"));
        } else {
            $controller='client';
            $pagetitle='Connexion';
            $view = 'connectEchec';
            require File::build_path(array("view","view.php"));
        }
    }
    public static function deconnect() {
        $_SESSION['login'] = "";
        session_unset();
        session_destroy(); 
        setcookie(session_name(),'',time()-1);

        echo "Déconnexion";
        static::readAll();
    }
    /*public static function update() {
        $idEmail = $_GET["identifiant"];

        $c = ModelClient::select($idEmail);

        $action = "update";
    }*/
    public function delete() {
        $mail = $_GET['email'];

        ModelClient::delete($mail);

        $controller='client';
        $pagetitle='Supression d\'un compte';
        $view = 'deleted';

        $tab_p = ModelProduit::selectAll();

        require File::build_path(array("view","view.php"));
    }
}
?>
