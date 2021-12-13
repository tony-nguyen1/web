<?php
$html = "";
$txtProduit = "";
foreach ($tab_c as $c) {
    $txtProduit = "";
    /*$vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $lienImmatriculation = rawurlencode($v->getImmatriculation());
    */

    $lienIdCommande = rawurlencode($c->get("idCommande"));

    $link = "<a href='index.php?action=readByIdCommande&controller=lignescommande&idCommande={$lienIdCommande}'>En savoir plus</a>";
    

    $vIdCommande = htmlspecialchars($c->get("idCommande"));
    $vDate = htmlspecialchars($c->get("date"));
    $vEmail = htmlspecialchars($c->get("email"));
    $vEtat = htmlspecialchars($c->get("etat"));


    $txtProduit = "idComande: {$vIdCommande}<br>";
    $txtProduit = $txtProduit . "date (YYYY/MM/DD): {$vDate}<br>";
    $txtProduit = $txtProduit . "mail: {$vEmail}<br>";
    $txtProduit = $txtProduit . "etat: {$vEtat}<br>";

    $html = $html . "<li><p>{$txtProduit}<br>{$link}</p></li>";
}

echo "<ol>{$html}</ol>"; 
?>
