<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <a href="index.php?action=readAll&controller=produit">Produits</a>
<?php
$encre = "";

if (isset($_SESSION['login'])) { 
    $encre = "<a href='index.php?action=deconnect&controller=client'>Déconnexion</a>";
    $encre = $encre . " <a href='index.php?action=historique&controller=commande'>Mes commandes</a>";
    $encre = $encre . " <a href='index.php?action=read&controller=client&email={$_SESSION['login']}'>Mon compte</a>";
} else {
    $encre = "
        <a href='index.php?action=create&controller=client'>Inscription</a>
        <a href='index.php?action=connect&controller=client'>Connexion</a>
    ";
}
echo $encre;
?>
            
            <a href="index.php?action=read&controller=panier">Panier</a>
        </header>
        
<?php
if (isset($_SESSION['login'])) { echo '<p>Connecté en tant que '.$_SESSION['login']."</p>"; }
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
    
        <footer>
            <p style="border: 1px solid black;text-align:right;padding-right:1em;">
                Site marchand de Laurent Antoinette - Romain Campillo - Tony Nguyen
            </p>
        </footer>
    </body>
</html>

