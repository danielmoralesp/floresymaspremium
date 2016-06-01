<?php

	require_once("../conexion.php");
		$sql = "insert into codigo_inventario
		values
		(null,'".$_POST["codigo_inventario"]."','".$_POST["unidades_codigo_inventario"]."')		
		";
		
		$res = mysql_query($sql,$con);
		
		//header("Location: ver_imagen.php?
		$id_codigo_inventario= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='listado-inventario.php?id_codigo_inventario=$id_codigo_inventario';
		</script>";		

?>