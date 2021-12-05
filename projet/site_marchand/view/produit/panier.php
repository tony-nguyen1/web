<?php

session_start();

//function pour ajouter article au panier qui est dans $_SESSION['panier']
function ajoutPanier(){
    if (isset($_GET['name'])){
        $estdanslepanier = false;
        foreach ($_SESSION['panier'] as $key){
            if ($key == $_GET['id']){
                $_SESSION['panier'][$key] += $_GET['name']; 
                $estdanslepanier=true;
            }
        }
        if(!$estdanslepanier){
            $_SESSION['panier'][$_GET['id']]= $_GET['name'];
        }
    }
}

//vérification de l'existance du panier 
if (!isset($_SESSION['panier'])){
    $_SESSION['panier'][]= array();
    ajoutPanier();
} else{
    ajoutPanier();
}

echo $_SESSION['panier'];

?>