<?php
$txtClient = "";

$lienEmail = rawurlencode($c->get("email"));
$link = "<a href='index.php?action=read&controller={$controller}&idProduit={$lienEmail}'>Détails</a>";    


$vEmail = htmlspecialchars($c->get("email"));
$vMotDePasse = htmlspecialchars($c->get("motDePasse"));
$vNom = htmlspecialchars($c->get("nom"));
$vPrenom = htmlspecialchars($c->get("prenom"));
$vVille = htmlspecialchars($c->get("ville"));
$vAdresse = htmlspecialchars($c->get("adresse"));
$vTelephone = htmlspecialchars($c->get("telephone"));


$txtClient = "email: {$vEmail} <br>";
$txtClient = $txtClient . "MDP: {$vMotDePasse} <br>";
$txtClient = $txtClient . "nom: {$vNom} <br>";
$txtClient = $txtClient . "prenom: {$vPrenom} <br>";
$txtClient = $txtClient . "ville: {$vVille} <br>";
$txtClient = $txtClient . "adresse: {$vAdresse} <br>";
$txtClient = $txtClient . "telephone: {$vTelephone} <br>";


$txtClient = "<p>{$txtClient}</p>";
echo "<p>{$txtClient}</p>";
?>