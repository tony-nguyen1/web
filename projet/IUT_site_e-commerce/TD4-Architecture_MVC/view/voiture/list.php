
        <?php
        foreach ($tab_v as $v) {
            $vImmatriculation = htmlspecialchars($v->getImmatriculation());
            $lienImmatriculation = rawurlencode($v->getImmatriculation());
            echo '<p><a href="index.php?action=read&immat='.$lienImmatriculation.'"> Voiture d\'immatriculation ' . $vImmatriculation . '.</a></p>';
        }
        ?>
