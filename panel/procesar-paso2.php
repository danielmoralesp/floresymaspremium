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
		confirmacion_pago = '".$_POST["confirmacion_pago"]."'		
		
		where
		id_pedido_manual = ".$_POST["id_pedido_manual"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);		

		
		$id_pedido_manual= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'paso3.php?id_pedido_manual=".$_POST["id_pedido_manual"]."';
			</script>";

		
?>	