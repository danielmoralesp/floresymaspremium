<?php

	session_start();
	if($_SESSION["usuario"]){

	require_once("../conexion.php");
		$sql = "insert into funnels
		values
		(null,'".$_POST["fecha_de_dato"]."','".$_POST["numero_de_impresiones"]."','".$_POST["numero_de_clics"]."','".$_POST["costo_de_adwords"]."','".$_POST["tipo_de_producto"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		$id= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='funnels';
		</script>";
		
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Favor ingresar al sistema');
				window.location='login';
			  </script>";
	}
	
?>