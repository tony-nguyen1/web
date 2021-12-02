
<?php
$html = "";
$txtProduit = "";
foreach ($tab_p as $p) {
    $txtProduit = "";
    /*$vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $lienImmatriculation = rawurlencode($v->getImmatriculation());
    */

    $lienIdProduit = rawurlencode($p->get("idProduit"));

    $link = "<a href='index.php?action=read&controller={$controller}&idProduit={$lienIdProduit}'>En savoir plus</a>";
    

    $vIdProduit = htmlspecialchars($p->get("idProduit"));
    $vNom = htmlspecialchars($p->get("nom"));
    $vMarque = htmlspecialchars($p->get("marque"));
    $vCategorie = htmlspecialchars($p->get("categorie"));
    $vDescriptif = htmlspecialchars($p->get("descriptif"));
    $vPhoto = htmlspecialchars($p->get("photo"));
    $vPrix = htmlspecialchars($p->get("prix"));
    $vStock = htmlspecialchars($p->get("stock"));


    $txtProduit = "nom: {$vNom}<br>";
    $txtProduit = $txtProduit . "marque: {$vMarque}<br>";
    $txtProduit = $txtProduit . "catégorie: {$vCategorie}<br>";
    $txtProduit = $txtProduit . "prix: {$vPrix}<br>";

    $html = $html . "<li><p>{$txtProduit}<br>{$link}</p></li>";  
}

echo "<ol>{$html}</ol>"; 
?>
