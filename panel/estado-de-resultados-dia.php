<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Estado de Resultados Dia | FloresyMas.co</title>
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
                        <h4>Estado de Resultados del Dia (<?php  echo $fecha_de_pago?>)</h4>
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
							//CODIGO PARA CALCULAR LOS INGRESOS
							$sql = "select * from pedido_manual where estado_pedido='realizado' and fecha_de_pago='$fecha_de_pago'";   
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
							}
							
							if(isset($ingresos)){
								$total_ventas=0;
								for($i=0;$i<count($ingresos);$i++){							
								
								$subtotal_ventas= $ingresos[$i]['total_compra'];
								$total_ventas= $total_ventas+$subtotal_ventas;								
								}									
							}
							
							//CODIGO PARA CALCULAR LOS GASTOS
							$sql2 = "select * from gastos where fecha_de_dato='$fecha_de_pago'";
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
							}
							
							if(isset($gastos)){
								$total_gastos=0;
								for($i=0;$i<count($gastos);$i++){							
								
								$subtotal_gastos= $gastos[$i]['valor'];
								$total_gastos= $total_gastos+$subtotal_gastos;								
								}									
							}
							
							//CODIGO PARA CALCULAR MATERIA PRIMA
							$sql3 = "select * from gastos where categoria='materias_primas' and fecha_de_dato='$fecha_de_pago'";
							$res3 = mysql_query($sql3,$con);
							while($reg3 = mysql_fetch_array($res3)){
								if(isset($reg3["id_gastos"])){						
									$id_gastos=$reg3["id_gastos"];
									$fecha_de_dato=$reg3["fecha_de_dato"];
									$proveedor=$reg3["proveedor"];
									$categoria=$reg3["categoria"];
									$subcategoria=$reg3["subcategoria"];
									$item=$reg3["item"];
									$valor=$reg3["valor"];
									$pagado_con=$reg3["pagado_con"];

									$materias_primas[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($materias_primas)){
								$total_materias_primas=0;
								for($i=0;$i<count($materias_primas);$i++){							
								
								$subtotal_materias_primas= $materias_primas[$i]['valor'];
								$total_materias_primas= $total_materias_primas+$subtotal_materias_primas;								
								}									
							}
							
							//CODIGO PARA CALCULAR TRANSPORTE
							$sql4 = "select * from gastos where categoria='transporte_mensajeria' and fecha_de_dato='$fecha_de_pago'";
							$res4 = mysql_query($sql4,$con);
							while($reg4 = mysql_fetch_array($res4)){
								if(isset($reg4["id_gastos"])){						
									$id_gastos=$reg4["id_gastos"];
									$fecha_de_dato=$reg4["fecha_de_dato"];
									$proveedor=$reg4["proveedor"];
									$categoria=$reg4["categoria"];
									$subcategoria=$reg4["subcategoria"];
									$item=$reg4["item"];
									$valor=$reg4["valor"];
									$pagado_con=$reg4["pagado_con"];

									$transporte_mensajeria[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($transporte_mensajeria)){
								$total_transporte_mensajeria=0;
								for($i=0;$i<count($transporte_mensajeria);$i++){							
								
								$subtotal_transporte_mensajeria= $transporte_mensajeria[$i]['valor'];
								$total_transporte_mensajeria= $total_transporte_mensajeria+$subtotal_transporte_mensajeria;								
								}									
							}
							
							//CODIGO PARA CALCULAR LOS SALARIOS
							$sql5 = "select * from gastos where categoria='salarios' and fecha_de_dato='$fecha_de_pago'";
							$res5 = mysql_query($sql5,$con);
							while($reg5 = mysql_fetch_array($res5)){
								if(isset($reg5["id_gastos"])){						
									$id_gastos=$reg5["id_gastos"];
									$fecha_de_dato=$reg5["fecha_de_dato"];
									$proveedor=$reg5["proveedor"];
									$categoria=$reg5["categoria"];
									$subcategoria=$reg5["subcategoria"];
									$item=$reg5["item"];
									$valor=$reg5["valor"];
									$pagado_con=$reg5["pagado_con"];

									$salarios[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($salarios)){
								$total_salarios=0;
								for($i=0;$i<count($salarios);$i++){							
								
								$subtotal_salarios= $salarios[$i]['valor'];
								$total_salarios= $total_salarios+$subtotal_salarios;								
								}									
							}
							
							//CODIGO PARA CALCULAR LOS ARRENDAMIENTO
							$sql6 = "select * from gastos where categoria='arrendamientos' and fecha_de_dato='$fecha_de_pago'";
							$res6 = mysql_query($sql6,$con);
							while($reg6 = mysql_fetch_array($res6)){
								if(isset($reg6["id_gastos"])){						
									$id_gastos=$reg6["id_gastos"];
									$fecha_de_dato=$reg6["fecha_de_dato"];
									$proveedor=$reg6["proveedor"];
									$categoria=$reg6["categoria"];
									$subcategoria=$reg6["subcategoria"];
									$item=$reg6["item"];
									$valor=$reg6["valor"];
									$pagado_con=$reg6["pagado_con"];

									$arrendamientos[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($arrendamientos)){
								$total_arrendamientos=0;
								for($i=0;$i<count($arrendamientos);$i++){							
								
								$subtotal_arrendamientos= $arrendamientos[$i]['valor'];
								$total_arrendamientos= $total_arrendamientos+$subtotal_arrendamientos;								
								}									
							}
							
							//CODIGO PARA CALCULAR SERVICIOS BANCARIOS
							$sql7 = "select * from gastos where categoria='servicios_bancarios' and fecha_de_dato='$fecha_de_pago'";
							$res7 = mysql_query($sql7,$con);
							while($reg7 = mysql_fetch_array($res7)){
								if(isset($reg7["id_gastos"])){						
									$id_gastos=$reg7["id_gastos"];
									$fecha_de_dato=$reg7["fecha_de_dato"];
									$proveedor=$reg7["proveedor"];
									$categoria=$reg7["categoria"];
									$subcategoria=$reg7["subcategoria"];
									$item=$reg7["item"];
									$valor=$reg7["valor"];
									$pagado_con=$reg7["pagado_con"];

									$servicios_bancarios[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($servicios_bancarios)){
								$total_servicios_bancarios=0;
								for($i=0;$i<count($servicios_bancarios);$i++){							
								
								$subtotal_servicios_bancarios= $servicios_bancarios[$i]['valor'];
								$total_servicios_bancarios= $total_servicios_bancarios+$subtotal_servicios_bancarios;								
								}									
							}
							
							//CODIGO PARA CALCULAR SERVICIOS PUBLICOS
							$sql8 = "select * from gastos where categoria='servicios_publicos' and fecha_de_dato='$fecha_de_pago'";
							$res8 = mysql_query($sql8,$con);
							while($reg8 = mysql_fetch_array($res8)){
								if(isset($reg8["id_gastos"])){						
									$id_gastos=$reg8["id_gastos"];
									$fecha_de_dato=$reg8["fecha_de_dato"];
									$proveedor=$reg8["proveedor"];
									$categoria=$reg8["categoria"];
									$subcategoria=$reg8["subcategoria"];
									$item=$reg8["item"];
									$valor=$reg8["valor"];
									$pagado_con=$reg8["pagado_con"];

									$servicios_publicos[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($servicios_publicos)){
								$total_servicios_publicos=0;
								for($i=0;$i<count($servicios_publicos);$i++){							
								
								$subtotal_servicios_publicos= $servicios_publicos[$i]['valor'];
								$total_servicios_publicos= $total_servicios_publicos+$subtotal_servicios_publicos;								
								}									
							}
							
							//CODIGO PARA CALCULAR PUBLICIDAD
							$sql9 = "select * from gastos where categoria='publicidad' and fecha_de_dato='$fecha_de_pago'";
							$res9 = mysql_query($sql9,$con);
							while($reg9 = mysql_fetch_array($res9)){
								if(isset($reg9["id_gastos"])){						
									$id_gastos=$reg9["id_gastos"];
									$fecha_de_dato=$reg9["fecha_de_dato"];
									$proveedor=$reg9["proveedor"];
									$categoria=$reg9["categoria"];
									$subcategoria=$reg9["subcategoria"];
									$item=$reg9["item"];
									$valor=$reg9["valor"];
									$pagado_con=$reg9["pagado_con"];

									$publicidad[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($publicidad)){
								$total_publicidad=0;
								for($i=0;$i<count($publicidad);$i++){							
								
								$subtotal_publicidad= $publicidad[$i]['valor'];
								$total_publicidad= $total_publicidad+$subtotal_publicidad;								
								}									
							}
							
							//CODIGO PARA CALCULAR VIATICOS
							$sql10 = "select * from gastos where categoria='viaticos' and fecha_de_dato='$fecha_de_pago'";
							$res10 = mysql_query($sql10,$con);
							while($reg10 = mysql_fetch_array($res10)){
								if(isset($reg10["id_gastos"])){						
									$id_gastos=$reg10["id_gastos"];
									$fecha_de_dato=$reg10["fecha_de_dato"];
									$proveedor=$reg10["proveedor"];
									$categoria=$reg10["categoria"];
									$subcategoria=$reg10["subcategoria"];
									$item=$reg10["item"];
									$valor=$reg10["valor"];
									$pagado_con=$reg10["pagado_con"];

									$viaticos[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($viaticos)){
								$total_viaticos=0;
								for($i=0;$i<count($viaticos);$i++){							
								
								$subtotal_viaticos= $viaticos[$i]['valor'];
								$total_viaticos= $total_viaticos+$subtotal_viaticos;								
								}									
							}
							
							//CODIGO PARA CALCULAR "OTROS"
							$sql11 = "select * from gastos where categoria='otros' and fecha_de_dato='$fecha_de_pago'";
							$res11 = mysql_query($sql11,$con);
							while($reg11 = mysql_fetch_array($res11)){
								if(isset($reg11["id_gastos"])){						
									$id_gastos=$reg11["id_gastos"];
									$fecha_de_dato=$reg11["fecha_de_dato"];
									$proveedor=$reg11["proveedor"];
									$categoria=$reg11["categoria"];
									$subcategoria=$reg11["subcategoria"];
									$item=$reg11["item"];
									$valor=$reg11["valor"];
									$pagado_con=$reg11["pagado_con"];

									$otros[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($otros)){
								$total_otros=0;
								for($i=0;$i<count($otros);$i++){							
								
								$subtotal_otros= $otros[$i]['valor'];
								$total_otros= $total_otros+$subtotal_otros;								
								}									
							}
							
							//CODIGO PARA CALCULAR INTERNET Y TELECOMUNICACIONES
							$sql12 = "select * from gastos where categoria='internet_telecomunicaciones' and fecha_de_dato='$fecha_de_pago'";
							$res12 = mysql_query($sql12,$con);
							while($reg12 = mysql_fetch_array($res12)){
								if(isset($reg12["id_gastos"])){						
									$id_gastos=$reg12["id_gastos"];
									$fecha_de_dato=$reg12["fecha_de_dato"];
									$proveedor=$reg12["proveedor"];
									$categoria=$reg12["categoria"];
									$subcategoria=$reg12["subcategoria"];
									$item=$reg12["item"];
									$valor=$reg12["valor"];
									$pagado_con=$reg12["pagado_con"];

									$internet_telecomunicaciones[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($internet_telecomunicaciones)){
								$total_internet_telecomunicaciones=0;
								for($i=0;$i<count($internet_telecomunicaciones);$i++){							
								
								$subtotal_internet_telecomunicaciones= $internet_telecomunicaciones[$i]['valor'];
								$total_internet_telecomunicaciones= $total_internet_telecomunicaciones+$subtotal_internet_telecomunicaciones;								
								}									
							}
							
							//CODIGO PARA CALCULAR IVAs
							$sql13 = "select * from gastos where categoria='iva_compra' and fecha_de_dato='$fecha_de_pago'";
							$res13 = mysql_query($sql13,$con);
							while($reg13 = mysql_fetch_array($res13)){
								if(isset($reg13["id_gastos"])){						
									$id_gastos=$reg13["id_gastos"];
									$fecha_de_dato=$reg13["fecha_de_dato"];
									$proveedor=$reg13["proveedor"];
									$categoria=$reg13["categoria"];
									$subcategoria=$reg13["subcategoria"];
									$item=$reg13["item"];
									$valor=$reg13["valor"];
									$pagado_con=$reg13["pagado_con"];

									$iva_compra[]=array('id_gastos'=>$id_gastos,'fecha_de_dato'=>$fecha_de_dato,'proveedor'=>$proveedor,'categoria'=>$categoria,'subcategoria'=>$subcategoria,'item'=>$item,'valor'=>$valor,'pagado_con'=>$pagado_con);
								
								}
							}
							
							if(isset($iva_compra)){
								$total_iva_compra=0;
								for($i=0;$i<count($iva_compra);$i++){							
								
								$subtotal_iva_compra= $iva_compra[$i]['valor'];
								$total_iva_compra= $total_iva_compra+$subtotal_iva_compra;								
								}									
							}

						?>
						
                        <tbody>
							
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    Ingresos
                                </td>
                                <td>
                                    <?php echo $total_ventas; ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Materias Primas
                                </td>
                                <td>
                                    <?php 
									$peso_materias_primas = $total_materias_primas / $total_ventas *100;
									echo $total_materias_primas ?>
									<span class="label label-warning">(<?php echo $peso_materias_primas;?>%)</span>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Utilidad Bruta
                                </td>
                                <td>
                                    <?php 
										$utilidad_bruta = $total_ventas - $total_materias_primas;
										if($total_ventas>=$total_materias_primas){
									?>
										<span class="label label-success"> <?php echo $utilidad_bruta ?> </span>
									<?php }else{
									?>
										<span class="label label-danger"> <?php echo $utilidad_bruta ?> </span>
									<?php }
									?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Transporte y Mensajeria
                                </td>
                                <td>
                                    <?php echo $total_transporte_mensajeria ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Salarios
                                </td>
                                <td>
                                    <?php echo $total_salarios ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Arrendamientos
                                </td>
                                <td>
                                    <?php echo $total_arrendamientos ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Servicios Bancarios
                                </td>
                                <td>
                                    <?php echo $total_servicios_bancarios ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Servicios Publicos
                                </td>
                                <td>
                                    <?php echo $total_servicios_publicos ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Publicidad
                                </td>
                                <td>
                                    <?php echo $total_publicidad ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Viáticos
                                </td>
                                <td>
                                    <?php echo $total_viaticos ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Otros
                                </td>
                                <td>
                                    <?php echo $total_otros ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Internet y Telecomunicaciones
                                </td>
                                <td>
                                    <?php echo $total_internet_telecomunicaciones ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    Utilidad Antes de Impuestos
                                </td>
                                <td>
                                    <?php 
									$utilidad_antes_de_impuestos = 
									$total_ventas
									- $total_materias_primas
									- $total_transporte_mensajeria
									- $total_salarios
									- $total_arrendamientos
									- $total_servicios_bancarios
									- $total_servicios_publicos
									- $total_publicidad
									- $total_viaticos
									- $total_otros
									- $total_internet_telecomunicaciones;

									
									echo $utilidad_antes_de_impuestos ?>
                                </td>
							</tr>
							<tr class="first">
                                <td>
                                    IVAs
                                </td>
                                <td>
                                    <?php echo $total_iva_compra ?>
                                </td>
							</tr>
							
							<tr class="first">
                                <td>
                                    Utilidad Neta
                                </td>
                                <td>
                                    <?php 
										$utilidad_neta = $utilidad_antes_de_impuestos - $total_iva_compra;
										$peso_utilidad_neta = $utilidad_neta / $total_ventas * 100;
										if($utilidad_neta>=0){
									?>
										<span class="label label-success"> <?php echo $utilidad_neta ?> </span>
									<?php }else{
									?>
										<span class="label label-danger"> <?php echo $utilidad_neta ?> </span>
									<?php } 
									?>
									<span class="label label-warning">(<?php echo $peso_utilidad_neta; ?>)</span>									
                                </td>
							</tr>
							
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