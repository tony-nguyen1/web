<?php
require_once File::build_path(array("model","ModelLignescommande.php"));;
require_once File::build_path(array("model","ModelProduit.php"));;
require_once File::build_path(array("lib","Security.php"));
class ControllerLignescommande {
    protected static $object = 'lignesCommande';

    public static function readAll() {
        $tab_l = ModelLignescommande::selectAll();

        $tab_lp = array();
        foreach($tab_l as $indice => $uneLigneCommande) {
            $objProduit = ModelProduit::select($uneLigneCommande->get("idProduit"));
            array_push($tab_lp, array($uneLigneCommande, $objProduit));
        }

        $controller='lignescommande';
        $view = 'list';
        $pagetitle='Liste de toutes les lignes de commande';
        require File::build_path(array("view","view.php"));
    }
    public static function readByIdCommande() {
        //static::readAll();

        $id = $_GET['idCommande'];
        $tab_l = ModelLignescommande::findByIdCommande($id);

        $tab_lp = array();
        foreach($tab_l as $indice => $uneLigneCommande) {
            $objProduit = ModelProduit::select($uneLigneCommande->get("idProduit"));
            array_push($tab_lp, array($uneLigneCommande, $objProduit));
        }

        $controller='lignescommande';
        $view = 'list';
        $pagetitle='Lignes de la commande';
        require File::build_path(array("view","view.php"));
    }
    public static function create($idCommande, $idProduit, $quantite, $montant) {
        $data = array(
            idCommande => $idCommande,
            idProduit => $idProduit,
            quantite => $quantite,
            montant => $montant
        );

        ModelLignesCommande::save($data);
    }
}
?>
