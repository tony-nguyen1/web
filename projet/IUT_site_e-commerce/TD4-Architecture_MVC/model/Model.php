<?php
require_once File::build_path(array("config","Conf.php"));;
   
class Model {
    private static $pdo = NULL;

    public static function init() {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();    
        
        try {
            // Connexion à la base de données            
            // Le dernier argument sert à ce que toutes les chaines de caractères 
            // en entrée et sortie de MySql soit dans le codage UTF-8
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
   
    public static function getPDO() {

        if (is_null(self::$pdo) == true) {
            Model::init();
        }
        
        return self::$pdo;
    }

    public static function selectAll() {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);

        $rep = Model::getPDO()->query("SELECT * FROM {$table_name}");//écriture de la requête
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);//on veut récuper des instances de la class Voiture
        return $rep->fetchAll();
    }

    public static function select($primary_value) {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;

        $sql = "SELECT * FROM {$table_name} WHERE {$primary_key}=:uneValeur";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            "uneValeur" => $primary_value
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_obj = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_obj))
            return false;
        return $tab_obj[0];
    }

    public static function delete($primary_value) {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;

        $sql = "DELETE FROM {$table_name} WHERE {$primary_key} = :nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        $values = array(
            "nom_tag" => $primary_value
        );
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    }

    public static function update($data) {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;
        $sSet = "";
        $values = array();

        //écriture de la requête
        foreach ($data as $cle => $valeur) {
            if (strcmp($cle, $primary_key) != 0) {
                $sSet = $sSet . "{$cle}=:{$cle}, ";
            }

            $values[":{$cle}"] = $valeur; //préparation des valeurs
        }
        $sSet = rtrim($sSet, ", ");

        $sql = "UPDATE {$table_name} SET {$sSet} WHERE {$primary_key} = :immatriculation";
        

        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);
    }

    public static function save($data) {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary;
        $attributes = "";
        $tagValues = "";
        $values = array();

        //écriture de la requête
        foreach ($data as $cle => $valeur) {
            //écriture des attibuts
            $attributes = $attributes . "{$cle}, ";

            //écriture des tags
            $tagValues = $tagValues . ":{$cle}, ";

            //préparation des valeurs
            $values[":{$cle}"] = $valeur; 
        }
        $attributes = rtrim($attributes, ", ");
        $tagValues = rtrim($tagValues, ", ");
        $sql = "INSERT INTO voiture ({$attributes}) VALUES ({$tagValues})";
        
        echo $sql;
        
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);
    
        
        // On donne les valeurs et on exécute la requête	 
        $req_prep->execute($values);    
    }
}
?>

