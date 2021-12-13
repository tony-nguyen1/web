
<?php
$html = "";
$txtProduit = "";

foreach ($tab_lp as $lp) {
    $uneLigneCommande = $lp[0];
    $unProduit = $lp[1];


    $lienIdProduit = rawurlencode($uneLigneCommande->get("idProduit"));

    $idLigneCommande = htmlspecialchars($uneLigneCommande->get("idLignecommande"));
    $idCommande = htmlspecialchars($uneLigneCommande->get("idCommande"));
    $idProduit = htmlspecialchars($uneLigneCommande->get("idProduit"));
    $quantite = htmlspecialchars($uneLigneCommande->get("quantite"));
    $montant = htmlspecialchars($uneLigneCommande->get("montant"));
    
    $link = "<a href='index.php?action=read&controller=produit&idProduit={$lienIdProduit}'>{$unProduit->get("nom")}</a>";
    
    $txtProduit = "N° ligne de la commande: {$idLigneCommande}<br>";
    $txtProduit = $txtProduit . "N° de la commande: {$idCommande}<br>";
    $txtProduit = $txtProduit . "Produit: {$link}<br>";
    $txtProduit = $txtProduit . "Qte: {$quantite}<br>";
    $txtProduit = $txtProduit . "Montant: {$montant}€<br>";


    $html = $html . "<li><p>{$txtProduit}</p></li>";
}

echo "<ol>{$html}</ol>"; 

?>
