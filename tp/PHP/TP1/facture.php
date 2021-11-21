<?php

include './data.php';

$catalogue = getCatalogue();

$mon_article = getArticle($catalogue, "samsung");

$inserts ="";
$insert = "";
foreach ($_GET as $marque => $nbAchete){
  //var_dump($marque);
  //var_dump($nbAchete);
  if ($nbAchete != "") {
    $article = getArticle($catalogue, $marque);

    $prixTTC = $article["prix"];
    $TVA = $prixTTC * 0.2;
    $prixHT = $prixTTC - $TVA;
    $prixTotal = $prixTTC*$nbAchete;

    $insert = "<tr>
      <th scope='row'>{$nbAchete}</th>
      <td>{$article["id"]}</td>
      <td>{$prixHT}</td>
      <td>{$TVA}</td>
      <td>{$prixTotal}</td>
    </tr>";

    $inserts = $inserts.$insert;
    
  }
}

var_dump($_GET);

$html ="
<!doctype html>
<html lang='fr'>
    <head>
    <meta charset='utf-8' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Commande</title>
    <style>
        header {
        background-color:rgba(255,255,255,.5);
        }
        .carousel-item {
        height:100px;
        }
        .carousel-item img {
        height:100px;
        }
    </style>
    </head>

    <body> 
        <div class='container-fluid m-1 '>
            <div class='row'>
                <h1>Facture</h1>
                <div class='col-sm-12'>
                    <table class='table'>
                        <thead>
                        <tr>
                            <th scope='col'>Quantité</th>
                            <th scope='col'>Article</th>
                            <th scope='col'>Prix Unitaire HT</th>
                            <th scope='col'>T.V.A.</th>
                            <th scope='col'>T.T.C.</th>
                        </tr>
                        </thead>

                        <tbody>
                        {$inserts}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>";

echo $html;
?>


<!--
    php -S localhost:8090

    http://localhost:8888/L2_info/web/TP1/facture.php
-->
