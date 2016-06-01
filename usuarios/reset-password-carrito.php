<?php
	require_once("../conexion.php");
	
	$id_pedidos=$_GET["id_pedidos"];
	
		$sql2 ="SELECT user
			FROM usuarios
			WHERE user =  '".$_POST["user"]."'";
			
			$res2=mysql_query($sql2,$con);
			
			// pregunto si el usuario existe en la base de datos
			if(mysql_num_rows($res2) == $_POST["user"]){
				
				echo "<script type='text/javascript'>
						alert('El usuario ".$_POST["user"]." no existe en la base de datos');
						window.location='forgot-password-carrito?id_pedidos=".$_GET["id_pedidos"]."';
					  </script>";
			}else{	
			
		
			$remitente="FloresyMas.co <ventas@floresymas.co>";
			$asunto="Usuario y Password - FloresyMas Premium";
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
										<h1>Usuario y Password - FloresyMas Premium</h1>
									</div>
									<div>
										<p>Bienvenido de nuevo '.$_POST["user"].' y gracias por regresar a FloresyMas Premium!</p>
										<p>A continuacion le recordamos su Usuario y Contraseña, recuerde guardarla en un lugar seguro</p>
									</div>
									<div class="wrap-1100 center clear">
										<ul>
											<li>
												<p>Ingrese al siguiente enlace para continuar con la compra:</p>
											</li>
											<li>
												<p>Login: <a href="http://www.floresymaspremium.com/usuarios/login.php?id_pedidos='.$id_pedidos.'">http://www.floresymaspremium.com/usuarios/login</a></p>
											</li>
											<li>
												<p>Email: '.$_POST["user"].'</p>
											</li>											
											';  
												$user= $_POST["user"];
												$sql3 = "select * from usuarios where user='$user' ";   	
												$res3 = mysql_query($sql3,$con);
												if($reg3 = mysql_fetch_array($res3)){	
											$cuerpo.='											
											<li>
												<p>Contraseña: '.$reg3["pass"].'</p>
											</li>
											'; 
												}
											$cuerpo.='
										</ul>
									</div>
									<div class="wrap-1100 center clear">
									<p>Tambien puede ingresar a su Perfil y cambiar la contraseña:</p>
										<ul>
											<li>
												<p>Perfil: <a href="http://www.floresymaspremium.com/usuarios/perfil">http://www.floresymaspremium.com/usuarios/perfil</a></p></p>
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
			mail("ventas@floresymas.co,".$_POST["user"]."",$asunto,$cuerpo,$header);	
		
			//header("Location: ver_imagen.php?
			//$id_usuario= mysql_insert_id($con);
			$id_usuario= mysql_insert_id($con);
			echo "<script type='text/javascript'>
						alert('Ha sido enviada su contrasena al correo ".$_POST["user"].". Revisela e ingrese de nuevo');
						window.location='login.php?id_pedidos=$id_pedidos';
					  </script>";
			
			}

?>