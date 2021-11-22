<?php
   
class Utilisateur {
   
    private $login;
    private $nom;
    private $prenom;
   
    
    // un constructeur
    public function __construct($data=NULL) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
    
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }

    public function set($nom_attribut, $valeur) {
        $this->$nom_attribut = $valeur;
    }
              
    // une methode d'affichage.
    public function afficher() {
      // À compléter dans le prochain exercice
      echo "<p> Utilisateur $this->login - $this->nom $this->prenom </p>";
    }

    public static function getAllUtilisateurs() {
        $rep = Model::getPDO()->query("SELECT * FROM utilisateur");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        return $rep->fetchAll();
    }
}
?>

