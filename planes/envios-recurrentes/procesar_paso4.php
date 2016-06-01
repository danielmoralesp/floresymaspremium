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

		
		$id_pedidos_plan_continuidad= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'paso5.php?id_pedidos_plan_continuidad=".$_POST["id_pedidos_plan_continuidad"]."&id_usuario=".$_POST["id_usuario"]."';
			</script>";
		
?>	