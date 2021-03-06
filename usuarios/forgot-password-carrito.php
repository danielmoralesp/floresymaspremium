<?php 
	require_once("../conexion.php"); 
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title>Recordar Password</title>
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	<?php $id_pedidos=$_GET["id_pedidos"]; ?>
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "forgot-password-carrito?id_pedidos=<?php echo $id_pedidos?>";
		}
	  //-->
	</script>
	
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/devise/base-db80086a5f1481f6bbd62c8c50057db9.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../assets/validacion/validar-forgot-password-carrito.js"></script>

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
		<div class="devise radio-option" data-option="radio">
		<!-- Login -->
			<section class="login center wrap-1000" id="auth_form">
			<h1 class="black-blue" id="title"><?php echo chao_tilde('Olvide Mi Contraseña')?></h1>
				<form name="form" accept-charset="UTF-8" action="reset-password-carrito?id_pedidos=<?php echo $_GET["id_pedidos"];?>" class="new_user" id="forgot_form" method="post" style="display: block;">
					<h4 class="black-blue forgot-password" id="title">Recordar Password</h4>
					<p class="black-blue forgot-password-subtitle"><?php echo chao_tilde('Ingrese su correo electronico para reestablecer su contraseña')?></p>
					<div class="form grid forgot-password-field">
						<div class="col-1-2 pad-r">
							<label for="user_email" class="for-ie">Email</label>
							<input id="user_email" name="user" size="30" type="email" value="" placeholder="Email">
							<div  class="error-msg" id="div_user"></div>
						</div>
					</div><br>
					<input type="button" class="button blue medium bottom" value="Reestablecer" onClick="validar()">
				</form>    
			</section>
		</div>
        <div class='push'></div>
    </div>
	<?php require_once("../instancias/footer.php"); ?>
    <script src="../assets/desktop/global/init-fe497ff2ba789f9be474e2aca4edbf0b.js" type="text/javascript"></script>    
    <script src="../assets/shared/devise/init-c6b1636c5ae2c36d3da23aaa2572b6dc.js" type="text/javascript"></script>
</body>
</html>
