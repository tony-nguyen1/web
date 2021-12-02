<?php
    /** 
     * TODO :
     * -ajouter try {} catch {} autour du PDO
     * -ne pas oublier d'utiliser if (Conf::getDebug()) comme dans Model::init()
     * remettre le vieux constructeur car celui avec un tableau me donne des erreurs
     * 
    **/
require_once File::build_path(array("model","Model.php"));
class ModelProduit extends Model{
   
    private $idProduit;
    private $nom;
    private $marque;
    private $categorie;
    private $descriptif;
    private $photo;
    private $prix;
    private $stock;
    protected static $object = 'produit';
    protected static $primary='idProduit';

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
            foreach($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}
?>
