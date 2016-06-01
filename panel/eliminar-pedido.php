<?php
	session_start();
	if($_SESSION["usuario"]){
	
	
	require_once("../conexion.php");
	$sql = "delete from pedido_manual
			where 
			id_pedido_manual = ".$_GET["id_pedido_manual"]."";
	// PRUEBA SIEMPRE EL CODIGO DE CONSULTA EN EL SQL FRONT O EN PHPMYADMIN Y ASI VER QUE NO HAYAN ERRORES
	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('Los datos del producto fueron eliminados correctamente');
				window.location = 'pedido-nuevo';
		
			  </script>";
			  
			  
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado');
				window.location='login';
			  </script>";
	}

?>