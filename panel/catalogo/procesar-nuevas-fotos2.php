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
	$nombre_foto = $_POST["foto_adicional_1"];
	$nombre_foto2 = $_POST["foto_adicional_2"];
	
	$foto_grande2 = $_FILES["foto_grande2"]["name"];
	$temp3 = $_FILES["foto_grande2"]["tmp_name"];
	$tamano3 = $_FILES["foto_grande2"]["size"];
	$tipo3 = $_FILES["foto_grande2"]["type"];
	
	$foto_thumbnail2 = $_FILES["foto_thumbnail2"]["name"];
	$temp4 = $_FILES["foto_thumbnail2"]["tmp_name"];
	$tamano4 = $_FILES["foto_thumbnail2"]["size"];
	$tipo4 = $_FILES["foto_thumbnail2"]["type"];


	
	//FOTOS ADICIONALES 3
				if($tipo3 == "image/png" or $tipo3 == "image/jpeg" or $tipo3 =="image/gif"){
				//**********************
				//ahora podemos subir el archivo al servidor
				switch($tipo3){
					case 'image/png';
						$ext3 = ".png";
					break;
					case 'image/jpeg';
						$ext3 = ".jpg";
					break;
					case 'image/JPG';
						$ext3 = ".jpg";
					break;
					case 'image/gif';
						$ext3 = ".gif";
					break;
				}
				//$nombre_foto = $_POST["nom"].$ext;
				$nombre_foto3 = "adicional_grande_2".$id_producto;
				$nombre_foto3 = str_replace(" ","_",$nombre_foto3);
				$nombre_foto3 = $nombre_foto3.$ext3;
				copy($temp3,"img/adicionales/grande/$nombre_foto3");
		
		
		//******************************
		
		
		//FOTOS ADICIONALES 4
					if($tipo4 == "image/png" or $tipo4 == "image/jpeg" or $tipo4 =="image/gif"){
					//**********************
					//ahora podemos subir el archivo al servidor
					switch($tipo4){
						case 'image/png';
							$ext4 = ".png";
						break;
						case 'image/jpeg';
							$ext4 = ".jpg";
						break;
						case 'image/JPG';
							$ext4 = ".jpg";
						break;
						case 'image/gif';
							$ext4 = ".gif";
						break;
					}

					
					$nombre_foto4 = "adicional_thumbnail_2".$id_producto;
					$nombre_foto4 = str_replace(" ","_",$nombre_foto4);
					$nombre_foto4 = $nombre_foto4.$ext4;
					copy($temp4,"img/adicionales/thumbnail/$nombre_foto4");
		
		//ahora guardamos en archivo en una tabla de la bd		
		
		
		$sql = "insert into fotos_adicionales
		values
		(null,'$nombre_foto','$nombre_foto2','$nombre_foto3','$nombre_foto4','$nombre_foto5','$nombre_foto6','$nombre_foto7','$nombre_foto8','$id_producto')		
		";

		/*$sql = "UPDATE fotos_adicionales
		set 
		foto_adicional_1 = '".$_POST["foto_adicional_1"]."',
		foto_adicional_2 = '".$_POST["foto_adicional_2"]."',
		foto_adicional_3 = '".$_POST["nombre_foto3"]."',
		foto_adicional_4 = '".$_POST["nombre_foto4"]."',
		foto_adicional_5 = '".$_POST["foto_adicional_5"]."',
		foto_adicional_6 = '".$_POST["foto_adicional_6"]."',
		foto_adicional_7 = '".$_POST["foto_adicional_7"]."',
		foto_adicional_8 = '".$_POST["foto_adicional_8"]."',
		id_producto = '$id_producto'

		
		
		where
		id_fotos_adicionales = ".$_POST["id_fotos_adicionales"]."";
		
		}

		*/
		
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