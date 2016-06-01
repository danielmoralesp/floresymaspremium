<?php
	
	require_once("../conexion.php");
	$sql="select * from pedido_manual
	where id_pedido_manual = ".$_GET["id_pedido_manual"]."";
	$res = mysql_query($sql,$con);		
		
		
		if($reg = mysql_fetch_array($res)){			
		
		$sql2 = "UPDATE pedido_manual
		set 
		fecha_de_pedido = '".$_POST["fecha_de_pedido"]."',
		fecha_de_pago = '".$_POST["fecha_de_pago"]."',
		fecha_de_entrega = '".$_POST["fecha_de_entrega"]."',
		hora_de_entrega = '".$_POST["hora_de_entrega"]."',
		tipo_de_producto = '".$_POST["tipo_de_producto"]."',
		atendido_por = '".$_POST["atendido_por"]."',
		nombre_del_producto = '".$_POST["nombre_del_producto"]."',
		precio_del_producto = '".$_POST["precio_del_producto"]."',
		valor_del_envio = '".$_POST["valor_del_envio"]."',
		total_compra = '".$_POST["total_compra"]."',
		metodo_pago = '".$_POST["metodo_pago"]."',
		confirmacion_pago = '".$_POST["confirmacion_pago"]."',
		nombre_de_quien_llama = '".$_POST["nombre_de_quien_llama"]."',
		telefonos_de_quien_llama = '".$_POST["telefonos_de_quien_llama"]."',
		email_de_quien_llama = '".$_POST["email_de_quien_llama"]."',
		nombre_de_quien_envia = '".$_POST["nombre_de_quien_envia"]."',
		metodo_de_contacto = '".$_POST["metodo_de_contacto"]."',
		cedula = '".$_POST["cedula"]."',
		con_sin_factura = '".$_POST["con_sin_factura"]."',
		nombre_de_quien_recibe = '".$_POST["nombre_de_quien_recibe"]."',
		telefono_de_quien_recibe = '".$_POST["telefono_de_quien_recibe"]."',
		direccion_de_entrega = '".$_POST["direccion_de_entrega"]."',
		barrio_de_entrega = '".$_POST["barrio_de_entrega"]."',
		sector_de_entrega = '".$_POST["sector_de_entrega"]."',
		mensaje_para_tarjeta = '".$_POST["mensaje_para_tarjeta"]."',
		observaciones_comentarios = '".$_POST["observaciones_comentarios"]."',
		retroalimentacion = '".$_POST["retroalimentacion"]."',
		entregado = '".$_POST["entregado"]."',
		estado_pedido = '".$_POST["estado_pedido"]."',
		primera_vez = '".$_POST["primera_vez"]."',
		referido = '".$_POST["referido"]."',
		fuente_trafico = '".$_POST["fuente_trafico"]."',
		direccion_facturacion = '".$_POST["direccion_facturacion"]."'
		
		where
		id_pedido_manual = ".$_POST["id_pedido_manual"]."";
		
		
		
		$res2 = mysql_query($sql2,$con);

		$pedido = '
		<html>
			<title>Resumen Pedido | FloresyMas.co</title>
			<head></head>
			<body>
				<div class="content">
					<div id="pad-wrapper">
						
						<!-- products table-->
						<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
						<div class="table-wrapper products-table section">
							<div class="row head">
								<div class="col-md-12">
									<h4>Resumen de Pedido | Paso 1</h4>
								</div>
							</div>
							<div class="row">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-md-6">                                    
												Datos
											</th>
											<th class="col-md-6">
												<span class="line"></span>Descripción
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- row -->
										<tr class="first">
											<td class="description">
												Fecha de Pedido
											</td>
											<td class="description">
												'.$_POST["fecha_de_pedido"].'												
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Fecha de Pago
											</td>
											<td class="description">
												'.$_POST["fecha_de_pago"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Fecha de Entrega
											</td>
											<td class="description">
												'.$_POST["fecha_de_entrega"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Hora de Entrega
											</td>
											<td class="description">
												'.$_POST["hora_de_entrega"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Tipo de Producto
											</td>
											<td class="description">
												'.$_POST["tipo_de_producto"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Atendido Por
											</td>
											<td class="description">
												'.$_POST["atendido_por"].'
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- products table-->
						<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
						<div class="table-wrapper products-table section">
							<div class="row head">
								<div class="col-md-12">
									<h4>Resumen de Pedido | Paso 2</h4>
								</div>
							</div>

							<div class="row filter-block"></div>

							<div class="row">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-md-6">                                    
												Datos
											</th>
											<th class="col-md-6">
												<span class="line"></span>Descripción
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- row -->			
										<tr class="first">
											<td class="description">
												Nombre del Producto
											</td>
											<td class="description">
												'.$_POST["nombre_del_producto"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Precio del Producto
											</td>
											<td class="description">
												'.$_POST["precio_del_producto"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Valor el Envio
											</td>
											<td class="description">
												'.$_POST["valor_del_envio"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Total Compra
											</td>
											<td class="description">
												'.$_POST["total_compra"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Metodo de Contacto
											</td>
											<td class="description">
												'.$_POST["metodo_de_contacto"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Confirmacion de Pago
											</td>
											<td class="description">
												'.$_POST["confirmacion_pago"].'
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- products table-->
						<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
						<div class="table-wrapper products-table section">
							<div class="row head">
								<div class="col-md-12">
									<h4>Resumen de Pedido | Paso 3</h4>
								</div>
							</div>

							<div class="row filter-block"></div>

							<div class="row">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-md-6">                                    
												Datos
											</th>
											<th class="col-md-6">
												<span class="line"></span>Descripción
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- row -->			
										<tr class="first">
											<td class="description">
												Nombre de Quien LLama
											</td>
											<td class="description">
												'.$_POST["nombre_de_quien_llama"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Cedula de Quien LLama
											</td>
											<td class="description">
												'.$_POST["cedula"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Teléfono de Quien LLama
											</td>
											<td class="description">
												'.$_POST["telefonos_de_quien_llama"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Email de Quien LLama
											</td>
											<td class="description">
												'.$_POST["email_de_quien_llama"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Direccion de Facturacion
											</td>
											<td class="description">
												'.$_POST["direccion_facturacion"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Nombre de Quien Envia
											</td>
											<td class="description">
												'.$_POST["nombre_de_quien_envia"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Metodo de Pago
											</td>
											<td class="description">
												'.$_POST["metodo_pago"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Con o sin Factura?
											</td>
											<td class="description">
												'.$_POST["con_sin_factura"].'
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- products table-->
						<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
						<div class="table-wrapper products-table section">
							<div class="row head">
								<div class="col-md-12">
									<h4>Resumen de Pedido | Paso 4</h4>
								</div>
							</div>

							<div class="row filter-block"></div>

							<div class="row">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-md-6">                                    
												Datos
											</th>
											<th class="col-md-6">
												<span class="line"></span>Descripción
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- row -->
										<tr class="first">
											<td class="description">
												Nombre de Quien Recibe
											</td>
											<td class="description">
												'.$_POST["nombre_de_quien_recibe"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Telefono de Quien Recibe
											</td>
											<td class="description">
												'.$_POST["telefono_de_quien_recibe"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Direccion de Entrega
											</td>
											<td class="description">
												'.$_POST["direccion_de_entrega"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Barrio de Entrega
											</td>
											<td class="description">
												'.$_POST["barrio_de_entrega"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Sector de Entrega
											</td>
											<td class="description">
												'.$_POST["sector_de_entrega"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Mensaje de la Tarjeta
											</td>
											<td class="description">
												'.$_POST["mensaje_para_tarjeta"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Observaciones | Comentarios
											</td>
											<td class="description">
												'.$_POST["observaciones_comentarios"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Retroalimentación
											</td>
											<td class="description">
												'.$_POST["retroalimentacion"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Entregado o No?
											</td>
											<td class="description">
												'.$_POST["entregado"].'
											</td>
										</tr>
										<tr class="first">
											<td class="description">
												Estado de Pedido
											</td>
											<td class="description">
												'.$_POST["estado_pedido"].'
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>						
					</div>
				</div>			
			</body>	
		</html>
		
		'
?>

<?php
		$para  = ''.$_POST["email_de_quien_llama"].'' . ', '; // atención a la coma
		$para .= 'ventas@floresymas.co';

		// subject
		$titulo = 'Su Pedido con FloresyMas.co';

		// message
		$mensaje = $pedido;

		// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Cabeceras adicionales
		//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
		$cabeceras .= 'From: FloresyMas.co <ventas@floresymas.co>' . "\r\n";
		//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
		//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

		// Mail it
		mail($para, $titulo, $mensaje, $cabeceras);		
			
		}		
?>
<?php			
		$id_pedido_manual= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'resumen-pedido.php?id_pedido_manual=".$_POST["id_pedido_manual"]."';
			</script>";		
?>