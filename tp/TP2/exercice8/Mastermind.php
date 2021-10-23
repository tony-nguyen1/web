<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
class Mastermind
{
    //attributs
    public $nbAlea;
    public $historique;

    public function __construct() {
        $this->nbAlea = array();
        /*for ($i = 0; $i < 4; $i++) {
            array_push($this->nbAlea,rand(0,9));
        }*/
        array_push($this->nbAlea, 5);
        array_push($this->nbAlea, 7);
        array_push($this->nbAlea, 4);
        array_push($this->nbAlea, 2);
        $this->historique = array();
    }

    public function jouerCoup(int $a = 0, int $b = 0, int $c = 0, int $d = 0) {
        echo "Je joue {$a}-{$b}-{$c}-{$d}.<br>";
        $foo = array($a, $b, $c, $d);
        array_push($this->historique,$foo);
        var_dump($this->historique);
    }

    /** vérifie si les 4 nombres passé en paramètres
     * correspond à nbAlea
    */
    public function verification(int $a, int $b, int $c, int $d) {
        if ($a == $this->nbAlea[0] &&
        $b == $this->nbAlea[1] &&
        $c == $this->nbAlea[2] &&
        $d == $this->nbAlea[3]) {
            return true;
        }
        //else
        return false;
    }
}

/*
$mm->jouerCoup(5, 4, 7, 2);
$mm->jouerCoup();
$mm->jouerCoup(5,7,1,3);
//var_dump($mm->verification(5,7,4,2));
var_dump($mm);*/
?>