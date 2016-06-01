<?php	
	require_once("../../conexion.php");
	$sql = "delete from pedidos
			where 
			id_pedidos = ".$_GET["id_pedidos"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del producto fueron eliminados correctamente');
				window.location = '../pedidos/pedidos';		
			  </script>";
?>