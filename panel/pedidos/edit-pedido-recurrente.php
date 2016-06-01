<?php
	
	require_once("../../conexion.php");
	$sql="select * from pedidos_plan_continuidad
	where id_pedidos_plan_continuidad = ".$_GET["id_pedidos_plan_continuidad"]."";
	$res = mysql_query($sql,$con);		
		
		
		if($reg = mysql_fetch_array($res)){			
		
		$sql2 = "UPDATE pedidos_plan_continuidad
		set 
		color_de_rosas = '".$_POST["color_de_rosas"]."',
		unidades_de_rosas = '".$_POST["unidades_de_rosas"]."',
		fecha_de_pedido = '".$_POST["fecha_de_pedido"]."',
		fecha_de_pago = '".$_POST["fecha_de_pago"]."',
		dia_de_inicio = '".$_POST["dia_de_inicio"]."',
		mes_de_inicio = '".$_POST["mes_de_inicio"]."',
		ano_de_inicio = '".$_POST["ano_de_inicio"]."',
		frecuencia_de_entrega = '".$_POST["frecuencia_de_entrega"]."',
		descuento = '".$_POST["descuento"]."',
		numero_productos = '".$_POST["numero_productos"]."',
		ciudad_de_entrega = '".$_POST["ciudad_de_entrega"]."',
		dir_1_entrega = '".$_POST["dir_1_entrega"]."',
		dir_2_entrega = '".$_POST["dir_2_entrega"]."',
		dir_3_entrega = '".$_POST["dir_3_entrega"]."',
		barrio = '".$_POST["barrio"]."',
		ayuda_envio = '".$_POST["ayuda_envio"]."',
		nombre_de_quien_recibe = '".$_POST["nombre_de_quien_recibe"]."',
		telefono_de_quien_recibe = '".$_POST["telefono_de_quien_recibe"]."',
		estado_pedido = '".$_POST["estado_pedido"]."',
		id_usuario = '".$_POST["id_usuario"]."',
		dir_4_entrega = '".$_POST["dir_4_entrega"]."',
		dir_5_entrega = '".$_POST["dir_5_entrega"]."',	
		total = '".$_POST["total"]."'	
		
		
		where
		id_pedidos_plan_continuidad = ".$_POST["id_pedidos_plan_continuidad"]."";
		
		}
		
		
		$res2 = mysql_query($sql2,$con);		
		$id_pedidos_plan_continuidad = $_POST["id_pedidos_plan_continuidad"];

		if($_POST["estado_pedido"]=='Realizado'){
			$remitente="FloresyMas.co <ventas@floresymas.co>";
			$asunto="Pago Confirmado y Pedido # ".$id_pedidos_plan_continuidad." en Produccion - Planes";
			//$cuerpo= file_get_contents('../../emails/email-pedido-realizado.php'); 
			$css1 = "<script src='http://www.floresymaspremium.com/assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js' type='text/javascript'></script>";
			$css2 = "<link href='http://www.floresymaspremium.com/assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css' media='screen' rel='stylesheet' type='text/css' />";
			$css3 = "<link href='http://www.floresymaspremium.com/assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css' media='screen' rel='stylesheet' type='text/css' />";
			$css4 = "<link href='http://www.floresymaspremium.com/assets/desktop/cart/base-8fa6ad487aea51d1cd6ecaf9db5eb33d.css' media='screen' rel='stylesheet' type='text/css' />";
			
			$cuerpo='
				<html>
					<head>
						'.$css1.'
						'.$css2.'
						'.$css3.'
						'.$css4.'
					</head>
					<body>
						<div class="global-wrapper">
							<div id="flashes">
							</div>
								<div class="cart" id="view_edit_cart">
									<div class="wrap-1100 center clear" id="heading">
										<h1>Pago Confirmado y Pedido # '.$_POST["id_pedidos_plan_continuidad"].' en Produccion - Planes</h1>
									</div>
									<div>
										<p>El Pago de su Pedido #  '.$_POST["id_pedidos_plan_continuidad"].' ha sido confirmado. Gracias por preferir a FloresyMas Premium!</p>
										<p>
											Su producto ha entrado en produccion para ser entregado el '.$_POST["dia_de_inicio"].'-'.$_POST["mes_de_inicio"].'-'.$_POST["ano_de_inicio"].'
											Le recomendamos ingresar a su cuenta de perfil con FloresyMas Premium para conocer el estado de entrega de su producto, quien lo recibio y que 
											observaciones hubo al momento de la entrega. 										
										</p>
									</div>
									<div class="wrap-1100 center clear">
										<p>Recuerde que para ingresar a su cuenta de perfil debe hacerlo en el siguiente enlace</p>
										<ul>
											<li>
												<p>Perfil: <a href="http://www.floresymaspremium.com/usuarios/perfil">http://www.floresymaspremium.com/usuarios/perfil</a></p>
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
			
			mail("ventas@floresymas.co",$asunto,$cuerpo,$header);		
			
		}

		
		$id_pedidos_plan_continuidad= $_POST["id_pedidos_plan_continuidad"];
		echo "<script type='text/javascript'>
				window.location = 'detalle-del-pedido-recurrente.php?id_pedidos_plan_continuidad=$id_pedidos_plan_continuidad';
			</script>";


?>