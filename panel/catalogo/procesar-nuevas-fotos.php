<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>

<?php

	$id_producto = $_GET["id_producto"];
	
	$foto_grande = $_FILES["foto_grande"]["name"];
	$temp = $_FILES["foto_grande"]["tmp_name"];
	$tamano = $_FILES["foto_grande"]["size"];
	$tipo = $_FILES["foto_grande"]["type"];
	
	$foto_thumbnail = $_FILES["foto_thumbnail"]["name"];
	$temp2 = $_FILES["foto_thumbnail"]["tmp_name"];
	$tamano2 = $_FILES["foto_thumbnail"]["size"];
	$tipo2 = $_FILES["foto_thumbnail"]["type"];


	
	//ahora validamos la extension o el tipo de archivo

	if($tipo == "image/png" or $tipo == "image/jpeg" or $tipo =="image/gif"){
		//**********************
		//ahora podemos subir el archivo al servidor
		switch($tipo){
			case 'image/png';
				$ext = ".png";
			break;
			case 'image/jpeg';
				$ext = ".jpg";
			break;
			case 'image/JPG';
				$ext = ".jpg";
			break;
			case 'image/gif';
				$ext = ".gif";
			break;
		}
		//$nombre_foto = $_POST["nom"].$ext;
		$nombre_foto = "adicional_grande_".$id_producto;
		$nombre_foto = str_replace(" ","_",$nombre_foto);
		$nombre_foto = $nombre_foto.$ext;
		copy($temp,"img/adicionales/grande/$nombre_foto");	
		
		
		//******************************
		
		
		if($tipo2 == "image/png" or $tipo2 == "image/jpeg" or $tipo2 =="image/gif"){
		//**********************
		//ahora podemos subir el archivo al servidor
		switch($tipo2){
			case 'image/png';
				$ext2 = ".png";
			break;
			case 'image/jpeg';
				$ext2 = ".jpg";
			break;
			case 'image/JPG';
				$ext2 = ".jpg";
			break;
			case 'image/gif';
				$ext2 = ".gif";
			break;
		}
		
		$nombre_foto2 = "adicional_thumbnail_".$id_producto;
		$nombre_foto2 = str_replace(" ","_",$nombre_foto2);
		$nombre_foto2 = $nombre_foto2.$ext2;
		copy($temp2,"img/adicionales/thumbnail/$nombre_foto2");
		
		//ahora guardamos en archivo en una tabla de la bd		
		
		
		$sql = "insert into fotos_adicionales
		values
		(null,'$nombre_foto','$nombre_foto2','".$_POST["foto_adicional_3"]."','".$_POST["foto_adicional_4"]."','".$_POST["foto_adicional_5"]."','".$_POST["foto_adicional_6"]."','".$_POST["foto_adicional_7"]."','".$_POST["foto_adicional_8"]."','$id_producto')		
		";
		
		$res = mysql_query($sql,$con);
		//header("Location: ver_imagen.php?
		echo "<script type='text/javascript'>
			window.location='listado-productos.php?id_producto=$id_producto';
		</script>";
		
		//******************************
		
		?>		
		
		
		<?php
		
		
		
		}
		//*********************
	}
	
		}
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado, favor ingresar');
				window.location='login';
			  </script>";
	}
	
	
	
	


?>