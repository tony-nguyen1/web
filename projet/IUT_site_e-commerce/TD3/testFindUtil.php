<?php
require_once './Model.php';
require_once './Trajet.php';

$tab = Trajet::findPassagers($_GET["trajet_id"]);

foreach($tab as $key => $value) {
    $value->afficher();echo "<br>";
}

?>