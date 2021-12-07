<?php

$html = "" ;
foreach ($tab_panier as $uneLigne) {
    $txt ="";

    $lien = "<a href='index.php?action=read&controller=produit&idProduit={$uneLigne[3]}'>{$uneLigne[0]}</a>";

    $txt = $txt . "nom: {$lien}<br>";
    $txt = $txt . "prix unitaire: {$uneLigne[1]}";
    $txt = $txt . "Qte: {$uneLigne[2]}<br>";
    $txt = $txt . "Total: " . $uneLigne[1] * $uneLigne[2] . "<br>";


    $html = $html . "<li>{$txt}</li>";
}
$html = "<ol>{$html}</ol>";


$lienViderPanier = "<a href='index.php?action=clear'>Vider panier</a>";
echo $html . $lienViderPanier;
?>