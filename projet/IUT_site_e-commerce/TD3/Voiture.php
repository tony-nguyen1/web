<?php
    /** 
     * TODO :
     * -ajouter try {} catch {} autour du PDO
     * -ne pas oublier d'utiliser if (Conf::getDebug()) comme dans Model::init()
    **/
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
    public function __construct($data = NULL) {
        foreach($data as $key => $value) {
            $this->$key = $value;
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

    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public function save() {
        $sql = "INSERT INTO voiture (marque, couleur, immatriculation) VALUES (:marque, :couleur, :immatriculation)";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            ":marque" => $this->marque,
            ":couleur" => $this->couleur,
            ":immatriculation" => $this->immatriculation
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);    
    }

}
?>

