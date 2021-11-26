<?php 
$vImmatriculation = htmlspecialchars($v->getImmatriculation());
$html = "<p>La voiture {$vImmatriculation} a bien été modifiée.</p>";
echo $html;

require "list.php";
?>