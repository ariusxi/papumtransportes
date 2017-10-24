<?php
	$url = (isset($_GET['url'])) ? $_GET['url'] : '';
	$explode = explode("/",$url);
	$classname = $explode[0];
	$methodname = $explode[1]."Action";
	
	require_once "../classes/BD.class.php";
	require_once "../classes/$classname.class.php";
	$controller = new $classname;
	print_r(json_encode($controller->$methodname($_POST)));
?>