
        <?php
        $vImmatriculation = htmlspecialchars($vImmatriculation);
        echo "<p> Voiture {$vImmatriculation} de marque {$v->getMarque()} (couleur {$v->getCouleur()}) </p>";
        ?>
