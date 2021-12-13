<?php
require_once File::build_path(array("model","Model.php"));
class ModelCommande extends Model{
   
    private $idCommande;
    private $date;
    private $email;
    private $etat;
    protected static $object = 'commande';
    protected static $primary='idCommande';

    //getter generique
    public function get($attribut) {
        return $this->$attribut;
    }
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
   
    // un constructeur
    public function __construct($data = array()) {
        if (!empty($data)) {
            $this->idCommande = $data["idCommande"];
            $this->date = $data["date"];
            $this->email = $data["email"];
            $this->etat = $data["etat"];            
        }
    }

    public static function findCommandesByEmail($email) {
        $table_name = ucfirst(static::$object)."s";
        $class_name = 'Model'.ucfirst(static::$object);
        $primary_key = static::$primary;

        $sql = "SELECT * FROM Commandes WHERE email=:uneValeur";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            "uneValeur" => $email
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelCommande");
        $tab_obj = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_obj))
            return false;
        return $tab_obj;
    }

    public static function getLastCommandeId() {
        return Model::getPDO()->lastInsertId();
    }
}
?>
