<?php
require_once './Model.php';
require_once "./Voiture.php";

if (isset($_GET["immatriculation"], 
    $_GET["marque"], 
    $_GET["couleur"])) {
        echo "<p>tout les attributs sont set</p>";

        $array = array(
            "marque" => $_GET["marque"],
            "couleur" => $_GET["couleur"],
            "immatriculation" => $_GET["immatriculation"],
        );
        print_r($array);
        $uneVoiture = new Voiture($array);
        $uneVoiture->afficher();
        $uneVoiture->save();
        echo "Ok";
}
?>