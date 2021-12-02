<?php
require_once File::build_path(array("controller","ControllerProduit.php"));
require_once File::build_path(array("controller","ControllerClient.php"));

$controller;
$controller_class;
$param;
$action;

//récupération puis vérification de toutes les variables de travailles
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = "produit";//valeur par défaut
}
if (isset($_GET['action'])) {
    $action = $_GET["action"];
} else {
    $action = 'readAll';
}
if (isset($_GET['idProduit'])) {
    $param = $_GET["idProduit"];
} else {
    $param = NULL;
}


$controller_class = "Controller".ucfirst($controller);
$class_methods = get_class_methods($controller_class);
//vérification, la classe existe? Si oui, est-ce qu'elle a la méthode demandé?
if (class_exists($controller_class) && in_array($action, $class_methods)) {
    $controller_class::$action($param); 
} else {
    echo $controller_class;
    //ControllerVoiture::error();
}
?>
