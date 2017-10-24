<?php
	if(!isset($_SESSION['id_user'])){
		echo "<h2>ERRO 200</h2><p>Você não tem permissão para acessar essa página</p>";
		exit;
	}
	
	if($_SESSION['type'] == 1){
		include "inc/client.php";
	}else{
		include "inc/transport.php";
	}
?>