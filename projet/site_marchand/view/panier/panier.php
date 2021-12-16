<?php
$html = "" ;
if (count($tab_panier)==0) {
    $html = "<p>Panier vide</p>";
} else {
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
    
    $lien = "";
    $lienViderPanier = "<p><a href='index.php?action=clear2&controller=panier'>Vider panier</a></p>";
    $lienEnregistre = "<p><a href='index.php?action=create&controller=commande'>Enregistrer le panier</a></p>";
    $lien = $lien . $lienViderPanier;

    if (isset($_SESSION['login'])) { $lien = $lien . $lienEnregistre; }

    $html = $html . $lien;
}


echo $html;
?>