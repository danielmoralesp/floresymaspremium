<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Listado Inventario | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <!-- bootstrap -->
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="../css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/icons.css" />
    <!-- libraries -->
    <link href="../css/lib/font-awesome.css" type="text/css" rel="stylesheet" />    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="../css/compiled/tables.css" type="text/css" media="screen" />
    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
     <!-- navbar -->
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard-catalogo.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">       
        <div id="pad-wrapper">                     
            <!-- orders table -->
            <div class="table-wrapper orders-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Listado de Productos</h4>
                    </div>
                </div>				
				<div class="row filter-block">
                    <div class="pull-right">
                        <div class="btn-group pull-right">
                            <a href="upload-producto"><button class="btn-flat warning new-product" >Upload Producto</button></a>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    ID Producto
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    Foto del Producto
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
									Producto Padre
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
									Tipo de Producto
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
                                    Nombre del Producto
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
                                    Color del producto
                                </th>
								<th class="col-md-3">
                                    <span class="line"></span>
                                    Numero de Unidades
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
									Precio del Producto
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    En Inventario?
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Disponible en 90 Minutos?
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    De Exportacion?
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
									Edición
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$sql2 = "select * from producto order by orden_importancia asc";
								$res2 = mysql_query($sql2,$con);
								while($reg2 = mysql_fetch_array($res2)){					
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="../../productos/producto.php?id_producto=<?php echo $reg2["id_producto"];?>">#<?php echo $reg2["id_producto"];?></a>
                                </td>
								<td>
                                    <img src="img/thumbnail/<?php echo $reg2["foto_thumbnail"];?>" width="50px" heigh="50px"/>
                                </td>	
								<td>
                                    <?php echo $reg2["producto_padre"];?>
                                </td>
								<td>
                                    <?php echo $reg2["tipo_de_producto"];?>
                                </td>
								<td>
                                    <?php echo $reg2["nombre_del_producto"];?>
                                </td>
								<td>
                                    <?php echo $reg2["colores_de_rosas"];?>
                                </td>
								<td>
                                    <?php echo $reg2["unidades_de_rosas"];?>
                                </td>
								<td>
                                    <?php echo $reg2["precio_del_producto"];?>
                                </td>								
								<td>
                                    <?php echo $reg2["en_inventario"];?>
                                </td>
								<td>
                                    <?php echo $reg2["menos_de_90_min"];?>
                                </td>
								<td>
                                    <?php echo $reg2["flor_exportacion"];?>
                                </td>
								<td>
                                    <a class="btn-flat info new-product" style="text-decoration:none" href="editar-producto.php?id_producto=<?php echo $reg2["id_producto"];?>">Editar</a>
                                </td>
                            </tr>
							<?php
								}
							?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>
    </div>
    <!-- end main container -->
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
	<?php
		}
	?>
</body>
</html>
<?php
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Por favor ingrese al Sistema');
				window.location='../usuarios/login';
			  </script>";
	}	
?>