<?php
$html = "";
$txtProduit = "";
foreach ($tab_c as $c) {
    $txtProduit = "";

    $vIdCommande = htmlspecialchars($c->get("idCommande"));
    $vDate = htmlspecialchars($c->get("date"));
    $vEmail = htmlspecialchars($c->get("email"));
    $vEtat = htmlspecialchars($c->get("etat"));

    
    $txtProduit = "idComande: {$vIdCommande}<br>";
    $txtProduit = $txtProduit . "date (YYYY/MM/DD): {$vDate}<br>";
    $txtProduit = $txtProduit . "mail: {$vEmail}<br>";
    $txtProduit = $txtProduit . "etat: {$vEtat}<br>";
    
    $lienIdCommande = rawurlencode($c->get("idCommande"));
    $link = "<a href='index.php?action=readByIdCommande&controller=lignescommande&idCommande={$lienIdCommande}'>En savoir plus</a>";
    
    if (strcmp($c->get("etat"), "achetée") != 0) {$link = $link . "<br><a href='index.php?action=acheter&controller=commande&idCommande={$lienIdCommande}'>Acheter cette commande</a>"; }

    $html = $html . "<li><p>{$txtProduit}<br>{$link}</p></li>";
}

echo "<ol>{$html}</ol>"; 
?>
