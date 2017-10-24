<?php include_once "inc/header.php"; ?>
	<?php
		$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
		$explode = explode("/", $url);
		
		$nao_permitidas = ['register', 'index'];
		
		if(file_exists("pages/".$explode[0].".php") || in_array($explode[0], $nao_permitidas)){
			include_once "pages/".$explode[0].".php";
		}else{
			echo "<h3>ERRO 404</h3><p>Página não encontrada</p>";
		}
	?>
<?php include_once "inc/footer.php"; ?>