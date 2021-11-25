<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        $vImmatriculation = htmlspecialchars($vImmatriculation);
        echo "<p> Voiture {$vImmatriculation} de marque {$v->getMarque()} (couleur {$v->getCouleur()}) </p>";
        ?>
    </body>
</html>
