<?php
require_once File::build_path(array("controller","ControllerVoiture.php"));
//require_once 'ControllerVoiture.php';
if (isset($_GET['action'])) {
    // On recupère l'action passée dans l'URL
    $action = $_GET["action"];
} else {
    $action = 'readAll';
}

if (isset($_GET['immat'])) {
    // On recupère l'action passée dans l'URL
    $param = $_GET["immat"];
} else {
    $param = NULL;
}

$class_methods = get_class_methods('ControllerVoiture');

if (in_array($action, $class_methods)) {
    // Appel de la méthode statique $action de ControllerVoiture
    ControllerVoiture::$action($param); 
} else {
    ControllerVoiture::error();
}


?>
