<?php
require_once './Model.php';
require_once './Voiture.php';

$rep = Model::getPDO()->query("SELECT * FROM voiture");

/*$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);

foreach ($tab_obj as $indice => $obj) {
    print_r($indice);
    echo "$obj->immatriculation - $obj->marque - $obj->couleur<br>"; 
}*/

/*$tab_voit = $rep->fetchAll(PDO::FETCH_CLASS, 'Voiture');
foreach($tab_voit as $uneVoiture) {
    $uneVoiture->afficher();
}*/

foreach(Voiture::getAllVoitures() as $uneVoiture) {
    $uneVoiture->afficher();
}

?>