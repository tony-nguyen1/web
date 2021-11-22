<?php
require_once './Model.php';
require_once './Voiture.php';

$rep = Model::getPDO()->query("SELECT * FROM voiture");

foreach(Voiture::getAllVoitures() as $uneVoiture) {
    $uneVoiture->afficher();
}

echo "Voiture::getVoitureByImmat";
Voiture::getVoitureByImmat("AA174AA")->afficher();

$array = array(
    "marque" => "BMW",
    "couleur" => "blanc",
    "immatriculation" => "CC746CC",
);

/*$voit = new Voiture($array);
$voit->afficher();
$voit->save();*/

?>