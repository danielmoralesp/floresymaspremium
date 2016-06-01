<?php
	require_once("../conexion.php");
			
			$sql2 ="SELECT user
			FROM usuarios
			WHERE user =  '".$_POST["user"]."'";
			
			$res2=mysql_query($sql2,$con);
			
			// pregunto si el usuario existe en la base de datos
			if(mysql_num_rows($res2) != $_POST["user"]){
				echo "<script type='text/javascript'>
						alert('El usuario ".$_POST["user"]." ya existe en la base de datos');
						window.location='forgot-password';
					  </script>";
			}else{	
	
			$sql = "insert into usuarios
			values
			(null,'".$_POST["user"]."','".$_POST["pass"]."','".$_POST["permisos"]."','".$_POST["id_pedidos"]."','".$_POST["id_pedidos_plan_continuidad"]."')		
			";
			
			$res = mysql_query($sql,$con);

			
			$remitente="FloresyMas.co <ventas@floresymas.co>";
			$asunto="Bienvenido a FloresyMas Premium";
			//$cuerpo= file_get_contents('../emails/email-pedido-pendiente.php'); 
			$css1 = "<script src='http://www.floresymaspremium.com/assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js' type='text/javascript'></script>";
			$css2 = "<link href='http://www.floresymaspremium.com/assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css' media='screen' rel='stylesheet' type='text/css' />";
			$css3 = "<link href='http://www.floresymaspremium.com/assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css' media='screen' rel='stylesheet' type='text/css' />";
			$css4 = "<link href='http://www.floresymaspremium.com/assets/desktop/cart/base-8fa6ad487aea51d1cd6ecaf9db5eb33d.css' media='screen' rel='stylesheet' type='text/css' />";
			
			$cuerpo='
				<html>
					<head>
					</head>
					<body>
						<div class="global-wrapper">
							<div id="flashes">
							</div>
								<div class="cart" id="view_edit_cart">
									<div class="wrap-1100 center clear" id="heading">
										<h1>Bienvenido a  FloresyMas Premium</h1>
									</div>
									<div>
										<p>Bienvenido  '.$_POST["user"].' y gracias por resgitarse en FloresyMas Premium!</p>
										<p>Tu cuenta ha sido creada y puedes ingresar con tu direccion de email y contraseña en la siguiente direccion</p>
									</div>
									<div class="wrap-1100 center clear">
										<ul>
											<li>
												<p>Perfil: <a href="http://www.floresymaspremium.com/usuarios/perfil">http://www.floresymaspremium.com/usuarios/perfil</a></p>
											</li>
											<li>
												<p>Email: '.$_POST["user"].'</p>
											</li>
											<li>
												<p>Contraseña: '.$_POST["pass"].'</p>
											</li>
										</ul>
									</div>
									<div class="wrap-1100 center clear">
									<p>Al ingresar podras ver las opciones que tu cuenta te da, como por ejemplo:</p>
										<ul>
											<li>
												<p>Estado del pedido</p>
											</li>
											<li>
												<p>Direcciones de Envio</p>
											</li>
											<li>
												<p>Datos Personales, etc.</p>
											</li>
										</ul>										
									</div><br><br>
									<p>Los mejores deseos,</p>
									<p>Equipo</p>
									<p>FloresyMas Premium</p>
								</div>
						</div>
					</body>				
				</html>	
			';	
			$header="From:".$remitente."\nReplay-To:".$remitente."\n";
			$header=$header."X-Mailer:PHP/".phpversion()."\n";
			$header=$header."Mine-Version: 1.0\n";
			$header=$header."Content-Type: text/html";			
			mail("ventas@floresymas.co,".$_POST["email_de_quien_llama"]."",$asunto,$cuerpo,$header);	
			
			//header("Location: ver_imagen.php?
			//$id_usuario= mysql_insert_id($con);
			$id_usuario= mysql_insert_id($con);
			$id_pedidos = $_POST["id_pedidos"];
			echo "<script type='text/javascript'>
				window.location='../checkout/checkout.php?id_pedidos=$id_pedidos&id_usuario=$id_usuario';
			</script>";
		
			}

?>