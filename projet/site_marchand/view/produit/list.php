<?php
$form = "<br><div>
<form method='get'>
<input type=\"hidden\" value='readFiltre' name=\"action\"/>
        <input type=\"hidden\" value=\"produit\" name=\"controller\"/>
    <fieldset>
    <legend>Filtre/Recherche/Trie</legend>
    <div>
    <p>
    <label>Catégorie</label><br>
    <select multiple name='categorie[]'>
        <option value='Isekai'>Isekai</option>
        <option value='Slice of life'>Slice of life</option>
        <option value='Yaoi'>Yaoi</option>
    </select>
    </p>
    </div>

    <div><p>
        <label>Marque (Éditeur)</label><br>
        <select multiple name='marque[]'>
            <option value='Shūeisha'>Shūeisha</option>
            <option value='Kadokawa'>Kadokawa</option>
            <option value='Square Enix'>Square Enix</option>
        </select></p>
    </div>

    <div><p>
        <label>Prix</label>
        <div>
            <input type='radio' id='optionPrixA' name='prix' value='11' checked>
            <label for='optionPrixA'>Entre 5€ et 15€</label>
        </div>
        <div>
            <input type='radio' id='optionPrixB' name='prix' value='22'>
            <label for='optionPrixB'>Plus de 15€</label>
        </div>
        </p>
    </div>


    <div><p>
    <label>Trie</label>
    <select name='order' > 
        <option value=''>--Ordre d'affichage--</option>
        <option value='A'>Alphabétique croissant</option>
        <option value='B'>Alphabétique décroissant</option>
        <option value='C'>Prix croissant</option>
        <option value='D'>Prix décroissant</option>
    <!-- je sais pas quoi mettre d'autre  -->
    </select>
    </p></div>

    <div><p>
    <label>Nom</label>
    <input type='text' name='nom'>
</p></div>

    <input type='submit' name='pitie' value='ok'/>
    </fieldset>

</form></div>";
echo $form;

$html = "";
$txtProduit = "";
foreach ($tab_p as $p) {
    $txtProduit = "";
    /*$vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $lienImmatriculation = rawurlencode($v->getImmatriculation());
    */

    
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
    
    $urlImage = rawurlencode($p->get("photo"));
    $lienImage = "<img src ='./img/{$urlImage}'>";

    $txtProduit = "<li>{$lienImage}<p>{$txtProduit}</p></li>";
    
    $lienIdProduit = rawurlencode($p->get("idProduit"));
    $link = "<a href='index.php?action=read&controller={$controller}&idProduit={$lienIdProduit}'>{$txtProduit}</a>";
    
    $html = $html . $link;

}

echo "<ol>{$html}</ol>"; 
?>
