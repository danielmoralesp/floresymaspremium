<?php
	session_start();
	/*
	Importante: la funcion session_start(); debe ir primero que cualquier codigo. 
	*/
	require_once("../conexion.php");	
	
	//******************************
	//Preguntamos si el usuario existe en la base de datos
	
	$sql ="SELECT email
	FROM usuarios
	WHERE email =  '".$_POST["email"]."'";
	
	$res=mysql_query($sql,$con);
	
	// pregunto si el usuario existe en la base de datos
	if(mysql_num_rows($res) == 0){
		echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["email"]." no existe en la base de datos');
				window.location='login';
			  </script>";
	}else{
		//*****************************************
		//Ahora preguntamos si el email y el password coinciden en la base de datos. 
		
		$consulta ="SELECT * 
		FROM usuarios
		WHERE email =  '".$_POST["email"]."'
		AND password =  '".$_POST["password"]."'";
		
		$result=mysql_query($consulta,$con);
		
		if(mysql_num_rows($result) == 0){
			echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["email"]." y el password no coinciden');
				window.location='login';
			  </script>";
		}else{
			//***************************************************
			//Ahora le damos acceso a nuestros contenidos restringidos
			$_SESSION["usuario"]=$_POST["email"];
			header("Location: ../catalog/upload");
			//***************************************************
		
		}	
		//*****************************************	
	}
?>