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
    public static function clear() {
        $_SESSION['panier'] = array();
    }

    public static function clear2() {
        static::clear();

        $controller='panier';
        $view = 'panier';
        $pagetitle='Panier courant';
        
        require File::build_path(array("view","view.php"));
    }

    public static function create($idCommande) {
        foreach (array_keys($_SESSION['panier']) as $idPrdt) {
            $unProduit = ModelProduit::select($idPrdt);
            
            $qte = $_SESSION['panier'][$idPrdt];
            $stock = $unProduit->get("stock");

            //Si il veut en acheter trop, il achète tout
            if ($qte > $stock) {
                $qte = $stock;
                $nvStock = 0;
            } else {
                $nvStock = $stock - $qte;
            }
            $montant = $unProduit->get("prix")*$qte;

            $data = array(
                "idCommande" => $idCommande,
                "idProduit" => $idPrdt,
                "quantite" => $qte,
                "montant" => $stock
            );
    
            ModelLignesCommande::save($data);

            //décrémenter les stocks
            $data2 = array(
                "idProduit" => $idPrdt,
                "stock" => $nvStock
            );
            ModelProduit::update($data2);
        }
    }
}
?>