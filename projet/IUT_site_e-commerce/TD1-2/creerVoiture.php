<?php
require_once "./Voiture.php";

if (isset($_GET["immatriculation"], 
    $_GET["marque"], 
    $_GET["couleur"])) {
    $uneVoiture = new Voiture($_GET["marque"], $_GET["couleur"], $_GET["immatriculation"]);
    $uneVoiture->afficher();
    echo "Ok";
}
?>