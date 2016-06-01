<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pedido Nuevo | FloresyMas.co</title>
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
		<script language="javascript" type="text/javascript" src="js/validacion-paso1.js"></script>
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
        
		
       
        <div id="pad-wrapper" class="form-page">
			<h3>Pedido Nuevo</h3><br><br>
            <div class="row form-wrapper">                							
				<img src="img/pasos/paso1.png"/ class="col-md-8 img-responsive"><br><br><br><br><br><br>			
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-pedido-nuevo" method="post">					
                        <div class="field-box">
							<label>Fecha de Pedido:</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_pedido" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_pedido"></div>
						</div>															
						<div class="field-box">
							<label>Fecha de Pago:</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_pago" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_pago"></div>
						</div>						
						<div class="field-box">
							<label>Fecha de Entrega:</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_entrega" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_entrega"></div>
						</div>						
						<div class="field-box">
							<label>Hora de Entrega:</label>
                            <div class="col-md-7">
								<select name="hora_de_entrega" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
                                    <option value="7am - 9am (Desayuno)">7am - 9am (Desayuno)</option>
									<option value="8am - 10am">8am - 10am</option>
									<option value="10am - 12md">10am - 12md</option>
									<option value="12md - 2pm">12md - 2pm</option>
									<option value="2pm - 4pm">2pm - 4pm</option>
									<option value="4pm - 6pm">4pm - 6pm</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>						
						<div class="field-box">
                            <label>Tipo de Producto</label>
							<div class="col-md-7">
								<select name="tipo_de_producto" style="width:350px" class="select2">
									<option value="">Seleccionar</option>
									<option value="Arreglo Floral">Arreglo Floral</option>
									<option value="Desayuno Sorpresa">Desayuno Sorpresa</option>
								</select>
							</div>
							<div id="div_tipo_de_producto"></div>
                        </div>						
						<div class="field-box">
                            <label>Atendido Por:</label>
                            <div class="col-md-7">
								<select name="atendido_por" style="width:350px" class="select2">
									<option value="">Seleccionar</option>
									<option value="Empleado_Temporal">Empleado Temporal</option>
									<option value="Angelica_Escobar">Angelica Escobar</option>
									<option value="Daniel_Morales">Daniel Morales</option>
									<option value="Camila Velasquez">Camila Velasquez</option>
									<option value="Alejandra Vidal">Alejandra Vidal</option>
								</select>
							</div>
							<div id="div_atendido_por"></div>
                        </div>						
						<br>
						<div>
							<input type="button" class="btn-glow primary btn-next" value="Continuar" onClick="validar()"/>
						</div>
                    </form>
                </div>
            </div>
        </div>
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