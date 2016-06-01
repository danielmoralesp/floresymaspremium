<?php	
	require_once("../../conexion.php");
	$sql = "delete from pedidos_plan_continuidad
			where 
			id_pedidos_plan_continuidad = ".$_GET["id_pedidos_plan_continuidad"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del producto fueron eliminados correctamente');
				window.location = '../pedidos/pedidos-recurrentes';		
			  </script>";
?>