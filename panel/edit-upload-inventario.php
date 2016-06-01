<?php

	session_start();
	if($_SESSION["usuario"]){	
	
	require_once("../conexion.php");
	$sql="select * from codigo_inventario
	where id_codigo_inventario = ".$_GET["id_codigo_inventario"]."";
	$res = mysql_query($sql,$con);	


		//me traigo el valor actual
		
		
		
		//me traigo el nuevo valor
		
		
		
		
		
		// sumo el valor actual + nuevo valor
		
		
		//edito en base de datos
		
		
		if($reg = mysql_fetch_array($res)){			
		
		$sql2 = "UPDATE codigo_inventario
		set 
		codigo_inventario = '".$_POST["codigo_inventario"]."',
		unidades_codigo_inventario = '".$_POST["unidades_codigo_inventario"]."'

		
		
		where
		id_codigo_inventario = ".$_POST["id_codigo_inventario"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);		

		
		$id_pedidos= mysql_insert_id($con);
		echo "<script type='text/javascript'>
				window.location = 'listado-inventario.php?id_codigo_inventario=".$_POST["id_codigo_inventario"]."';
			</script>";

			  
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado');
				window.location='index.php';
			  </script>";
	}
	
	
	
	


?>