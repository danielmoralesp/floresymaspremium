<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso y Gastos Dia | FloresyMas.co</title>
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
			$mysql_CONSULTA_VENTAS = "SELECT COUNT(*) FROM pedido_manual where estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";
						$query=mysql_query($mysql_CONSULTA_VENTAS,$con);
						$rcount_ventas=mysql_result($query,0);						
						
			$sql = "select * from pedido_manual where estado_pedido='realizado' and  fecha_de_pago='$fecha_de_pago' order by $fecha_de_pago desc";   
			?>

            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Ingresos del Dia (<?php  echo $fecha_de_pago?>)</h4>
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
                                <th class="col-md-1">
                                    ID Pedido
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    Fecha de Pago
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
                                    Tipo de Producto
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Forma de Pago
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Confirmacion del Pago
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    Total
                                </th>
                            </tr>
                        </thead>
						
						<?php		
						$res = mysql_query($sql,$con);
						while($reg = mysql_fetch_array($res)){
							if(isset($reg["id_pedido_manual"])){						
								$id_pedido_manual=$reg["id_pedido_manual"];
								$fecha_de_pedido=$reg["fecha_de_pedido"];
								$fecha_de_pago=$reg["fecha_de_pago"];
								$fecha_de_entrega=$reg["fecha_de_entrega"];
								$hora_de_entrega=$reg["hora_de_entrega"];
								$tipo_de_producto=$reg["tipo_de_producto"];
								$atendido_por=$reg["atendido_por"];
								$nombre_del_producto=$reg["nombre_del_producto"];
								$precio_del_producto=$reg["precio_del_producto"];
								$total_compra=$reg["total_compra"];
								$metodo_de_contacto=$reg["metodo_de_contacto"];
								$confirmacion_pago=$reg["confirmacion_pago"];
								$nombre_de_quien_llama=$reg["nombre_de_quien_llama"];
								$telefonos_de_quien_llama=$reg["telefonos_de_quien_llama"];
								$email_de_quien_llama=$reg["email_de_quien_llama"];
								$nombre_de_quien_envia=$reg["nombre_de_quien_envia"];
								$metodo_pago=$reg["metodo_pago"];
								$nombre_de_quien_recibe=$reg["nombre_de_quien_recibe"];
								$telefono_de_quien_recibe=$reg["telefono_de_quien_recibe"];
								$direccion_de_entrega=$reg["direccion_de_entrega"];
								$barrio_de_entrega=$reg["barrio_de_entrega"];
								$sector_de_entrega=$reg["sector_de_entrega"];
								$mensaje_para_tarjeta=$reg["mensaje_para_tarjeta"];
								$observaciones_comentarios=$reg["observaciones_comentarios"];
								$retroalimentacion=$reg["retroalimentacion"];
								$entregado=$reg["entregado"];
								$estado_pedido=$reg["estado_pedido"];


								$ingresos[]=array('id_pedido_manual'=>$id_pedido_manual,'fecha_de_pedido'=>$fecha_de_pedido,'fecha_de_pago'=>$fecha_de_pago,'fecha_de_entrega'=>$fecha_de_entrega,'hora_de_entrega'=>$hora_de_entrega,'tipo_de_producto'=>$tipo_de_producto,'atendido_por'=>$atendido_por,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'total_compra'=>$total_compra,'metodo_de_contacto'=>$metodo_de_contacto,'confirmacion_pago'=>$confirmacion_pago,'nombre_de_quien_llama'=>$nombre_de_quien_llama,'telefonos_de_quien_llama'=>$telefonos_de_quien_llama,'email_de_quien_llama'=>$email_de_quien_llama,'nombre_de_quien_envia'=>$nombre_de_quien_envia,'metodo_pago'=>$metodo_pago,'nombre_de_quien_recibe'=>$nombre_de_quien_recibe,'telefono_de_quien_recibe'=>$telefono_de_quien_recibe,'direccion_de_entrega'=>$direccion_de_entrega,'barrio_de_entrega'=>$barrio_de_entrega,'sector_de_entrega'=>$sector_de_entrega,'$mensaje_para_tarjeta'=>$mensaje_para_tarjeta,'observaciones_comentarios'=>$observaciones_comentarios,'retroalimentacion'=>$retroalimentacion,'entregado'=>$entregado,'estado_pedido'=>$estado_pedido);
							}
						?>
                        <tbody>
							
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="detalle-del-pedido.php?id_pedido_manual=<?php echo $id_pedido_manual;?>">#<?php echo $id_pedido_manual;?></a>
                                </td>
                                <td>
                                    <?php echo $fecha_de_pago;?>
                                </td>
                                <td>
                                    <a href="detalle-del-pedido.php?id_pedido_manual=<?php echo $id_pedido_manual;?>"><?php echo $nombre_de_quien_llama;?></a>
                                </td>
                                <td>
                                    <?php echo $telefonos_de_quien_llama;?>
                                </td>
                                <td>
                                    <?php echo $nombre_del_producto;?>
                                </td>
								<td>
                                    <?php echo $tipo_de_producto;?>
                                </td>
                                <td>
                                    <?php echo $metodo_pago;?>
                                </td>
								<td>
                                    <span class="label label-success"><?php echo $confirmacion_pago;?></span>
                                </td>
								<td>
                                    <?php echo $total_compra;?>
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
		<?php						
			if(isset($ingresos)){
				$total_ventas=0;
				for($i=0;$i<count($ingresos);$i++){							
				
				$subtotal_ventas= $ingresos[$i]['total_compra'];
				$total_ventas= $total_ventas+$subtotal_ventas;								
				}									
			}						
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                    <!--<div class="data">
                        <span class="number">$35.000.000</span>
                        Ventas
                    </div>
                    <span class="date">Agosto 2014</span>-->
                </div>                
				<div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number"><?php echo $rcount_ventas;?></span>
                        Items
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
                <div class="col-md-3 col-sm-3 stat last">                    
					<div class="data">
                        <span class="number">$<?php echo $total_ventas;?></span>
                        Ventas
                    </div>
                    <span class="date"><?php echo $fecha_de_pago;?></span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
		
		<!--GASTOS-->
		<?php
			$fecha_de_dato=$_POST["fecha_de_dato"];
			$mysql_CONSULTA_GASTOS = "SELECT COUNT(*) FROM gastos where fecha_de_dato='$fecha_de_dato'";
						$query=mysql_query($mysql_CONSULTA_GASTOS,$con);
						$rcount_gastos=mysql_result($query,0);	
			$sql2 = "select * from gastos where fecha_de_dato='$fecha_de_dato' order by $fecha_de_dato desc"; 
		?>
		<div id="pad-wrapper"> 
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Gastos del Dia (<?php  echo $fecha_de_dato?>)</h4>
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
                                <th class="col-md-1">
                                    ID Gasto
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    Fecha de Pago 
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Proveedor
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Categoria
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Subcategoria
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    Item
                                </th>
								<th class="col-md-2">
                                    <span class="line"></span>
                                    Pagado Con
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    Total
                                </th>
                            </tr>
                        </thead>
						
						<?php		
						$res2 = mysql_query($sql2,$con);
						while($reg2 = mysql_fetch_array($res2)){
							if(isset($reg2["id_gastos"])){						
								$id_gastos=$reg2["id_gastos"];
								$fecha_de_dato=$reg2["fecha_de_dato"];
								$proveedor=$reg2["proveedor"];
								$categoria=$reg2["categoria"];
								$subcategoria=$reg2["subcategoria"];
								$item=$reg2["item"];
								$valor=$reg2["valor"];
								$pagado_con=$reg2["pagado_con"];

								$gastos[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
							
							}
						?>
                        <tbody>
							
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="detalle-del-gasto.php?id_gastos=<?php echo $id_gastos;?>">#<?php echo $id_gastos;?></a>
                                </td>
                                <td>
                                    <?php echo $fecha_de_dato;?>
                                </td>
                                <td>
                                    <a href="detalle-del-gasto.php?id_gastos=<?php echo $id_gastos;?>"><?php echo $proveedor;?></a>
                                </td>
                                <td>
                                    <?php echo $categoria;?>
                                </td>
                                <td>
                                    <?php echo $subcategoria;?>
                                </td>
                                <td>
                                    <?php echo $item;?>
                                </td>
								<td>
                                    <?php echo $pagado_con;?>
                                </td>
								<td>
                                    <?php echo $valor;?>
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
		<?php						
			if(isset($gastos)){
				$total_gastos=0;
				for($i=0;$i<count($gastos);$i++){							
				
				$subtotal_gastos= $gastos[$i]['valor'];
				$total_gastos= $total_gastos+$subtotal_gastos;								
				}									
			}						
		?>
		<!-- upper main stats -->
        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-6 col-sm-6 stat">
                    <!--<div class="data">
                        <span class="number">$35.000.000</span>
                        Ventas
                    </div>
                    <span class="date">Agosto 2014</span>-->
                </div>                
				<div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                        <span class="number"><?php echo $rcount_gastos;?></span>
                        Items
                    </div>
                    <span class="date"><?php echo $fecha_de_dato;?></span>
                </div>
                <div class="col-md-3 col-sm-3 stat last">                    
					<div class="data">
                        <span class="number">$<?php echo $total_gastos;?></span>
                        Gastos
                    </div>
                    <span class="date"><?php echo $fecha_de_dato;?></span>
                </div>
            </div>
        </div><br><br>
        <!-- end upper main stats -->
		<div id="pad-wrapper"> 
            <!-- orders table -->
            <div class="table-wrapper ">
                <div class="row head pull-right">
                    <div class="col-md-12">
                        <h4>Utilidad o Pérdida</h4>
                    </div>
                </div><br><br>
				<?php
					$utilidad = $total_ventas - $total_gastos;
					if($total_ventas >= $total_gastos){
				?>
					<div class="alert alert-success pull-right">
						 <h2><i class="icon-ok-sign"></i><?php echo $utilidad ?></h1>
					</div>					
				<?php	}else{
				?>
					<div class="alert alert-danger pull-right">
						 <h2><i class="icon-remove-sign"></i><?php echo $utilidad ?></h1>
					</div>
				<?php	}
				?>
				
			</div>
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