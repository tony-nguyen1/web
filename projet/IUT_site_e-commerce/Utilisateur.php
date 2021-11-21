<?php
   
class Utilisateur {
   
    private $login;
    private $nom;
    private $prenom;
   
    // un constructeur
    public function __construct($login, $nom, $prenom) {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
    
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }

    public function set($nom_attribut, $valeur) {
        $this->$nom_attribut = $valeur;
    }
              
    // une methode d'affichage.
    /*public function afficher() {
      // À compléter dans le prochain exercice
      echo "<p> Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur) </p>";
    }*/
}
?>

