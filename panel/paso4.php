<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	$sql="select * from pedido_manual 
	where id_pedido_manual='".$_GET["id_pedido_manual"]."'"; 

	$res = mysql_query($sql,$con);
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Paso 3 | Pedido Nuevo | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- validate-->
		<script language="javascript" type="text/javascript" src="js/validacion-paso4.js"></script>
	<!--end validate-->
	
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
        
		
		<?php
			if($reg = mysql_fetch_array($res)){
		?>
        <div id="pad-wrapper" class="form-page">
			<h3>Pedido Nuevo</h3><br><br>
            <div class="row form-wrapper">                							
				<img src="img/pasos/paso4.png"/ class="col-md-8 img-responsive"><br><br><br><br><br><br>			
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-paso4.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>" method="post">					
                        <div class="field-box">
							<label>Nombre de quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_recibe" class="form-control inline-input" placeholder="ingrese nombre de quien recibe" />
							</div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefono_de_quien_recibe" class="form-control inline-input" placeholder="ingrese telefonos de quien recibe"/>
							</div>
						</div>
						<div class="field-box">
							<label>Dirección de Entrega</label>
							<div class="col-md-7">
								<input type="text"  value="" name="direccion_de_entrega" class="form-control inline-input" placeholder="ingrese direccion de entrega"/>
							</div>
						</div>
						<div class="field-box">
							<label>Barrio de Entrega</label>
							<div class="col-md-7">
								<input type="text"  value="" name="barrio_de_entrega" class="form-control inline-input" placeholder="ingrese barrio de entrega"/>
							</div>
						</div>
						<div class="field-box">
							<label>Sector de Entrega:</label>
                            <div class="col-md-7">
								<select name="sector_de_entrega" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="norte">Norte (desde Cabañitas)</option>
									<option value="noroccidente">NorOccidente (desde Robledo)</option>
									<option value="nororiente">NorOriente (Buenos Aires)</option>
									<option value="centro">Centro</option>
									<option value="sur">Sur (desde SanDiego)</option>
									<option value="suroccidente">SurOccidente (desde Guayabal)</option>
									<option value="occidente">Occidente (desde Belen)</option>
									<option value="fuera_ciudad">Fuera de la Ciudad</option>
								</select>
							</div>
                        </div>
						<div class="field-box">
                            <label>Mensaje para Tarjeta:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" rows="4" name="mensaje_para_tarjeta"></textarea>
                            </div>
                        </div>
						<div class="field-box">
                            <label>Observaciones (comentarios / modificaciones):</label>
                            <div class="col-md-7">
                                <textarea class="form-control" rows="4" name="observaciones_comentarios"></textarea>
                            </div>
                        </div>
						<div class="field-box">
                            <label>Retroalimentacion:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" rows="4" name="retroalimentacion"></textarea>
                            </div>
                        </div>
						<div class="field-box">
							<label>Entregado o No?:</label>
                            <div class="col-md-7">
								<select name="entregado" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="ya_entregado">Ya Entregado</option>
									<option value="no_entregado">No Entregado</option>
								</select>
							</div>
                        </div>
						<div class="field-box">
							<label>Es Primera Vez que Compra con Nosotros?</label>
                            <div class="col-md-7">
								<select name="primera_vez" style="width:350px" class="select2">
                                    <option value="" >Seleccione</option>
									<option value="si" >Sí</option>
									<option value="varias_veces" >No, ya he comprado antes</option>
								</select>								
							</div>
							<div id="div_primera_vez"></div>
                        </div>
						<div class="field-box">
							<label>Fue Referido por Alguien?</label>
                            <div class="col-md-7">
								<select name="referido" style="width:350px" class="select2">
                                    <option value="" >Seleccione</option>
									<option value="si" >Sí</option>
									<option value="no" >No</option>
								</select>								
							</div>
							<div id="div_referido"></div>
                        </div>
						<div class="field-box">
							<label>Como se dio Cuenta de Nosotros?</label>
                            <div class="col-md-7">
								<select name="fuente_trafico" style="width:350px" class="select2">
                                    <option value="" >Seleccione</option>
									<option value="referido" >Me lo Refirieron</option>
									<option value="google" >Los encontré en Google</option>
									<option value="facebook" >Los encontré en Facebook</option>
									<option value="otra_red_social" >Los encontré por otra Red Social</option>
									<option value="activacion" >Recibi Publicidad de Ustedes en la Calle</option>
								</select>								
							</div>
							<div id="div_fuente_trafico"></div>
                        </div>
						<div class="field-box">
							<label>Estado de Pedido:</label>
                            <div class="col-md-7">
								<select name="estado_pedido" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="pendiente">Pendiente de Pago</option>
									<option value="realizado">Realizado el Pago</option>
									<option value="abortado">Abortado el Pago</option>
								</select>								
							</div>
							<div id="div_estado_pedido"></div>
                        </div>
						<br>
						<div class="wizard-actions">
							<input type="button" class="btn-glow success btn-finish" value="Finalizar" onClick="validar()"/>
							<input type="hidden" name="id_pedido_manual" value="<?php echo $_GET["id_pedido_manual"];?>"/>
							<input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>
							<input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
							<input type="hidden" name="fecha_de_entrega" value="<?php echo $reg["fecha_de_entrega"]; ?>"/>
							<input type="hidden" name="hora_de_entrega" value="<?php echo $reg["hora_de_entrega"]; ?>"/>
							<input type="hidden" name="tipo_de_producto" value="<?php echo $reg["tipo_de_producto"]; ?>"/>
							<input type="hidden" name="atendido_por" value="<?php echo $reg["atendido_por"]; ?>"/>
							<input type="hidden" name="nombre_del_producto" value="<?php echo $reg["nombre_del_producto"]; ?>"/>
							<input type="hidden" name="precio_del_producto" value="<?php echo $reg["precio_del_producto"]; ?>"/>
							<input type="hidden" name="valor_del_envio" value="<?php echo $reg["valor_del_envio"]; ?>"/>
							<input type="hidden" name="total_compra" value="<?php echo $reg["total_compra"]; ?>"/>
							<input type="hidden" name="metodo_pago" value="<?php echo $reg["metodo_pago"]; ?>"/>
							<input type="hidden" name="confirmacion_pago" value="<?php echo $reg["confirmacion_pago"]; ?>"/>
							<input type="hidden" name="nombre_de_quien_llama" value="<?php echo $reg["nombre_de_quien_llama"]; ?>"/>
							<input type="hidden" name="telefonos_de_quien_llama" value="<?php echo $reg["telefonos_de_quien_llama"]; ?>"/>
							<input type="hidden" name="email_de_quien_llama" value="<?php echo $reg["email_de_quien_llama"]; ?>"/>
							<input type="hidden" name="nombre_de_quien_envia" value="<?php echo $reg["nombre_de_quien_envia"]; ?>"/>
							<input type="hidden" name="metodo_de_contacto" value="<?php echo $reg["metodo_de_contacto"]; ?>"/>
							<input type="hidden" name="cedula" value="<?php echo $reg["cedula"]; ?>"/>
							<input type="hidden" name="con_sin_factura" value="<?php echo $reg["con_sin_factura"]; ?>"/>
							<input type="hidden" name="direccion_facturacion" value="<?php echo $reg["direccion_facturacion"]; ?>"/>
							
						</div>
                    </form>
                </div>               
            </div>
        </div>
		<?php
			}
		?>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/theme.js"></script>

    <!-- call this page plugins -->
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.input-datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
        });
    </script>
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