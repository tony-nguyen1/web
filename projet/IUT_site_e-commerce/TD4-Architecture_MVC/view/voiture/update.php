<?php
$vImmatriculation = "";
$vMarque = "";
$vCouleur = "";
$lecture = "";
$futureAction = "";
$immatriculation = "";

if (strcmp($action, "update") == 0) {
  $immatriculation = $v->getImmatriculation();
  $vImmatriculation = htmlspecialchars($v->getImmatriculation());
  $vMarque = htmlspecialchars($v->getMarque());
  $vCouleur = htmlspecialchars($v->getCouleur());
  $lecture = "readonly";
  $futureAction = "updated";
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
        <input type=\"hidden\" value=\"{$immatriculation}\" name=\"immat\"/>
      <legend>Mon formulaire :</legend>
      <p>
        <label for=\"immat_id\">Immatriculation</label> :
        <input type=\"text\" value=\"{$vImmatriculation}\" name=\"immatriculation\" id=\"immat_id\" {$lecture}/>
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
  