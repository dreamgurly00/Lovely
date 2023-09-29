<?php
$request = $_SERVER['REQUEST_URI'];

$routes = explode('/',$request);


$controller = $routes[3]; //third item in array is controller
$controller = strtolower($controller);


switch ($controller)
{
	case "news":
	require_once(__DIR__ .'/controllers/newsController.php');
	break;
	case "product":
	require_once(__DIR__ .'/controllers/productController.php');
	break;
	default:
	echo "not found";
	break;
}