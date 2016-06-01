<?php
	session_start();
	if($_SESSION["usuario"]){
	
	require_once("../conexion.php");
	$id_pedido_manual = $_GET["id_pedido_manual"];
	$sql="select * from pedido_manual where id_pedido_manual='".$_GET["id_pedido_manual"]."'	"; 
	$res = mysql_query($sql,$con);

		if($reg = mysql_fetch_array($res)){

	?>	
<!DOCTYPE html>
<html>
<head>
	<title>Resumen Pedido | FloresyMas.co</title>
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
	<script language="javascript" type="text/javascript">
		function eliminar(id){
			if(confirm("Realmente desea eliminar el producto?")){
				window.location="eliminar-pedido.php?id_pedido_manual="+id;
			}
		}
	</script>
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
            
            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Resumen de Pedido | Paso 1</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                        
                        <a class="btn-flat info new-product" href="editar-pedido.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>">Editar</a>
						<a class="btn-flat warning new-product" href="javascript:void(0)" onClick="eliminar('<?php echo $reg["id_pedido_manual"];?>')">Eliminar</a>
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
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                                <td class="description">
                                    Fecha de Pedido
                                </td>
                                <td class="description">
                                    <?php echo $reg["fecha_de_pedido"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Fecha de Pago
                                </td>
                                <td class="description">
                                    <?php echo $reg["fecha_de_pago"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Fecha de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg["fecha_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Hora de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg["hora_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Tipo de Producto
                                </td>
                                <td class="description">
                                    <?php echo $reg["tipo_de_producto"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Atendido Por
                                </td>
                                <td class="description">
                                    <?php echo $reg["atendido_por"]; ?>
                                </td>
                            </tr>
						</tbody>
                    </table>
                </div>
            </div>
			<!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Resumen de Pedido | Paso 2</h4>
                    </div>
                </div>

                <div class="row filter-block"></div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->			
							<tr class="first">
                                <td class="description">
                                    Nombre del Producto
                                </td>
                                <td class="description">
                                    <?php echo $reg["nombre_del_producto"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Precio del Producto
                                </td>
                                <td class="description">
                                    <?php echo $reg["precio_del_producto"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Valor el Envio
                                </td>
                                <td class="description">
                                    <?php echo $reg["valor_del_envio"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Total Compra
                                </td>
                                <td class="description">
                                    <?php echo $reg["total_compra"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Metodo de Contacto
                                </td>
                                <td class="description">
                                    <?php echo $reg["metodo_de_contacto"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Confirmacion de Pago
                                </td>
                                <td class="description">
                                    <?php echo $reg["confirmacion_pago"]; ?>
                                </td>
                            </tr>
						</tbody>
                    </table>
                </div>
            </div>
			<!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Resumen de Pedido | Paso 3</h4>
                    </div>
                </div>

                <div class="row filter-block"></div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->			
							<tr class="first">
                                <td class="description">
                                    Nombre de Quien LLama
                                </td>
                                <td class="description">
                                    <?php echo $reg["nombre_de_quien_llama"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Cedula de Quien LLama
                                </td>
                                <td class="description">
                                    <?php echo $reg["cedula"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Teléfono de Quien LLama
                                </td>
                                <td class="description">
                                    <?php echo $reg["telefonos_de_quien_llama"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Email de Quien LLama
                                </td>
                                <td class="description">
                                    <?php echo $reg["email_de_quien_llama"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Direccion de Facturacion
                                <td class="description">
                                    <?php echo $reg["direccion_facturacion"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Nombre de Quien Envia
                                </td>
                                <td class="description">
                                    <?php echo $reg["nombre_de_quien_envia"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Metodo de Pago
                                </td>
                                <td class="description">
                                    <?php echo $reg["metodo_pago"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Con o sin Factura?
                                </td>
                                <td class="description">
                                    <?php echo $reg["con_sin_factura"]; ?>
                                </td>
                            </tr>
						</tbody>
                    </table>
                </div>
            </div>
			<!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Resumen de Pedido | Paso 4</h4>
                    </div>
                </div>

                <div class="row filter-block"></div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
							<tr class="first">
                                <td class="description">
                                    Nombre de Quien Recibe
                                </td>
                                <td class="description">
                                    <?php echo $reg["nombre_de_quien_recibe"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Telefono de Quien Recibe
                                </td>
                                <td class="description">
                                    <?php echo $reg["telefono_de_quien_recibe"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Direccion de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg["direccion_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Barrio de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg["barrio_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Sector de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg["sector_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Mensaje de la Tarjeta
                                </td>
                                <td class="description">
                                    <?php echo $reg["mensaje_para_tarjeta"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Observaciones | Comentarios
                                </td>
                                <td class="description">
                                    <?php echo $reg["observaciones_comentarios"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Retroalimentación
                                </td>
                                <td class="description">
                                    <?php echo $reg["retroalimentacion"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Entregado o No?
                                </td>
                                <td class="description">
                                    <?php echo $reg["entregado"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Primera Vez
                                </td>
                                <td class="description">
                                    <?php echo $reg["primera_vez"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Referido
                                </td>
                                <td class="description">
                                    <?php echo $reg["referido"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Fuente de Trafico
                                </td>
                                <td class="description">
                                    <?php echo $reg["fuente_trafico"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Estado de Pedido
                                </td>
                                <td class="description">
                                    <?php echo $reg["estado_pedido"]; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->
			<div class="wizard-actions">
				<a href="pedidos-pendientes"><input type="button" class="btn-glow success btn-finish" value="Pedidos Pendientes" /></a>							
			</div>
        </div>
    </div>
	
	<?php
		}			
	?>
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
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='login';
			  </script>";
	}
	
?>