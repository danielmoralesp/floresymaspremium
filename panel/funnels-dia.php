<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Funnels Dia | FloresyMas.co</title>
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
	<link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />

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
            <?php
			$fecha_de_pago=$_POST["fecha_de_dato"]; 
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels del Dia (<?php  echo $fecha_de_pago?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels Arreglo Florales </h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                     
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    Datos
                                </th>
                                <th class="col-md-9">
                                    <span class="line"></span>
                                    Números
                                </th>								
                            </tr>
                        </thead>
						<?php 
							$sql = "select * from funnels where tipo_de_producto='Arreglo Floral' and fecha_de_dato='$fecha_de_pago'";   
							$res = mysql_query($sql,$con);
								if($reg = mysql_fetch_array($res)){							  
									$impresiones_arreglos=$reg["numero_de_impresiones"];
									$clics_arreglos = $reg["numero_de_clics"];
									$costo_adwords_arreglos = $reg["costo_de_adwords"];
						?>
						
                        <tbody>
							
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    #Impresiones
                                </td>
                                <td>
                                    <?php echo $impresiones_arreglos; ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    #Clics
                                </td>
                                <td>
                                    <?php $ctr_arreglos = $clics_arreglos / $impresiones_arreglos *(100); ?>
									<?php echo $clics_arreglos; ?> <span class="label label-success">(<?php echo $ctr_arreglos; ?> %)</span>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Costo Adwords
                                </td>
                                <td>
                                    <?php echo $costo_adwords_arreglos; ?>
                                </td>
							</tr>
							
							<?php
								}							
							?>
                            <tr class="first">
								<td>
                                    Pendientes
                                </td>
								<?php 
									$mysql_CONSULTA_ARREGLOS_PENDIENTES = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Arreglo Floral' and estado_pedido='pendiente' and fecha_de_pedido='$fecha_de_pago'";
									$query_ARREGLOS_PENDIENTES=mysql_query($mysql_CONSULTA_ARREGLOS_PENDIENTES,$con);
									$rcount_ARREGLOS_PENDIENTES=mysql_result($query_ARREGLOS_PENDIENTES,0);
								?>
                                <td>
                                    <?php echo $rcount_ARREGLOS_PENDIENTES; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Realizados
                                </td>
								<?php 
									$mysql_CONSULTA_ARREGLOS_REALIZADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Arreglo Floral' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
									$query_ARREGLOS_REALIZADOS=mysql_query($mysql_CONSULTA_ARREGLOS_REALIZADOS,$con);
									$rcount_ARREGLOS_REALIZADOS=mysql_result($query_ARREGLOS_REALIZADOS,0);
								?>
                                <td>
                                    <?php echo $rcount_ARREGLOS_REALIZADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Abortados
                                </td>
								<?php 
									$mysql_CONSULTA_ARREGLOS_ABORTADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Arreglo Floral' and estado_pedido='abortado' and fecha_de_pedido='$fecha_de_pago'";
									$query_ARREGLOS_ABORTADOS=mysql_query($mysql_CONSULTA_ARREGLOS_ABORTADOS,$con);
									$rcount_ARREGLOS_ABORTADOS=mysql_result($query_ARREGLOS_ABORTADOS,0);
								?>
                                <td>
                                    <?php echo $rcount_ARREGLOS_ABORTADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Llamadas/Chats)
                                </td>
								<?php 
									$total_llamadas_arreglos = $rcount_ARREGLOS_PENDIENTES + $rcount_ARREGLOS_REALIZADOS + $rcount_ARREGLOS_ABORTADOS;
									$conversion_de_llamadas_arreglos = $total_llamadas_arreglos / $clics_arreglos * 100;
								?>
                                <td>
                                    <?php echo $total_llamadas_arreglos; ?> <span class="label label-success">(<?php echo $conversion_de_llamadas_arreglos; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Compras)
                                </td>
								<?php 
									$mysql_CONSULTA_ARREGLOS_TOTALES_COMPRADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Arreglo Floral' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
									$query_ARREGLOS_TOTALES_COMPRADOS=mysql_query($mysql_CONSULTA_ARREGLOS_TOTALES_COMPRADOS,$con);
									$rcount_ARREGLOS_TOTALES_COMPRADOS=mysql_result($query_ARREGLOS_TOTALES_COMPRADOS,0);
									
									$conversion_de_compras_arreglos = $rcount_ARREGLOS_TOTALES_COMPRADOS / $clics_arreglos * 100;
								?>
                                <td>
                                    <?php echo $rcount_ARREGLOS_TOTALES_COMPRADOS; ?> <span class="label label-success">(<?php echo $conversion_de_compras_arreglos; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    CAC
                                </td>
								<?php 									
									$cac_arreglos = $costo_adwords_arreglos / $rcount_ARREGLOS_TOTALES_COMPRADOS;
								?>
                                <td>
                                    <?php echo $cac_arreglos;?>									
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Facturación
                                </td>
								<?php
								$sql2 = "select * from pedido_manual where tipo_de_producto='Arreglo Floral' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
								$res2 = mysql_query($sql2,$con);
									while($reg2 = mysql_fetch_array($res2)){
										if(isset($reg2["id_pedido_manual"])){									
											$id_pedido_manual=$reg2["id_pedido_manual"];											
											$total_compra=$reg2["total_compra"];											

											$funnels_arreglos[]=array('id_pedido_manual'=>$id_pedido_manual,'total_compra'=>$total_compra);
										}
									}
								 									
									if(isset($funnels_arreglos)){
										$total_facturacion_arreglos=0;
										for($i=0;$i<count($funnels_arreglos);$i++){	
											$subtotal_facturacion_arreglos = $funnels_arreglos[$i]['total_compra'];
											$total_facturacion_arreglos= $total_facturacion_arreglos + $subtotal_facturacion_arreglos;											
										}												
									}
								
								?>
                                <td>
									<?php $peso_publicidad_arreglos = $costo_adwords_arreglos / $total_facturacion_arreglos * (100)  ?>
                                    <?php echo $total_facturacion_arreglos;?> <span class="label label-success">(<?php echo $peso_publicidad_arreglos; ?> %)</span>							
                                </td>
							</tr>

							
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>

		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-8 col-sm-8 stat">
                </div>                
                <div class="col-md-4 col-sm-4 stat last">                    
					<div class="data">
                        <span class="number">$<?php echo $total_facturacion_arreglos;?></span>
                        Ventas Arreglos
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
		<!--DESAYUNOS-->
		<div id="pad-wrapper">         
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels del Dia (<?php  echo $fecha_de_pago?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels Desayunos </h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                     
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    Datos
                                </th>
                                <th class="col-md-9">
                                    <span class="line"></span>
                                    Números
                                </th>								
                            </tr>
                        </thead>
						<?php 
							$sql3 = "select * from funnels where tipo_de_producto='Desayuno Sorpresa' and fecha_de_dato='$fecha_de_pago'";   
							$res3 = mysql_query($sql3,$con);
								if($reg3 = mysql_fetch_array($res3)){							  
									$impresiones_desayunos=$reg3["numero_de_impresiones"];
									$clics_desayunos = $reg3["numero_de_clics"];
									$costo_adwords_desayunos = $reg3["costo_de_adwords"];
						?>
						
                        <tbody>
							
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    #Impresiones
                                </td>
                                <td>
                                    <?php echo $impresiones_desayunos; ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    #Clics
                                </td>
                                <td>
                                    <?php $ctr_desayunos = $clics_desayunos / $impresiones_desayunos *(100); ?>
									<?php echo $clics_desayunos; ?> <span class="label label-success">(<?php echo $ctr_desayunos; ?> %)</span>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Costo Adwords
                                </td>
                                <td>
                                    <?php echo $costo_adwords_desayunos; ?>
                                </td>
							</tr>
							
							<?php
								}							
							?>
                            <tr class="first">
								<td>
                                    Pendientes
                                </td>
								<?php 
									$mysql_CONSULTA_DESAYUNOS_PENDIENTES = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Desayuno Sorpresa' and estado_pedido='pendiente' and fecha_de_pedido='$fecha_de_pago'";
									$query_DESAYUNOS_PENDIENTES=mysql_query($mysql_CONSULTA_DESAYUNOS_PENDIENTES,$con);
									$rcount_DESAYUNOS_PENDIENTES=mysql_result($query_DESAYUNOS_PENDIENTES,0);
								?>
                                <td>
                                    <?php echo $rcount_DESAYUNOS_PENDIENTES; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Realizados
                                </td>
								<?php 
									$mysql_CONSULTA_DESAYUNOS_REALIZADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Desayuno Sorpresa' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
									$query_DESAYUNOS_REALIZADOS=mysql_query($mysql_CONSULTA_DESAYUNOS_REALIZADOS,$con);
									$rcount_DESAYUNOS_REALIZADOS=mysql_result($query_DESAYUNOS_REALIZADOS,0);
								?>
                                <td>
                                    <?php echo $rcount_DESAYUNOS_REALIZADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Abortados
                                </td>
								<?php 
									$mysql_CONSULTA_DESAYUNOS_ABORTADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Desayuno Sorpresa' and estado_pedido='abortado' and fecha_de_pedido='$fecha_de_pago'";
									$query_DESAYUNOS_ABORTADOS=mysql_query($mysql_CONSULTA_DESAYUNOS_ABORTADOS,$con);
									$rcount_DESAYUNOS_ABORTADOS=mysql_result($query_DESAYUNOS_ABORTADOS,0);
								?>
                                <td>
                                    <?php echo $rcount_DESAYUNOS_ABORTADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Llamadas/Chats)
                                </td>
								<?php 
									$total_llamadas_desayunos = $rcount_DESAYUNOS_PENDIENTES + $rcount_DESAYUNOS_REALIZADOS + $rcount_DESAYUNOS_ABORTADOS;
									$conversion_de_llamadas_desayunos = $total_llamadas_desayunos / $clics_desayunos * 100;
								?>
                                <td>
                                    <?php echo $total_llamadas_desayunos; ?> <span class="label label-success">(<?php echo $conversion_de_llamadas_desayunos; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Compras)
                                </td>
								<?php 
									$mysql_CONSULTA_DESAYUNOS_TOTALES_COMPRADOS = "SELECT COUNT(*) FROM pedido_manual where tipo_de_producto='Desayuno Sorpresa' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
									$query_DESAYUNOS_TOTALES_COMPRADOS=mysql_query($mysql_CONSULTA_DESAYUNOS_TOTALES_COMPRADOS,$con);
									$rcount_DESAYUNOS_TOTALES_COMPRADOS=mysql_result($query_DESAYUNOS_TOTALES_COMPRADOS,0);
									
									$conversion_de_compras_desayunos = $rcount_DESAYUNOS_TOTALES_COMPRADOS / $clics_desayunos * 100;
								?>
                                <td>
                                    <?php echo $rcount_DESAYUNOS_TOTALES_COMPRADOS; ?> <span class="label label-success">(<?php echo $conversion_de_compras_desayunos; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    CAC
                                </td>
								<?php 									
									$cac_desayunos = $costo_adwords_desayunos / $rcount_DESAYUNOS_TOTALES_COMPRADOS;
								?>
                                <td>
                                    <?php echo $cac_desayunos;?>									
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Facturación
                                </td>
								<?php
								$sql4 = "select * from pedido_manual where tipo_de_producto='Desayuno Sorpresa' and estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
								$res4 = mysql_query($sql4,$con);
									while($reg4 = mysql_fetch_array($res4)){
										if(isset($reg4["id_pedido_manual"])){									
											$id_pedido_manual=$reg4["id_pedido_manual"];											
											$total_compra=$reg4["total_compra"];											

											$funnels_desayunos[]=array('id_pedido_manual'=>$id_pedido_manual,'total_compra'=>$total_compra);
										}
									}
								 									
									if(isset($funnels_desayunos)){
										$total_facturacion_desayunos=0;
										for($i=0;$i<count($funnels_desayunos);$i++){	
											$subtotal_facturacion_desayunos = $funnels_desayunos[$i]['total_compra'];
											$total_facturacion_desayunos= $total_facturacion_desayunos + $subtotal_facturacion_desayunos;											
										}												
									}
								
								?>
                                <td>
									<?php $peso_publicidad_desayunos = $costo_adwords_desayunos / $total_facturacion_desayunos * (100)  ?>
                                    <?php echo $total_facturacion_desayunos;?> <span class="label label-success">(<?php echo $peso_publicidad_desayunos; ?> %)</span>							
                                </td>
							</tr>

							
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>

		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-8 col-sm-8 stat">
                </div>                
                <div class="col-md-4 col-sm-4 stat last">                    
					<div class="data">
                        <span class="number">$<?php echo $total_facturacion_desayunos;?></span>
                        Ventas Desayunos
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->	
		<!--TOTALES-->
		<div id="pad-wrapper">         
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels del Dia (<?php  echo $fecha_de_pago?>)</h4>
                    </div>
                </div>
				<div class="row head">
                    <div class="col-md-12">
                        <h4>Funnels Totales </h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                     
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    Datos
                                </th>
                                <th class="col-md-9">
                                    <span class="line"></span>
                                    Números
                                </th>								
                            </tr>
                        </thead>						
                        <tbody>
							<?php 
								$impresiones_totales = $impresiones_arreglos + $impresiones_desayunos; 
								$clics_totales = $clics_arreglos + $clics_desayunos;
								$costo_adwords_totales = $costo_adwords_arreglos + $costo_adwords_desayunos;								
							?>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    #Impresiones
                                </td>
                                <td>									
                                    <?php echo $impresiones_totales; ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    #Clics
                                </td>
                                <td>
                                    <?php $ctr_totales = $clics_totales / $impresiones_totales *(100); ?>
									<?php echo $clics_totales; ?> <span class="label label-success">(<?php echo $ctr_totales; ?> %)</span>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Costo Adwords
                                </td>
                                <td>
                                    <?php echo $costo_adwords_totales; ?>
                                </td>
							</tr>
                            <tr class="first">
								<td>
                                    Pendientes
                                </td>
								<?php 
									$rcount_TOTALES_PENDIENTES = $rcount_ARREGLOS_PENDIENTES + $rcount_DESAYUNOS_PENDIENTES;
								?>
                                <td>
                                    <?php echo $rcount_TOTALES_PENDIENTES; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Realizados
                                </td>
								<?php 
									$rcount_TOTALES_REALIZADOS = $rcount_ARREGLOS_REALIZADOS + $rcount_DESAYUNOS_REALIZADOS;
								?>
                                <td>
                                    <?php echo $rcount_TOTALES_REALIZADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Abortados
                                </td>
								<?php 
									$rcount_TOTALES_ABORTADOS = $rcount_ARREGLOS_ABORTADOS + $rcount_DESAYUNOS_ABORTADOS;
								?>
                                <td>
                                    <?php echo $rcount_TOTALES_ABORTADOS; ?>
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Llamadas/Chats)
                                </td>
								<?php 
									$total_llamadas_totales = $rcount_TOTALES_PENDIENTES + $rcount_TOTALES_REALIZADOS + $rcount_TOTALES_ABORTADOS;
									$conversion_de_llamadas_totales = $total_llamadas_totales / $clics_totales * 100;
								?>
                                <td>
                                    <?php echo $total_llamadas_totales; ?> <span class="label label-success">(<?php echo $conversion_de_llamadas_totales; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Total (Compras)
                                </td>
								<?php 
									$rcount_TOTALES_COMPRADOS = $rcount_ARREGLOS_TOTALES_COMPRADOS + $rcount_DESAYUNOS_TOTALES_COMPRADOS;									
									$conversion_de_compras_totales = $rcount_TOTALES_COMPRADOS / $clics_totales * 100;
								?>
                                <td>
                                    <?php echo $rcount_TOTALES_COMPRADOS; ?> <span class="label label-success">(<?php echo $conversion_de_compras_totales; ?> %)</span>								
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    CAC
                                </td>
								<?php 									
									$cac_totales = $costo_adwords_totales / $rcount_TOTALES_COMPRADOS;
								?>
                                <td>
                                    <?php echo $cac_totales;?>									
                                </td>
							</tr>
							<tr class="first">
								<td>
                                    Facturación
                                </td>
								<?php
									$total_facturacion = $total_facturacion_arreglos + $total_facturacion_desayunos;
								
								?>
                                <td>
									<?php $peso_publicidad_totales = $costo_adwords_totales / $total_facturacion * (100)  ?>
                                    <?php echo $total_facturacion;?> <span class="label label-success">(<?php echo $peso_publicidad_totales; ?> %)</span>							
                                </td>
							</tr>							
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->            
        </div>

		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-8 col-sm-8 stat">
                </div>                
                <div class="col-md-4 col-sm-4 stat last">                    
					<div class="data">
                        <span class="number">$<?php echo $total_facturacion;?></span>
                        Ventas Totales
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
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