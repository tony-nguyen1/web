<?php
   
class Trajet {
   
    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;
   

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
        echo "<p> Trajet $this->depart -> $this->arrivee, $this->date  $this->prix €  $this->nbplaces $this->conducteur_login </p>";
    }

    public static function getAllTrajets() {
        $rep = Model::getPDO()->query("SELECT * FROM trajet");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        return $rep->fetchAll();
    }
}
?>

