<form method="get" action="index.php">
    <fieldset>
        <input type="hidden" value="created" name="action"/>
      <legend>Mon formulaire :</legend>
      <p>
        <label for="immat_id">Immatriculation</label> :
        <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
      </p>
      <p>
        <label for="marque_id">Marque</label> :
        <input type="text" placeholder="Renault" name="marque" id="marque_id" required/>
      </p>
      <p>
        <label for="coul_id">Couleur</label> :
        <input type="text" placeholder="bleu" name="couleur" id="coul_id" required/>
      </p>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
</form>
  
  