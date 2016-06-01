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
	<title>Detalle del Pedido | FloresyMas.co</title>
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
	<script language="javascript" type="text/javascript">
		function eliminar(id){
			if(confirm("Realmente desea eliminar el producto?")){
				window.location="eliminar-pedido.php?id_pedidos="+id;
			}
		}
	</script>
</head>
<body>
     <!-- navbar -->
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard3.php"); ?>
    <!-- end sidebar -->
	<?php $id_pedidos = $_GET["id_pedidos"];
	$sql2="select * from pedidos where id_pedidos='".$_GET["id_pedidos"]."'	"; 
	$res2 = mysql_query($sql2,$con);
	if($reg2 = mysql_fetch_array($res2)){			
	?>
	<!-- main container -->
    <div class="content">       
        <div id="pad-wrapper">            
            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Detalle del Pedido | Paso 1</h4>
                    </div>
                </div>
                <div class="row filter-block">
                    <div class="pull-right">                        
                        <a class="btn-flat info new-product" href="editar-pedido.php?id_pedidos=<?php echo $reg2["id_pedidos"];?>">Editar</a>
						<a class="btn-flat warning new-product" href="javascript:void(0)" onClick="eliminar('<?php echo $reg2["id_pedidos"];?>')">Eliminar</a>
                    </div><br><br>
					<div class="pull-right">                        
                        <a class="btn-flat info new-product" href="../../emails/email-pedido-entregado.php?id_pedidos=<?php echo $reg2["id_pedidos"];?>">Email Pedido Entregado</a>
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
                                    Nombre del Producto
                                </td>
                                <td class="description">
                                    <?php echo $reg2["nombre_del_producto"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Unidades de Rosas
                                </td>
                                <td class="description">
                                    <?php echo $reg2["unidades_de_rosas"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Colores de Rosas
                                </td>
                                <td class="description">
                                    <?php echo $reg2["colores_de_rosas"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Cantidad
                                </td>
                                <td class="description">
                                    <?php echo $reg2["cantidad"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Total
                                </td>
                                <td class="description">
                                    <?php echo number_format($reg2["total"]); ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Estado del Pago
                                </td>
                                <td class="description">
                                    <?php 
                                        if($reg2["estado_pedido"]=='1'){
                                            ?>
                                             <span class="label label-warning">Pendiente</span>
                                    <?php   }else if($reg2["estado_pedido"]=='5'){
                                            ?>
                                             <span class="label label-success">Pagado</span>
                                    <?php   }else if($reg2["estado_pedido"]=='15'){
                                            ?>
                                             <span class="label label-info">Confirmado</span>
                                    <?php   }else{
                                            ?>
                                             <span class="label label-danger">Abortado</span>
                                    <?php   
                                                }                                   
                                    ?>
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
                        <h4>Detalle del Pedido | Paso 2</h4>
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
										Fecha de Pedido
									</td>
									<td class="description">
										<?php echo $reg2["fecha_de_pedido"]; ?>
									</td>
								</tr>
								<tr class="first">
									<td class="description">
										Fecha de Pago
									</td>
									<td class="description">
										<?php echo $reg2["fecha_de_pago"]; ?>
									</td>
								</tr>
								<tr class="first">
									<td class="description">
										Fecha de Entrega
									</td>
									<td class="description">
										<?php echo $reg2["ano_de_entrega"]; ?>-<?php echo $reg2["mes_de_entrega"]; ?>-<?php echo $reg2["dia_de_entrega"]; ?>
									</td>
								</tr>
								<tr class="first">
									<td class="description">
										Hora de Entrega
									</td>
									<td class="description">
										<?php echo $reg2["hora_de_entrega"]; ?>
									</td>
								</tr>
								<tr class="first">
                                <td class="description">
                                    Ciudad de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg2["ciudad_de_entrega"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Dirección de Entrega
                                </td>
                                <td class="description">
                                    <?php echo $reg2["dir_1_entrega"]; ?> <?php echo $reg2["dir_2_entrega"]; ?> # <?php echo $reg2["dir_3_entrega"]; ?>/ <?php echo $reg2["dir_4_entrega"]; ?> <?php echo $reg2["dir_5_entrega"]; ?> 
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Barrio
                                </td>
                                <td class="description">
                                    <?php echo $reg2["barrio"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Ayuda Adicional para el Envío
                                </td>
                                <td class="description">
                                    <?php echo $reg2["ayuda_envio"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Nombre de Quien Envía
                                </td>
                                <td class="description">
                                    <?php echo $reg2["nombre_de_quien_envia"]; ?> 
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Nombre de Quien Recibe
                                </td>
                                <td class="description">
                                    <?php echo $reg2["nombre_de_quien_recibe"]; ?> 
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Teléfono de Quien Recibe
                                </td>
                                <td class="description">
                                    <?php echo $reg2["telefono_de_quien_recibe"]; ?> 
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Mensaje para la Tarjeta
                                </td>
                                <td class="description">
                                    <?php echo $reg2["mensaje_para_tarjeta"]; ?> 
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Observaciones y Comentarios
                                </td>
                                <td class="description">
                                    <?php echo $reg2["observaciones_comentarios"]; ?> 
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
                        <h4>Detalle del de Pedido | Paso 3</h4>
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
                                    Nombre de Quien Llama
                                </td>
                                <td class="description">
                                    <?php echo $reg2["nombre_de_quien_llama"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Teléfono de Quien Llama
                                </td>
                                <td class="description">
                                    <?php echo $reg2["telefono_de_quien_llama"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Email de Quien Llama
                                </td>
                                <td class="description">
                                    <?php echo $reg2["email_de_quien_llama"]; ?>
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
		}
	?>
    <!-- end main container -->
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/theme.js"></script>
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