<?php
$vIdProduit = "";
$vNom = "";
$vMarque = "";
$vCategorie = "";
$vDescriptif = "";
$vPhoto = "";
$vPrix = "";
$vStock = "";

if (strcmp($action, "update") == 0) {
    $vIdProduit = htmlspecialchars($p->get("idProduit"));
    $vNom = htmlspecialchars($p->get("nom"));
    $vMarque = htmlspecialchars($p->get("marque"));
    $vCategorie = htmlspecialchars($p->get("categorie"));
    $vDescriptif = htmlspecialchars($p->get("descriptif"));
    $vPhoto = htmlspecialchars($p->get("photo"));
    $vPrix = htmlspecialchars($p->get("prix"));
    $vStock = htmlspecialchars($p->get("stock"));
} else if (strcmp($action, "create")==0) {
    $lecture = "required";
    $futureAction = "created";
} else {
  //TODO
}


$html = "
<form method=\"get\" action=\"index.php\">
    <fieldset>
        <input type=\"hidden\" value=\"{$futureAction}\" name=\"action\"/>
        <input type=\"hidden\" value=\"{$controller}\" name=\"controller\"/>

        <label for=\"produitID\"> idProduit</label>
        <input type=\"number\" name=\"idProduit\" id='produitID' value=\"{$vIdProduit}\"> <br> <br>

        <label for=\"nomID\">Nom</label>
        <input type=\"text\" name=\"nom\" id='nomID' value='{$vNom}'> <br> <br>

        <label for=\"marqueID\">Marque</label>
        <input type=\"text\" name=\"marque\" id='marqueID' value='{$vMarque}'><br> <br>

        <label for=\"categorieID\">Catégorie</label>
        <input type=\"text\" name=\"categorie\" id='categorieID' value=\"{$vCategorie}\"><br> <br>

        <label for=\"descriptifID\">Descriptif</label>
        <input type=\"text\" name=\"descriptif\" id='descriptifID' size='512' value='{$vDescriptif}'> <br><br>

        <label for=\"photoID\">Photo</label>
        <input type=\"text\" name=\"photo\" id='photoID' value='{$vPhoto}'> <br>

        <label for=\"prixID\">Prix</label>
        <input type=\"text\" name=\"prix\" id='prixID' value='{$vPrix}'> <br>

        <label for=\"stockID\">Stock</label>
        <input type=\"text\" name=\"stock\" id='stockID' value='{$vStock}'> <br>


        <input type=\"submit\" value='Valider'>
    </fieldset> 
</form>";

echo $html;
?>
  