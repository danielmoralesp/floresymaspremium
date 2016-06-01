<?php

	session_start();
	if($_SESSION["usuario"]){

	require_once("../conexion.php");
		$sql = "insert into gastos
		values
		(null,'".$_POST["fecha_de_dato"]."','".$_POST["proveedor"]."','".$_POST["categoria"]."','".$_POST["subcategoria"]."','".$_POST["item"]."','".$_POST["valor"]."','".$_POST["pagado_con"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		$id= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='gastos';
		</script>";
		
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Favor ingresar al sistema');
				window.location='login';
			  </script>";
	}
	
?>