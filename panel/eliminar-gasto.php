<?php
	session_start();
	if($_SESSION["usuario"]){	
	
	require_once("../conexion.php");
	$sql = "delete from gastos
			where 
			id_gastos = ".$_GET["id_gastos"]."";
	
	$res = mysql_query($sql,$con);
		echo "<script type=''>
				alert('El Gasto fue eliminado correctamente');
				window.location = 'gastos';
		
			  </script>";
			  
			  
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Por favor ingresar al sistema');
				window.location='login';
			  </script>";
	}

?>