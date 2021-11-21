<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> testVoiture </title>
    </head>
   
    <body>
        Voici le résultat du script PHP : 
        <?php
          // Ceci est un commentaire PHP sur une ligne
          /* Ceci est le 2ème type de commentaire PHP
          sur plusieurs lignes */
           
          require_once "./Voiture.php";

          // On écrit le contenu de la variable 'texte' dans la page Web
          echo $texte;

          $marque = "Renault";
          $couleur = "bleu";
          $immatriculation = "256AB34";

            $uneVoiture = new Voiture($marque, $couleur, $immatriculation);

            $uneVoiture.afficher();

            //print_r($uneVoiture);

          //echo "<p> Voiture $immatriculation de marque $marque (couleur $couleur) </p>";




        ?>
    </body>
</html> 