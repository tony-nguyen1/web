<?php
require_once './Model.php';
require_once './Trajet.php';

foreach(Trajet::getAllTrajets() as $unTrajet) {
    $unTrajet->afficher();
}

?>