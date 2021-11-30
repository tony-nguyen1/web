
<?php
$html = "";
foreach ($tab_v as $v) {
    $vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $lienImmatriculation = rawurlencode($v->getImmatriculation());
            
    $html = $html.'<p>Voiture d\'immatriculation ' . $vImmatriculation . '. ';
    $html = $html.'<a href="index.php?action=read&controller='.$controller.'&immat='.$lienImmatriculation.'">Détails</a>';
    //$html = $html.'<a href="index.php?action=delete&controller='.$controller.'&immat='.$lienImmatriculation.'">Supprimer cette voiture</a>';
    $html = $html . "</p>";
}

$html = $html.'<p><a href="index.php?action=create&controller='.$controller.'">Rajouter une voiture</a></p>';

echo $html; 
?>
