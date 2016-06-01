<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Funnels | FloresyMas.co</title>
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
			<h3>Ingresar Datos de Gastos</h3><br><br>
            <div class="row form-wrapper">                							
						
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-gastos" method="post">					
                        <div class="field-box">
							<label>Fecha de Ingreso de Datos:</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_dato" class="form-control input-datepicker" />
							</div>
							<div id="div_fecha_de_pedido"></div>
						</div>															
						<div class="field-box">
							<label>Seleccione Proveedor:</label>
                            <div class="col-md-7">
								<select name="proveedor" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="agencia_arrendamientos">Agencia Arrendamientos</option>
									<option value="costos_vehiculos">Costo Vehiculos</option>
									<option value="operador_movil">Operador Movil</option>
									<option value="otros">Otros</option>
									<option value="parqueadero">Parqueadero</option>
									<option value="empleado">Empleado</option>
									<option value="viaticos">Viaticos</option>
									<option value="proveedor_desayunos">Proveedor Desayunos</option>
									<option value="proveedor_flores">Proveedor Flores</option>
									<option value="servicios_publicos">Servicios Publicos</option>	
									<option value="publicidad">Publicidad</option>	
									<option value="servicios_bancarios">Servicios Bancarios</option>
									<option value="gobierno">Gobierno - DIAN</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Seleccione Categoria:</label>
                            <div class="col-md-7">
								<select name="categoria" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="materias_primas">Materias Primas</option>
									<option value="transporte_mensajeria">Transporte y Mensajeria</option>
									<option value="salarios">Salarios</option>
									<option value="arrendamientos">Arrendamientos</option>
									<option value="servicios_bancarios">Servicios Bancarios</option>
									<option value="servicios_publicos">Servicios Publicos</option>
									<option value="publicidad">Publicidad</option>
									<option value="viaticos">Viaticos</option>
									<option value="otros">Otros</option>
									<option value="internet_telecomunicaciones">Internet y Telecomunicaciones</option>
									<option value="iva_compra">IVA</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Seleccione Subcategoria:</label>
                            <div class="col-md-7">
								<select name="subcategoria" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="flores">Flores</option>
									<option value="follaje">Follaje</option>
									<option value="frutas">Frutas</option>
									<option value="chocolates">Chocolates</option>
									<option value="vino">Vino</option>
									<option value="peluches">Peluches</option>
									<option value="bombas">Bombas</option>
									<option value="oasis">Oasis</option>
									<option value="bases">Bases</option>
									<option value="telas">Telas</option>
									<option value="desayunos">Desayunos</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Item</label>
							<div class="col-md-7">
								<input type="text"  value="" name="item" class="form-control inline-input" placeholder="ingrese el nombre del item" />
							</div>
						</div>
						<div class="field-box">
							<label>Valor Gasto</label>
							<div class="col-md-7">
								<input type="text"  value="" name="valor" class="form-control inline-input" placeholder="ingrese el valor total del gasto" />
							</div>
						</div>											
						<div class="field-box">
							<label>Pagado con:</label>
                            <div class="col-md-7">
								<select name="pagado_con" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="banco">Banco </option>				
									<option value="caja">Caja</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>			
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Ingresar" />
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