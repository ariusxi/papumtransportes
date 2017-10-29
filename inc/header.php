<?php
	require_once "config.php";
	include_once "classes/BD.class.php";
	@BD::conn();
	if(isset($_SESSION['id_user'])){
		include_once "classes/BD.class.php";
		
		$pega_logado = @BD::conn()->prepare("SELECT * FROM users WHERE id = ?");
		$pega_logado->execute([$_SESSION['id_user']]);
		$logado = $pega_logado->fetchObject();
		
		if(isset($_GET['sair'])){
			unset($_SESSION['id_user']);
			session_destroy();
			echo "<script>location.href='".BASE."';</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
		<title>Papum Transportes</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='<?php echo BASE; ?>css/camera.css' type='text/css' media='all'>

		<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>css/slicknav.css">
		<link rel="stylesheet" href="<?php echo BASE; ?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>css/style.css">
		
		
		<script type="text/javascript" src="<?php echo BASE; ?>js/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="<?php echo BASE; ?>js/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE; ?>js/jquery.easing.1.3.js"></script> 
		<script type="text/javascript" src="<?php echo BASE; ?>js/camera.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE; ?>js/myscript.js"></script>
		<script src="<?php echo BASE; ?>js/sorting.js" type="text/javascript"></script>
		<script src="<?php echo BASE; ?>js/jquery.isotope.js" type="text/javascript"></script>
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->
		

		<script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
		
	</head>
	<body>
	<?php $current = (isset($_GET['url'])) ? $_GET['url'] : 'home'; ?>
    <!--home start-->
    <?php if($current != "home"){ ?>
    <div class="nav-bar">
    	<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="<?php echo BASE; ?>images/papum_logo_azul_r.png">
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li><a href="<?php echo BASE; ?>home">Home</a></li>
							<li><a href="#about">Avaliações</a></li>
							<li><a href="<?php echo BASE; ?>categoria">Categorias</a></li>
							<?php if(isset($_SESSION['id_user'])){ ?>
							<li><a href="<?php echo BASE; ?>profile">Meu Perfil</a></li>
							<li><a href="<?php echo BASE; ?>?sair">Logout</a></li>
							<?php }else{ ?>
							<li><a href="<?php echo BASE; ?>login">Login</a></li>
							<li><a href="<?php echo BASE; ?>register">Cadastre-se</a>
							<?php }	?>
							<li class="last"><a href="#contact">Contato</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?php }else{ ?>
    <div id="home">
    	<div class="headerLine">
		<div id="menuF" class="default">
			<div class="container">
				<div class="row">
					<div class="logo col-md-4">
						<div>
							<a href="#">
								<img src="images/papum_logo_azul_r.png">
							</a>
						</div>
					</div>
					<div class="col-md-8">
						<div class="navmenu" style="text-align: center;background-color:#024e58; ">
							<ul id="menu">
								<li><a href="<?php echo BASE; ?>home">Home</a></li>
								<li><a href="#about">Avaliações</a></li>
								<li><a href="<?php echo BASE; ?>categoria">Categorias</a></li>
								<?php if(isset($_SESSION['id_user'])){ ?>
								<li><a href="<?php echo BASE; ?>profile">Meu Perfil</a></li>
								<li><a href="<?php echo BASE; ?>?sair">Logout</a></li>
								<?php }else{ ?>
								<li><a href="<?php echo BASE; ?>login">Login</a></li>
								<li><a href="<?php echo BASE; ?>register">Cadastre-se</a>
								<?php }	?>
								<li class="last"><a href="#contact">Contato</a></li>
								<!--li><a href="#features">Features</a></li-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h5>Transporte <br>Seguro.</h5>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h5>Sempre ao seu <br>alcance.</h5>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h5>Nós Facilitamos<br> pra você.</h5>
								</div>
							</div>
						</div><!-- #camera_wrap_1 -->
				</div>
			</div>
		</div>
	</div>
	<?php } ?>