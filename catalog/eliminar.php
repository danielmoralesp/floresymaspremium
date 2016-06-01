<?php
	session_start();
	if($_SESSION["usuario"]){	
	
	require_once("../conexion.php");
	$sql = "delete from producto
			where 
			id_producto = ".$_GET["id_producto"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES
	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del producto fueron eliminados correctamente');
				window.location = 'upload';
		
			  </script>";
			  
			  
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado, Favor ingresar');
				window.location='login';
			  </script>";
	}

?>