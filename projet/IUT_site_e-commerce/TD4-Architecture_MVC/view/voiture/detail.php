
        <?php
        $vImmatriculation = htmlspecialchars($v->getImmatriculation());
        echo "<p> Voiture {$vImmatriculation} de marque {$v->getMarque()} (couleur {$v->getCouleur()}) ";
        
        echo '<a href="index.php?action=delete&controller='.$controller.'&immat='.$v->getMarque().'">Supprimer cette voiture</a></p>';
        /*$test = serialize($v);
        echo "<p>{$test}</p>";

        
        $tset = unserialize($test);
        echo "<p>";
        var_dump($tset);
        echo "</p>";


        echo $tset->getImmatriculation();*/
        ?>
