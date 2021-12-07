<?php

class ControllerPanier {
    public static function read() {
        $tab_panier = static::getPanier();

        $controller='panier';
        $view = 'panier';
        $pagetitle='Panier courant';
        
        require File::build_path(array("view","view.php"));
    }
    public static function ajouterProduit() {
        if (isset($_GET['idProduit'])) {
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = array();
            }
            if (isset($_SESSION['panier'][$_GET['idProduit']])) {
                $_SESSION['panier'][$_GET['idProduit']] = $_SESSION['panier'][$_GET['idProduit']] + $_GET['nbProduitAchete'];
            } else {
                $_SESSION['panier'][$_GET['idProduit']] = intval($_GET['nbProduitAchete']);
            }
        } else {
            //erreur
        }


        $tab_panier = static::getPanier();

        $controller='panier';
        $view = 'panier';
        $pagetitle='Panier courant';
        
        require File::build_path(array("view","view.php"));
    }
    private static function getPanier() {
        $tab_panier = array();
        foreach (array_keys($_SESSION['panier']) as $idPrdt) {
            $unProduit = ModelProduit::select($idPrdt);


            $uneLigne = array();
            array_push($uneLigne, $unProduit->get('nom'));
            array_push($uneLigne, $unProduit->get('prix'));
            array_push($uneLigne, $_SESSION['panier'][$idPrdt]);
            array_push($uneLigne, $unProduit->get('idProduit'));


            array_push($tab_panier, $uneLigne);
        }

        return $tab_panier;
    }
}
?>