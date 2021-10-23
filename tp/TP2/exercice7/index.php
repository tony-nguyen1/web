<?php
/**
 *  L'idée :
 * 
 * On va récupérer les données d'un form avec method post et sans action
 * action par défaut est de lancé le fichier qui a le form.
 * 
 * En php, on va récupérer les données et les réinjecter dans un form html
 */

$larticle=array('marteau'=>10, 'tenaille'=>5, 'vis'=>5.2, 'clou'=>5.8, 
'tournevis'=>7, 'ciseau'=>4, 'toile_émeri'=>3);

$array = array();
$i = 0;
foreach($_GET as $nom => $nombre) {
  /*if ($nombre) { $array[$nom] = $nombre; }//équivalent à array_push($array, $nom=>$nombre);
  else { $array[$nom] = ""; }*/
  $array[$nom] = $nombre ? $nombre : "";
  $i++;
}
?>

<!doctype php>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Commande</title>
</head>

<body> 
    <form method="GET">

      <label for="marteau">Combien de marteau voulez-vous ?</label>
      <input type="number" name="marteau" value="<?php echo $array["marteau"]; ?>">

      <label for="tenaille">Combien de tenaille voulez-vous ?</label>
      <input type="number" name="tenaille" value="<?php echo $_GET["tenaille"]; ?>">

      <label for="vis">Combien de vis voulez-vous ?</label>
      <input type="number" name="vis" value="<?php echo $array["vis"]; ?>">

      <label for="clou">Combien de clou voulez-vous ?</label>
      <input type="number" name="clou" value="<?php echo $array["clou"]; ?>">

      <label for="tournevis">Combien de tournevis voulez-vous ?</label>
      <input type="number" name="tournevis" value="<?php echo $array["tournevis"]; ?>">

      <label for="ciseau">Combien de ciseau voulez-vous ?</label>
      <input type="number" name="ciseau" value="<?php echo $array["ciseau"]; ?>">

      <label for="toile émeri">Combien de toile émeri voulez-vous ?</label>
      <input type="number" name="toile_émeri" value="<?php echo $array["toile_émeri"]; ?>">


        <button type="submit" name="envoyer" class="btn btn-primary">send</button>
    </form>

    <p>Total = 
    <?php
    $total = 0;
      foreach($array as $nom => $nombre) {
        if ($nombre) { $total = $total + $larticle[$nom]*$nombre; }
      }
      echo $total;
    ?>
    €
    </p>
</body>
</html>

<!--
    php -S localhost:8090

    http://localhost:8090/L2_info/web/TP1/facture.php
-->