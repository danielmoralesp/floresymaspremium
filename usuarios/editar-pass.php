<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==1){
		require_once("../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>

    <title></title>
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="" name="csrf-param" />
	<meta content="" name="csrf-token" />

	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "";
		}
	  //-->
	</script>
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/profile/base-1d9495a4b5b95cb36f610cba78cd0098.css" media="screen" rel="stylesheet" type="text/css" />

    <!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="//v2.zopim.com/?3QHttEutJ1CyxQJLP3MYVfd7D2E3Id0T";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zopim Live Chat Script-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69094727-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body> 
    <div class='global-wrapper'>
        <div id="flashes">
        </div>
		<?php require_once("../instancias/header2.php"); ?>        
		<div class="center wrap-1240 rel">
			<div class="nav">
				<a href="detalles-perfil.php?id_usuario=<?php echo $reg["id_usuario"];?>">
				<p class="nav-item crumb details active" data-page="details">
					<span class="icon inactive"></span>
					<span class="icon active"></span>
					<span class="icon hover"></span>
					Detalle de Perfil
				</p></a>				
				<p class="nav-item crumb history " data-page="history">
					<a href="historial-ordenes.php?id_usuario=<?php echo $reg["id_usuario"]; ?>">
					<span class="icon inactive"></span>
					<span class="icon active"></span>
					<span class="icon hover"></span>
					Historial de Ordenes
					</a>	
				</p>
				<p class="nav-item crumb shave-plan " data-page="shave_plan">
					<a href="historial-planes.php?id_usuario=<?php echo $reg["id_usuario"]; ?>">
					<span class="icon inactive"></span>
					<span class="icon active"></span>
					<span class="icon hover"></span>
					Sus Planes
					</a>
				</p>
				<a href="logout" class="nav-item logout">
					<span class="icon inactive"></span>
					<span class="icon active"></span>
					<span class="icon hover"></span>
					Logout
				</a>
			</div> 
		<div class="wrap-650 center details page" data-name="details" style="display: block">
			<h1>Detalles del Perfil</h1>
			<section id="details_name">
				<div class="show view">
					<h2>Usuario</h2>
					<span class="name" data-field-name="name"><em><?php echo $reg["user"]; ?></em></span>
					<div class="right table">
						<div class="middle">
							<a href="editar-usuario.php?id_usuario=<?php echo $reg["id_usuario"]; ?>"><span class="link edit">Editar</span></a>
						</div>
					</div>
				</div>			
			</section>
			<section id="details_email">
				<div class="show view " style="display: none;">
					<h2>Email / Password</h2>					
						<span class="email" data-field-name="email">danielmorales1202@gmail.com</span>
						<span class="password">xxxxxxxxxx</span>
						<div class="right table"><div class="middle">
							<span class="link edit">Edit</span>
						</div></div>
				</div>
				<form name="form" accept-charset="UTF-8" action="edit-pass.php?id_usuario=<?php echo $reg["id_usuario"];?>" method="post" enctype="multipart/form-data">
					<div class="form view" style="display: block;">
						<h2>Email / Password</h2>
						<div class="field">
							<label for="email" class="for-ie">Email</label>
							<input type="email" name="user" placeholder="<?php echo $reg["user"]; ?>" value="<?php echo $reg["user"]; ?>">
						</div>
						<div class="field">
							<label for="current_password" class="for-ie">Password Actual</label>
							<input type="text" name="pass" placeholder="<?php echo $reg["pass"]; ?>" value="<?php echo $reg["pass"]; ?>">
						</div>
						<button class="blue medium">Guardar Cambios</button>
						<input type="hidden" name="permisos" value="<?php echo $reg["permisos"]; ?>"/>
						<input type="hidden" name="id_pedidos" value="<?php echo $reg["id_pedidos"]; ?>"/>
						<input type="hidden" name="id_usuario" value="<?php echo $reg["id_usuario"]; ?>"/>
				</form>
					<a href="detalles-perfil.php?id_usuario=<?php echo $reg["id_usuario"];?>" >
						<div class="right">
							<span class="link cancel">Cancelar</span>
						</div>
					</div>
					</a>
			</section>			
		</div>
		</div>
	</div>
        <div id='back_to_top'></div>
        <div class='push'></div>

    <?php require_once("../instancias/footer.php"); ?> 
	<?php
		}
	?>

    <script src="../assets/desktop/global/init-f4172392de5a94d426c0cff014321f77.js" type="text/javascript"></script>    
    <script src="https://js.stripe.com/v2/stripe-dss3.js" type="text/javascript"></script>
    <script src="../assets/shared/profile/init-5e33ebcac817e3cc2bb026a631e3d439.js" type="text/javascript"></script>
</body>
</html>

<?php
}else{
		echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["user"]." no tiene permisos de ingreso');
				window.location='perfil';
			  </script>";
		?>
		<html>
			<meta http-equiv="refresh" content="0; url=perfil">
		</html>
		<?php
	}
?>
