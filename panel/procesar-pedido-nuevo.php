<?php

	require_once("../conexion.php");
		$sql = "insert into pedido_manual
		values
		(null,'".$_POST["fecha_de_pedido"]."','".$_POST["fecha_de_pago"]."','".$_POST["fecha_de_entrega"]."','".$_POST["hora_de_entrega"]."','".$_POST["tipo_de_producto"]."','".$_POST["atendido_por"]."','".$_POST["nombre_del_producto"]."','".$_POST["precio_del_producto"]."','".$_POST["valor_del_envio"]."','".$_POST["total_compra"]."','".$_POST["metodo_de_contacto"]."','".$_POST["confirmacion_pago"]."','".$_POST["nombre_de_quien_llama"]."','".$_POST["telefonos_de_quien_llama"]."','".$_POST["email_de_quien_llama"]."','".$_POST["nombre_de_quien_envia"]."','".$_POST["metodo_pago"]."','".$_POST["nombre_de_quien_recibe"]."','".$_POST["telefono_de_quien_recibe"]."','".$_POST["direccion_de_entrega"]."','".$_POST["barrio_de_entrega"]."','".$_POST["sector_de_entrega"]."','".$_POST["mensaje_para_tarjeta"]."','".$_POST["observaciones_comentarios"]."','".$_POST["retroalimentacion"]."','".$_POST["entregado"]."','".$_POST["estado_pedido"]."','".$_POST["cedula"]."','".$_POST["con_sin_factura"]."','".$_POST["primera_vez"]."','".$_POST["referido"]."','".$_POST["fuente_trafico"]."','".$_POST["direccion_facturacion"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		//header("Location: ver_imagen.php?
		$id_pedido_manual= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='paso2.php?id_pedido_manual=$id_pedido_manual';
		</script>";		

?>