<?php
	session_start();
	if($_SESSION["usuario"]){

	require_once("../conexion.php");
	
	$foto_grande = $_FILES["foto_grande"]["name"];
	$temp = $_FILES["foto_grande"]["tmp_name"];
	$tamano = $_FILES["foto_grande"]["size"];
	$tipo = $_FILES["foto_grande"]["type"];
	
	$foto_thumbnail = $_FILES["foto_thumbnail"]["name"];
	$temp2 = $_FILES["foto_thumbnail"]["tmp_name"];
	$tamano2 = $_FILES["foto_thumbnail"]["size"];
	$tipo2 = $_FILES["foto_thumbnail"]["type"];

	
	/*Ahora validamos que el tamaño es el que necesitamos*/
	
	$kilobytes = $tamano/1024; // con esto tenemos la cantidad en kilobytes "kb"
	//$megabytes = $kilobytes/1024;
	if($kilobytes > 600){
		?>		
		el archivo subido supera los 600kb <br>		
		<input type="button" value="volver" title="Volver a Cargar" onclick="history.back()"/>
		<?php
	}
	
	$kilobytes2 = $tamano2/1024; // con esto tenemos la cantidad en kilobytes "kb"
	//$megabytes = $kilobytes/1024;
	if($kilobytes2 > 600){
		?>		
		el archivo subido supera los 600kb <br>		
		<input type="button" value="volver" title="Volver a Cargar" onclick="history.back()"/>
		<?php
	}
	
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
		$nombre_foto = $_POST["nombre_del_producto"];
		$nombre_foto = str_replace(" ","_",$nombre_foto);
		$nombre_foto = $nombre_foto.$ext;
		copy($temp,"img/$nombre_foto");	
		
		
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
		
		$nombre_foto2 = $_POST["nombre_del_producto"];
		$nombre_foto2 = str_replace(" ","_",$nombre_foto2);
		$nombre_foto2 = $nombre_foto2.$ext2;
		copy($temp2,"img/thumbnail/$nombre_foto2");
		
		//ahora guardamos en archivo en una tabla de la bd
		
		$sql = "insert into producto
		values
		(null, '".$_POST["nombre_del_producto"]."','".$_POST["precio_del_producto"]."','".$_POST["orden_importancia"]."','".$_POST["tipo_de_producto"]."','".$_POST["colores_de_rosas"]."','".$_POST["unidades_de_rosas"]."','".$_POST["tamano_del_producto"]."','".$_POST["en_inventario"]."','".$_POST["producto_incluye"]."','".$_POST["ocasion_del_producto"]."','".$_POST["descripcion_del_producto"]."','$nombre_foto','$nombre_foto2')		
		";
		
		$res = mysql_query($sql,$con);
		//header("Location: ver_imagen.php?
		$id= mysql_insert_id($con);
		echo "<script type='text/javascript'>
			window.location='ver-producto.php?id_producto=$id';
		</script>";
		
		//******************************
		
		?>		
		
		
		<?php
		
		
		
		}
		//*********************
	}else{
		?>
		
		El archivo subido solo puede ser jpg, png o gif<br>		
		<input type="button" value="volver" title="Volver a Cargar" onclick="history.back()"/>
		
		<?php
	}
	
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado, favor ingresar');
				window.location='login';
			  </script>";
	}
	
	
	
	


?>