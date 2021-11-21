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
    public function __construct($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    } 
              
    // une methode d'affichage.
    public function afficher() {
      // À compléter dans le prochain exercice
      echo "<p> Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur) </p>";
    }
}
?>

