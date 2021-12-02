
<?php
$html = "";
$txtProduit = "";

//$lienIdProduit = rawurlencode($p->get("idProduit"));

$link = "<a href='index.php?action=read&controller={$controller}&idProduit={$lienIdProduit}'>En savoir plus</a>";
    

$vIdProduit = htmlspecialchars($p->get("idProduit"));
$vNom = htmlspecialchars($p->get("nom"));
$vMarque = htmlspecialchars($p->get("marque"));
$vCategorie = htmlspecialchars($p->get("categorie"));
$vDescriptif = htmlspecialchars($p->get("descriptif"));
$vPhoto = htmlspecialchars($p->get("photo"));
$vPrix = htmlspecialchars($p->get("prix"));
$vStock = htmlspecialchars($p->get("stock"));


$txtProduit = "idProduit: {$vIdProduit}<br>";
$txtProduit = $txtProduit . "nom: {$vNom}<br>";
$txtProduit = $txtProduit . "marque: {$vMarque}<br>";
$txtProduit = $txtProduit . "catégorie: {$vCategorie}<br>";
$txtProduit = $txtProduit . "descriptif: {$vDescriptif}<br>";
$txtProduit = $txtProduit . "photo: TBD<br>";
$txtProduit = $txtProduit . "prix: {$vPrix}€<br>";
$txtProduit = $txtProduit . "stock: {$vStock}<br>";


$html = "<p>{$txtProduit}</p>";


echo $html;
?>
