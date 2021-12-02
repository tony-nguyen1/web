<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <a href="index.php?action=readAll&controller=produit">Produits</a>
            <a href="index.php?action=readAll&controller=client">Clients</a>
        </header>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
            Site marchand de Laurent Antoinette - Romain Capillo - Tony Nguyen
        </p>
    </footer>
</html>
