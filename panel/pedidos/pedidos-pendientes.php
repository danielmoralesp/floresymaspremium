<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==2 or $_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pedidos Pendientes | FloresyMas.co</title>
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
    <?php require_once("../instancias/menu-dashboard3.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">      
        <div id="pad-wrapper">         
            <!-- orders table -->
            <div class="table-wrapper orders-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Pedidos Pendientes</h4>
                    </div>
                </div>
                <div class="row filter-block">
                    <div class="pull-right">
                        <div class="btn-group pull-right">
                            <a href="pedidos-pendientes"><button class="glow left large">Pendientes</button></a>
                            <a href="pedidos-realizados"><button class="glow middle large">Realizados</button></a>
                            <a href="pedidos-abortados"><button class="glow right large">Abortados</button></a>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-1">
                                    ID Pedido
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    Fecha Pedido | Pago | Entrega
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Nombre del Cliente
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Telefono del Cliente
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Nombre del Producto
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Ciudad de Entrega
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Barrio
                                </th>
								<th class="col-md-1">
                                    <span class="line"></span>
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$sql2 = "select * from pedidos where estado_pedido='pendiente' order by id_pedidos desc";   	
								$res2 = mysql_query($sql2,$con);
								while($reg2 = mysql_fetch_array($res2)){					
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="detalle-del-pedido.php?id_pedidos=<?php echo $reg2["id_pedidos"];?>">#<?php echo $reg2["id_pedidos"];?></a>
                                </td>
                                <td>
                                    <?php echo $reg2["fecha_de_pedido"];?> | <?php echo $reg2["fecha_de_pago"];?> | <?php echo $reg2["ano_de_entrega"];?>-<?php echo $reg2["mes_de_entrega"];?>-<?php echo $reg2["dia_de_entrega"];?>
                                </td>
								<td>
                                    <?php echo $reg2["nombre_de_quien_llama"];?>
                                </td>								
								<td>
                                    <span class="label label-warning"><?php echo $reg2["telefono_de_quien_llama"];?></span>
                                </td><td>
                                    <?php echo $reg2["nombre_del_producto"];?>
                                </td>
                                <td>
									<?php echo $reg2["ciudad_de_entrega"];?>
                                </td>
                                <td>
                                    <?php echo $reg2["barrio"];?>
                                </td>
								<td>
                                    <?php echo number_format($reg2["total"]);?>
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
	<?php
		}
	?>
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>
<?php
	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado, no tiene permisos o ingreso mal su password. Por favor ingrese de nuevo al sistema');
				window.location='../usuarios/login';
			  </script>";
	}	
?>