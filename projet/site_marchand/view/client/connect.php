<?php
$html = "
<form method=\"get\" action=\"index.php\">
    <fieldset>
        <h2>Connexion</h2>
        <input type=\"hidden\" value=\"connected\" name=\"action\"/>
        <input type=\"hidden\" value=\"client\" name=\"controller\"/>

        

        <p>
        <label for=\"identifiantID\">Identifiant* : </label>
        <input type=\"email\" name=\"identifiant\" id='identifiantID' placeholder='toto@gmail.com' required><br>
        </p>

        <p>
        <label for=\"mdpID\">Mot de passe* : </label>
        <input type=\"password\" name=\"mdp\" id='mdpID' placeholder='azerty' required><br>
        </p>

        <i><p>Champs obligatoires*</p></i>

        <input type=\"submit\" value='Valider'>
    </fieldset> 
</form>";

echo $html;
?>
  