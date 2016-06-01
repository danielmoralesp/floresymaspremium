<?php

	require_once("../conexion.php");		
		
		$sql = "insert into pedidos
		values
		(null,'".$_POST["nombre_del_producto"]."','".$_POST["total"]."','".$_POST["cantidad"]."','".$_POST["estado_pedido"]."','".$_POST["fecha_de_pedido"]."','".$_POST["fecha_de_pago"]."','".$_POST["dia_de_entrega"]."','".$_POST["mes_de_entrega"]."','".$_POST["ano_de_entrega"]."','".$_POST["hora_de_entrega"]."','".$_POST["dir_1_entrega"]."','".$_POST["dir_2_entrega"]."','".$_POST["dir_3_entrega"]."','".$_POST["barrio"]."','".$_POST["ayuda_envio"]."','".$_POST["nombre_de_quien_envia"]."','".$_POST["nombre_de_quien_recibe"]."','".$_POST["telefono_de_quien_recibe"]."','".$_POST["mensaje_para_tarjeta"]."','".$_POST["observaciones_comentarios"]."','".$_POST["nombre_de_quien_llama"]."','".$_POST["telefono_de_quien_llama"]."','".$_POST["email_de_quien_llama"]."','".$_POST["password_de_quien_llama"]."','".$_POST["ciudad_de_entrega"]."','".$_POST["dir_4_entrega"]."','".$_POST["dir_5_entrega"]."','".$_POST["costo_de_envio"]."','".$_POST["id_usuario"]."','".$_POST["unidades_de_rosas"]."','".$_POST["colores_de_rosas"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		
		//header("Location: ver_imagen.php?
		$id_pedidos= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='../usuarios/crear-usuario.php?id_pedidos=$id_pedidos';
		</script>";		

?>
		
