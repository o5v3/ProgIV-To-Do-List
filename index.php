<?php 
session_start();
require_once("./routes/routes.php");
$router = new Router();
echo $router->route(($_REQUEST["action"] ?? "index"), $_REQUEST);
?>
