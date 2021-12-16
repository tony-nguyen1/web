<?php
$vEmail = "";
$vMotDePasse = "";
$vNom = "";
$vPrenom = "";
$vVille = "";
$vAdresse = "";
$vTelephone = "";

if (strcmp($action, "update") == 0) {
    $vEmail = htmlspecialchars($c->get("email"));
    $vMotDePasse = htmlspecialchars($c->get("motDePasse"));
    $vNom = htmlspecialchars($c->get("nom"));
    $vPrenom = htmlspecialchars($c->get("prenom"));
    $vVille = htmlspecialchars($c->get("ville"));
    $vAdresse = htmlspecialchars($c->get("adresse"));
    $vTelephone = htmlspecialchars($c->get("telephone"));
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
        <input type=\"hidden\" value=\"{$immatriculation}\" name=\"mail\"/>
        <div>
        <label for=\"nomID\"> Rentrez votre nom de famille</label>
        <input type=\"text\" name=\"nom\" id='nomID'>
        </div>
        
        <div>
        <label for=\"prenomID\"> Rentrez votre nom</label>
        <input type=\"text\" name=\"prenom\" id='prenomID'>
        </div>
        
        <div>
        <label for=\"villeID\"> Quelle ville habitez vous?</label>
        <input type=\"text\" name=\"ville\" id='villeID'>
        </div>
        
        <div>
        <label for=\"adresseID\">Rentrez votre adresse</label>
        <input type=\"text\" name=\"adresse\" id='adresseID'>
        </div>
        
        <div>
        <label for=\"identifiantID\"> Rentrez votre adresse mail </label>
        <input type=\"email\" name=\"identifiant\" id='identifiantID' {$lecture}>
        </div>
        
        <div>
        <label for=\"mdpID\"> Rentrez votre mot de passe</label>
        <input type=\"password\" name=\"mdp\" id='mdpID' {$lecture}>
        </div>
        
        <div>
        <label for=\"mdp_confirmID\"> confirmer</label>
        <input type=\"password\" name=\"mdp_confirm\" id='mdp_confirmID' {$lecture}>
        </div>
        


        <input type=\"submit\" value='Valider'>
    </fieldset> 
</form>";

echo $html;
?>
  