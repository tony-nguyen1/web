<?php
   
class Voiture {
   
    private $marque;
    private $couleur;
    private $immatriculation;
   
    public function getMarque() {
        return $this->marque;
    }
   
    public function setMarque($m) {
        $this->marque = $m;
    }

    public function getCouleur() {
        return $this->couleur;
    }
   
    public function setCouleur($c) {
        $this->couleur = $c;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }
   
    public function setImmatriculation($i) {
        if (strlen($i) <= 8) {
            $this->immatriculation = $i;
        }
    }
   
    // un constructeur
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    } 
              
    // une methode d'affichage.
    public function afficher() {
      // À compléter dans le prochain exercice
      echo "<p> Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur) </p>";
    }

    public static function getAllVoitures() {
        $rep = Model::getPDO()->query("SELECT * FROM voiture");//écriture de la requête
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');//on veut récuper des instances de la class Voiture
        return $rep->fetchAll();
    }
}
?>

