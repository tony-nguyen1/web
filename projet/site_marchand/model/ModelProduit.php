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

    public static function selectFiltre($data, $prix = NULL, $order = NULL) {
        //$values = array(); requete vulenérable à injection
        $sql = "SELECT * FROM Produits WHERE ";
        /*$cdt = "SELECT * FROM Produits WHERE";
        if (isset($data['categorie'])) {
            //echo "$data";
            $cdt = $cdt . "=:val1";
            $cdt = $cdt . " OR =:val2";

            //echo $cdt;
        }*/
        $cdt = "";
        foreach ($data as $cle => $valeur) {
            if (count($valeur)> 0) {
                
                $cdt = $cdt . '(';
                foreach ($valeur as $item) {
                    $cdt = $cdt . "{$cle} = '{$item}' OR ";
                }
                $cdt = rtrim($cdt, "OR ");
                $cdt = $cdt . ')';


                $cdt = $cdt . " AND ";
            }  
        }
        //$cdt = rtrim($cdt, "AND ");

        if (!is_null($prix)) {
            $cdt = $cdt . "prix ";
            switch ($prix) {
                case "11":
                    $cdt = $cdt . "BETWEEN 5 AND 15"; 
                    break;
                case "22":
                    $cdt = $cdt . "> 15";
                    break;
            }
        }

        if (!is_null($order)) {
            $cdt = $cdt . " ORDER BY ";
            switch ($order) {
                case "A":
                    $cdt = $cdt . "nom ASC"; 
                    break;
                case "B":
                    $cdt = $cdt . "nom DESC"; 
                    break;
                case "C":
                    $cdt = $cdt . "prix ASC"; 
                    break;
                case "D":
                    $cdt = $cdt . "prix DESC"; 
                    break;
            }
        }


        $sql = $sql . $cdt . ";";
        //echo $sql;

        $rep = Model::getPDO()->query($sql);//écriture de la requête
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelProduit");//on veut récuper des instances de la class Voiture
        
        return $rep->fetchAll();
    }
}
?>
