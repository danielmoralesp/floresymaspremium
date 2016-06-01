<?php

	require_once("../../conexion.php");
		$sql = "insert into pedidos_plan_continuidad
		values
		(null,'".$_POST["color_de_rosas"]."','".$_POST["unidades_de_rosas"]."','".$_POST["fecha_de_pedido"]."','".$_POST["fecha_de_pago"]."','".$_POST["dia_de_inicio"]."','".$_POST["mes_de_inicio"]."','".$_POST["ano_de_inicio"]."','".$_POST["frecuencia_de_entrega"]."','".$_POST["descuento"]."','".$_POST["numero_productos"]."','".$_POST["ciudad_de_entrega"]."','".$_POST["dir_1_entrega"]."','".$_POST["dir_2_entrega"]."','".$_POST["dir_3_entrega"]."','".$_POST["barrio"]."','".$_POST["ayuda_envio"]."','".$_POST["nombre_de_quien_recibe"]."','".$_POST["telefono_de_quien_recibe"]."','".$_POST["estado_pedido"]."','".$_POST["id_usuario"]."','".$_POST["dir_4_entrega"]."','".$_POST["dir_5_entrega"]."','".$_POST["total"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		//header("Location: ver_imagen.php?
		$id_pedidos_plan_continuidad= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='detalle-del-pedido-recurrente.php?id_pedidos_plan_continuidad=$id_pedidos_plan_continuidad';
		</script>";
		

?>
		
