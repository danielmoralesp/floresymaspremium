<?php

	session_start();
	if($_SESSION["usuario"]){	
	
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
		ciudad_de_entrega = '".$_POST["ciudad_de_entrega"]."'
		
		
		where
		id_pedidos = ".$_POST["id_pedidos"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);		

		
		$id_pedidos= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'detalle-del-pedido.php?id_pedidos=".$_POST["id_pedidos"]."';
			</script>";

			  
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado');
				window.location='index.php';
			  </script>";
	}
	
	
	
	


?>