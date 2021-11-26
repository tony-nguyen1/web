<?php
$vImmatriculation = htmlspecialchars($v->getImmatriculation());
$vMarque = htmlspecialchars($v->getMarque());
$vCouleur = htmlspecialchars($v->getCouleur());

$html = "
<form method=\"get\" action=\"index.php\">
    <fieldset>
        <input type=\"hidden\" value=\"updated\" name=\"action\"/>
        <input type=\"hidden\" value=\"voiture\" name=\"controller\"/>
        <input type=\"hidden\" value=\"{$v->getImmatriculation()}\" name=\"immat\"/>
      <legend>Mon formulaire :</legend>
      <p>
        <label for=\"immat_id\">Immatriculation</label> :
        <input type=\"text\" value=\"{$vImmatriculation}\" name=\"immatriculation\" id=\"immat_id\" readonly/>
      </p>
      <p>
        <label for=\"marque_id\">Marque</label> :
        <input type=\"text\" value=\"{$vMarque}\" name=\"marque\" id=\"marque_id\" required/>
      </p>
      <p>
        <label for=\"coul_id\">Couleur</label> :
        <input type=\"text\" value=\"{$vCouleur}\" name=\"couleur\" id=\"coul_id\" required/>
      </p>
      <p>
        <input type=\"submit\" value=\"Envoyer\" />
      </p>
    </fieldset> 
</form>";

echo $html;
?>
  