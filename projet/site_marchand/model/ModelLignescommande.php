<?php
require_once File::build_path(array("model","Model.php"));
class ModelLignescommande extends Model{
   
    private $idLignecommande;
    private $idCommande;
    private $idProduit;
    private $quantite;
    private $montant;
    protected static $object = 'lignescommande';
    protected static $primary='idLignecommande';

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
            $this->idLignecommande = $data["idLignecommande"];
            $this->idCommande = $data["idCommande"];
            $this->idProduit = $data["idProduit"];
            $this->quantite = $data["quantite"];
            $this->montant = $data["montant"];            
        }
    }


    public static function findByIdCommande($idCommande) {
        $sql = "SELECT * FROM Lignescommandes WHERE idCommande=:uneValeur";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            "uneValeur" => $idCommande
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelLignescommande");
        $tab_obj = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_obj))
            return false;
        return $tab_obj;
    }
}
?>
