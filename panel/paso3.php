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
		<script language="javascript" type="text/javascript" src="js/validacion-paso3.js"></script>
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
				<img src="img/pasos/paso3.png"/ class="col-md-8 img-responsive"><br><br><br><br><br><br>			
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-paso3.php?id_pedido_manual=<?php echo $reg["id_pedido_manual"];?>" method="post">					
                        <div class="field-box">
							<label>Nombre de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_llama" class="form-control inline-input" placeholder="ingrese nombre de quien llama" />
							</div>
							<div id="div_nombre_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Cédula de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="cedula" class="form-control inline-input" placeholder="ingrese la cedula de quien llama" />
							</div>
							<div id="div_cedula"></div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefonos_de_quien_llama" class="form-control inline-input" placeholder="ingrese telefonos de quien llama"/>
							</div>
							<div id="div_telefonos_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Email de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="email_de_quien_llama" class="form-control inline-input" placeholder="ingrese email de quien llama"/>
							</div>
							<div id="div_email_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Direccion de Facturacion</label>
							<div class="col-md-7">
								<input type="text"  value="" name="direccion_facturacion" class="form-control inline-input" placeholder="ingrese la direccion de facturacion"/>
							</div>
							<div id="div_direccion_facturacion"></div>
						</div>						
						<div class="field-box">
							<label>Nombre del Remitente (¿Quien Envia?)</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_envia" class="form-control inline-input" placeholder="ingrese nombre de quien envia"/>
							</div>
						</div>
						<div class="field-box">
							<label>Metodo de Contacto:</label>
                            <div class="col-md-7">
								<select name="metodo_de_contacto" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="chat">Chat</option>
									<option value="telefono">Telefono</option>
								</select>
							</div>
							<div id="div_metodo_de_contacto"></div>
                        </div>
						<div class="field-box">
							<label>Con o Sin Factura?</label>
                            <div class="col-md-7">
								<select name="con_sin_factura" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="con_factura">Con Factura</option>
									<option value="sin_factura">Sin Factura</option>
								</select>
							</div>
							<div id="div_con_sin_factura"></div>
                        </div>
						<br>
						<div class="wizard-actions">
							<input type="button" class="btn-glow primary btn-next" value="Continuar" onClick="validar()"/>
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