<?php	
	require_once("../../conexion.php");
	$sql = "delete from producto
			where 
			id_producto = ".$_GET["id_producto"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del producto fueron eliminados correctamente');
				window.location = 'http://floresymaspremium.com/panel/catalogo/listado-productos.php?';		
			  </script>";
?>