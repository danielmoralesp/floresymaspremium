<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	$sql = "select * from pedido_manual where estado_pedido='abortado' order by id_pedido_manual desc";   
	
		$res = mysql_query($sql,$con);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Emails de  Pendientes | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/tables.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

     <!-- navbar -->
    <?php require_once("header.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php require_once("menu-dashboard.php"); ?>
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
                            <a href="emails-pendientes"><button class="glow left large">Pendientes</button></a>
                            <a href="emails-realizados"><button class="glow middle large">Realizados</button></a>
                            <a href="emails-abortados"><button class="glow right large">Abortados</button></a>
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
                                    Nombre
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Teléfono
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Producto
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Email
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Primera Vez
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Referido
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Fuente de Trafico
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
							<?php	
								while($reg = mysql_fetch_array($res)){					
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="detalle-del-pedido.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>">#<?php echo $reg["id_pedido_manual"];?></a>
                                </td>
                                <td>
                                    <?php echo $reg["fecha_de_pedido"];?> | <?php echo $reg["fecha_de_pago"];?> | <?php echo $reg["fecha_de_entrega"];?> 
                                </td>
                                <td>
                                    <a href="detalle-del-pedido.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>"><?php echo $reg["nombre_de_quien_llama"];?></a>
                                </td>
                                <td>
                                    <?php echo $reg["telefonos_de_quien_llama"];?>
                                </td>
                                <td>
                                    <?php echo $reg["nombre_del_producto"];?>
                                </td>
								<td>
                                   <span class="label label-danger"> <?php echo $reg["email_de_quien_llama"];?></span>
                                </td>
                                <td>
                                    <?php echo $reg["primera_vez"];?>
                                </td>
								 <td>
                                    <?php echo $reg["referido"];?>
                                </td>
								<td>
                                    <?php echo $reg["fuente_trafico"];?>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
<?php

	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Por favor ingrese al Sistema');
				window.location='login';
			  </script>";
	}
	
?>