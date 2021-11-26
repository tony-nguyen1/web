
        <?php
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        echo "<p> Voiture {$vImmatriculation} de marque {$v->getMarque()} (couleur {$v->getCouleur()}) </p>";
        
        
        /*$test = serialize($v);
        echo "<p>{$test}</p>";

        
        $tset = unserialize($test);
        echo "<p>";
        var_dump($tset);
        echo "</p>";


        echo $tset->getImmatriculation();*/
        ?>
