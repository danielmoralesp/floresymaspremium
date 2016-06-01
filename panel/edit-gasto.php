<?php

	session_start();
	if($_SESSION["usuario"]){
	
	require_once("../conexion.php");
	$sql="select * from gastos
	where id_gastos = ".$_GET["id_gastos"]."";
	$res = mysql_query($sql,$con);
		
		if($reg = mysql_fetch_array($res)){
		
		$sql2 = "UPDATE gastos
		set 

		fecha_de_dato = '".$_POST["fecha_de_dato"]."',
		proveedor = '".$_POST["proveedor"]."',
		categoria = '".$_POST["categoria"]."',
		subcategoria = '".$_POST["subcategoria"]."',
		item = '".$_POST["item"]."',
		valor = '".$_POST["valor"]."',
		pagado_con = '".$_POST["pagado_con"]."'
		
		where
		id_gastos = ".$_POST["id_gastos"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);
		
		$id= mysql_insert_id($con);
		echo "<script type=''>
				alert('Los datos del Gasto fueron modificados correctamente');
				window.location = 'gastos';
		
			  </script>";			  
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Favor ingresar al sistema');
				window.location='login';
			  </script>";
	}

?>