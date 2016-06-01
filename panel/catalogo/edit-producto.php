<?php


	require_once("../../conexion.php");
	$sql="select * from producto
	where id_producto = ".$_GET["id_producto"]."";
	$res = mysql_query($sql,$con);
	
	
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
		$nombre_foto = $_POST["nombre_del_producto"].$_POST["colores_de_rosas"].$_POST["unidades_de_rosas"];
		$nombre_foto = str_replace(" ","_",$nombre_foto);
		$nombre_foto = $nombre_foto.$ext;
		copy($temp,"img/grande/$nombre_foto");	
		
		
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
		
		$nombre_foto2 = $_POST["nombre_del_producto"].$_POST["colores_de_rosas"].$_POST["unidades_de_rosas"];
		$nombre_foto2 = str_replace(" ","_",$nombre_foto2);
		$nombre_foto2 = $nombre_foto2.$ext2;
		copy($temp2,"img/thumbnail/$nombre_foto2");
		
		//ahora guardamos en archivo en una tabla de la bd
		
		
		
		if($reg = mysql_fetch_array($res)){
		
			

		
		//ahora guardamos en archivo en una tabla de la bd
		
		$sql2 = "UPDATE producto
		set 
		nombre_del_producto = '".$_POST["nombre_del_producto"]."',
		precio_del_producto = '".$_POST["precio_del_producto"]."',
		orden_importancia = '".$_POST["orden_importancia"]."',
		tipo_de_producto = '".$_POST["tipo_de_producto"]."',
		colores_de_rosas = '".$_POST["colores_de_rosas"]."',
		unidades_de_rosas = '".$_POST["unidades_de_rosas"]."',
		tamano_del_producto = '".$_POST["tamano_del_producto"]."',
		en_inventario = '".$_POST["en_inventario"]."',
		producto_incluye = '".$_POST["producto_incluye"]."',
		ocasion_del_producto = '".$_POST["ocasion_del_producto"]."',		
		foto_grande = '$nombre_foto',
		foto_thumbnail = '$nombre_foto2',
		descripcion_del_producto = '".$_POST["descripcion_del_producto"]."',		
		menos_de_90_min = '".$_POST["menos_de_90_min"]."',
		producto_padre = '".$_POST["producto_padre"]."',
		flor_exportacion = '".$_POST["flor_exportacion"]."'
		
		
		where
		id_producto = ".$_POST["id_producto"]."";
		
		}
		
		$res2 = mysql_query($sql2,$con);
		//header("Location: ver_imagen.php?
		$id= mysql_insert_id($con);
		echo "<script type=''>
				alert('Los datos del producto fueron modificados correctamente');
				window.location = 'listado-productos.php?id_producto=".$_GET["id_producto"]."';
		
			  </script>";
			  
		
		//******************************
		
		?>
				
		
		<?php
		
		
		
		}
		//*********************
	}else{
		?>
		
		el archivo subido solo puede ser jpg, png o gif<br>		
		<input type="button" value="volver" title="volver" onclick="history.back()"/>
		
		<?php
	}

	
	


?>