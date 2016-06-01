<?php
	session_start();
	if($_SESSION["usuario"]){
	
	
	require_once("../conexion.php");
	$sql = "delete from codigo_inventario
			where 
			id_codigo_inventario = ".$_GET["id_codigo_inventario"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES
	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del inventario fueron eliminados correctamente');
				window.location = 'listado-inventario';
		
			  </script>";
			  
			  
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado');
				window.location='login';
			  </script>";
	}

?>