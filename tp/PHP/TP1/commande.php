<?php

include './data.php';

$catalogue = getCatalogue();

//création du rayon
$rayons="";
foreach ($catalogue as $rayon => $produit){
    $lien = "<a href='#".$rayon."'>".ucfirst($rayon)."</a>";
    $listItem = "<li>".$lien."</li>";
    $rayons = $rayons.ucfirst($listItem);
}

//création du catalogue






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
<form method='GET' action='http://localhost:8090/L2_info/web/TP1/facture.php'>
<header class='row'>
  <h1 class='col-sm-6 text-center align-self-center'>Hard Discounter<small class='text-muted'> Votre magasin en ligne</small></h1>

  <div id='carousel' class='carousel slide col-sm-6 align-self-center' data-ride='carousel'>
    <div class='carousel-inner'>
      <div class='carousel-item active'><img src='./img/lenovo.jpg' alt='PC portable Lenovo (499.99€) '></div><div class='carousel-item '><img src='./img/asus.jpg' alt='PC portable ASUS (579.99€) '></div><div class='carousel-item '><img src='./img/samsung.jpg' alt='Tablette Samsung (215.19€) '></div><div class='carousel-item '><img src='./img/archos.jpg' alt='Tablette Archos (99.99€) '></div><div class='carousel-item '><img src='./img/xiaomi.jpg' alt='XIAOMI Redmi Note 8T 128 Go Bleu (252€) '></div>    </div>
  </div>
</header>
<hr>
<div class='row'>
  <a id='debut'></a>
  <nav class='col-sm-3'>
    <h2 class='text-center'>Rayons</h2>
    <ul>
    {$rayons}
    </ul>
    <button type='submit' name='commander' class='btn btn-primary m-3'>
      Commander !
    </button>
    </nav>
  <div class='col-sm-9'>
    <h2 class='text-center'>Saisissez vos quantités d'articles puis Commandez !</h2>
    -- insert here --
  </div>
</div>
<div class='row'>
  <div class='col text-center'>
    <button type='submit' name='commander' class='btn btn-primary'>Commander !</button>
  </div>
</div>

  <footer class='row'>
  <div class='col-sm-4 text-center'>
    <a href='#debut'>Retourner au début</a>
  </div>
  <div class='col-sm-4 text-center'>
    <h2>HARD DISCOUNTER</h2>
  </div>
  <div class='col-sm-4 text-center'>
    <a href='mailto:contact@harddiscounter.com'>Nous contacter</a>
  </div>
</footer>
</form>
</div>
<script> $('.carousel').carousel({ interval: 1500 })
</script>
</body>
</html>
";

echo $html;
?>


<!--
    php -S localhost:8090

    http://localhost:8090/L2_info/web/TP1/facture.php
-->
