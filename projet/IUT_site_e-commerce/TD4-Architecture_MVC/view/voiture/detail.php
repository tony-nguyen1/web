
        <?php
        $lienImmatriculation = rawurlencode($v->getImmatriculation());
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        $controller = static::$object;
        $html = "";

        $html = "<p> Voiture {$vImmatriculation} de marque {$v->getMarque()} (couleur {$v->getCouleur()}) ";

        $html = $html . '<a href="index.php?action=update&controller='.$controller.'&immat='.$lienImmatriculation.'">Modifier cette voiture</a> ';

        $html = $html . '<a href="index.php?action=delete&controller='.$controller.'&immat='.$lienImmatriculation.'">Supprimer cette voiture</a></p>';
        /*$test = serialize($v);
        echo "<p>{$test}</p>";

        
        $tset = unserialize($test);
        echo "<p>";
        var_dump($tset);
        echo "</p>";


        echo $tset->getImmatriculation();*/
        
        echo "<p>{$html}</p>";
        ?>
