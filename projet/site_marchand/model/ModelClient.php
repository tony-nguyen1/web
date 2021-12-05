<?php
require_once File::build_path(array("model","Model.php"));
class ModelClient extends Model{
   
    private $email;
    private $motDePasse;
    private $nom;
    private $prenom;
    private $ville;
    private $adresse;
    private $telephone;
    protected static $object = 'client';
    protected static $primary='email';

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
            $this->email = $data["email"];
            $this->motDePasse = $data["motDePasse"];
            $this->nom = $data["nom"];
            $this->prenom = $data["prenom"];
            $this->ville = $data["ville"];
            $this->adresse = $data["adresse"];
            $this->telelphonne = $data["telelphonne"];
        }
    }

    public static function checkPassword($login, $mot_de_passe_hache) {
        $clients = static::selectAll();

        foreach($clients as $client) {
            if (strcmp($login, $client->get("email")==0 && 
            strcmp($mot_de_passe_hache, $client->get("motDePasse")==0))) {
                return true;
            }
        }

        return false;
    }
}
?>
