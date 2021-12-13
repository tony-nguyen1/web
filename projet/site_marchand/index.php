<?php
session_start();
//mail('nguyentoony@gmail.com', 'Test message', "Hello world!");
require_once './lib/File.php';
require_once File::build_path(array("controller","routeur.php"));
?>