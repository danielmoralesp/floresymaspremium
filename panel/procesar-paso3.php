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
		primera_vez = '".$_POST["primera_vez"]."',
		referido = '".$_POST["referido"]."',
		fuente_trafico = '".$_POST["fuente_trafico"]."',
		direccion_facturacion = '".$_POST["direccion_facturacion"]."'
		
		where
		id_pedido_manual = ".$_POST["id_pedido_manual"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);		

		
		$id_pedido_manual= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'paso4.php?id_pedido_manual=".$_POST["id_pedido_manual"]."';
			</script>";

		
?>