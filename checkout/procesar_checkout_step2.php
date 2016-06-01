<?php
	
	session_start();
	require_once("../conexion.php");
	$sql="select * from pedidos
	where id_pedidos = ".$_GET["id_pedidos"]."";
	$res = mysql_query($sql,$con);		
		
		
		if($reg = mysql_fetch_array($res)){			
		
		$sql2 = "UPDATE pedidos
		set 
		nombre_del_producto = '".$_POST["nombre_del_producto"]."',
		total = '".$_POST["total"]."',
		cantidad = '".$_POST["cantidad"]."',
		estado_pedido = '".$_POST["estado_pedido"]."',
		fecha_de_pedido = '".$_POST["fecha_de_pedido"]."',
		fecha_de_pago = '".$_POST["fecha_de_pago"]."',
		dia_de_entrega = '".$_POST["dia_de_entrega"]."',
		mes_de_entrega = '".$_POST["mes_de_entrega"]."',
		ano_de_entrega = '".$_POST["ano_de_entrega"]."',
		hora_de_entrega = '".$_POST["hora_de_entrega"]."',
		dir_1_entrega = '".$_POST["dir_1_entrega"]."',
		dir_2_entrega = '".$_POST["dir_2_entrega"]."',
		dir_3_entrega = '".$_POST["dir_3_entrega"]."',
		barrio = '".$_POST["barrio"]."',
		ayuda_envio = '".$_POST["ayuda_envio"]."',
		nombre_de_quien_envia = '".$_POST["nombre_de_quien_envia"]."',
		nombre_de_quien_recibe = '".$_POST["nombre_de_quien_recibe"]."',
		telefono_de_quien_recibe = '".$_POST["telefono_de_quien_recibe"]."',
		mensaje_para_tarjeta = '".$_POST["mensaje_para_tarjeta"]."',
		observaciones_comentarios = '".$_POST["observaciones_comentarios"]."',
		nombre_de_quien_llama = '".$_POST["nombre_de_quien_llama"]."',
		telefono_de_quien_llama = '".$_POST["telefono_de_quien_llama"]."',
		email_de_quien_llama = '".$_POST["email_de_quien_llama"]."',
		password_de_quien_llama = '".$_POST["password_de_quien_llama"]."',
		ciudad_de_entrega = '".$_POST["ciudad_de_entrega"]."',
		dir_4_entrega = '".$_POST["dir_4_entrega"]."',
		dir_5_entrega = '".$_POST["dir_5_entrega"]."',
		costo_de_envio = '".$_POST["costo_de_envio"]."',
		id_usuario = '".$_POST["id_usuario"]."',
		unidades_de_rosas = '".$_POST["unidades_de_rosas"]."',
		colores_de_rosas = '".$_POST["colores_de_rosas"]."'
		
		
		where
		id_pedidos = ".$_POST["id_pedidos"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);
		
		$id_pedidos = $_POST["id_pedidos"];
		$mi_carrito=$_SESSION['carrito'];				

			$remitente="FloresyMas.co <ventas@floresymas.co>";
			$asunto="FloresyMas.co Premium - Pedido # ".$id_pedidos;
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
									<h1>FloresyMas Premium - Pedido # '.$_POST["id_pedidos"].'</h1>
								</div>								
								<div class="wrap-1100 center clear">
								<table class="products" id="cart_table" style="text-align: center;">
									<thead>
										<tr>					
											<th class="align-left">Datos</th>
											<th class="align-left">Detalle del Pedido</th>					
										</tr>
									</thead>
									<tbody>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Estado del Pedido</td>
											<td class="description"> '.$_POST["estado_pedido"].' de confirmar el pago</td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Fecha de Entrega</td>
											<td class="description">'.$_POST["dia_de_entrega"].' - '.$_POST["mes_de_entrega"].' - '.$_POST["ano_de_entrega"].'</td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Hora de Entrega</td>
											<td class="description"> '.$_POST["hora_de_entrega"].' </td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Ciudad de Entrega</td>
											<td class="description"> '.$_POST["ciudad_de_entrega"].' </td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Direccion de Entrega</td>
											<td class="description"> '.$_POST["dir_1_entrega"].''   .$_POST["dir_2_entrega"]. ' #  '.$_POST["dir_3_entrega"].'  /  '.$_POST["dir_4_entrega"].  '' .$_POST["dir_5_entrega"]. '</td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Barrio</td>
											<td class="description"> '.$_POST["barrio"]. '</td>
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Informacion de Ayuda Envío</td>
											<td class="description"> '.$_POST["ayuda_envio"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Nombre de Quien Envia</td>
											<td class="description"> '.$_POST["nombre_de_quien_envia"]. '</td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Nombre de Quien Recibe</td>
											<td class="description">' .$_POST["nombre_de_quien_recibe"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Telefono de Quien Recibe</td>
											<td class="description"> '.$_POST["telefono_de_quien_recibe"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Mensaje Para Tarjeta</td>
											<td class="description"> '.$_POST["mensaje_para_tarjeta"].'</td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Observaciones o Comentarios</td>
											<td class="description"> '.$_POST["observaciones_comentarios"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Sus Nombres y Apellidos</td>
											<td class="description"> '.$_POST["nombre_de_quien_llama"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Sus Telefonos</td>
											<td class="description"> '.$_POST["telefono_de_quien_llama"].' </td>					
										</tr>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="description">Su Email</td>
											<td class="description"> '.$_POST["email_de_quien_llama"].' </td>					
										</tr>
									</tbody>
								</table>		 
							</div>
							<br>
							<br>
							<br>
							<div class="wrap-1100 center clear">
								<table class="products" id="cart_table" style="text-align: center;">
									<thead>
										<tr>
											<th colspan="2" class="align-left">Item</th>
											<th class="align-right">Unidades de Rosas</th>
											<th>Cantidad</th>
											<th class="align-right">Total</th>
											<th class="buttons"></th>
										</tr>
									</thead>			
									';  
									if(isset($mi_carrito)){
										$total=0;
										$subtotal_3=0;
										$total_impuesto=0;
										
											for($i=0;$i<count($mi_carrito);$i++){
												if($mi_carrito[$i]<>NULL){
													$subtotal= $mi_carrito[$i]['precio_del_producto']*$mi_carrito[$i]['cantidad']; 
													$impuesto= $subtotal-($subtotal/1.16);
													$subtotal_2= $subtotal+$impuesto;
													$total= $total+$subtotal;
													$subtotal_3=$subtotal_3+$subtotal;
													$total_impuesto=$total_impuesto+$impuesto;
													$foto_thumbnail = $mi_carrito[$i]['foto_thumbnail'];
													$nombre_del_producto = $mi_carrito[$i]['nombre_del_producto'];
													$cantidad = $mi_carrito[$i]['cantidad'];
													$subtotal_4 = $subtotal_3 - $total_impuesto;
													$unidades_de_rosas = $mi_carrito[$i]['unidades_de_rosas'];
													$colores_de_rosas = $mi_carrito[$i]['colores_de_rosas'];		
													
													//Calculo del Impuesto
													$iva=16/100;
													$valor_iva=$iva*$total;
													$valor_iva2=$total-$valor_iva;							
									$cuerpo.='
									<tbody>
										<tr class="product" data-id="131" data-price-per="15.0" data-key="131">
											<td class="name">
												<img alt="" src="http://www.floresymaspremium.com/panel/catalogo/img/thumbnail/'.$mi_carrito[$i]['foto_thumbnail'].'" width="81px" height="100px" />
											</td>
											<td class="description">
												'.$mi_carrito[$i]['nombre_del_producto'].'<br>
												<span>
													<img src="www.floresymaspremium.com/panel/img/colores/'.$mi_carrito[$i]['colores_de_rosas'].'.png" width="20px" height="20px"  / >									
												</span>
											</td>
											<td class="price-per money">
												'.$mi_carrito[$i]['unidades_de_rosas'].'
											</td>
											<td class="quantity">
												 '.$reg["cantidad"].'
											</td>
											<td class="price money">
												<div class="rel">
													<span class="amount">$'.number_format(round($subtotal)).'</span>	                                
												</div>
											</td>
										</tr>
									</tbody>
									';
												}	
											}																			
									$cuerpo.='	
									<tfoot id="footer">
										<tr>
											<td colspan="3" rowspan="2" class="upsell_section">											
											</td>
											<td colspan="2" rowspan="1" class="subtotal">
											<div class="rel">
												<div class="subtotal-text">
													<span class="label">Subtotal</span>
													<span class="money" id="subtotal">$'.number_format($total).'</span><br><br>	
												</div>
											</div>
											</td>
											<td class="buttons"></td>
										</tr>
									</tfoot>									
							</div>
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

		$id_usuario = $_POST["id_usuario"];
		$id_pedidos= $_POST["id_pedidos"];
		echo "<script type='text/javascript'>
				window.location = 'resumen_checkout.php?id_pedidos=$id_pedidos&id_usuario=$id_usuario';
			</script>";

		
?>	