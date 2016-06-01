<?php
	session_start();
	if($_SESSION["usuario"]){
	require_once("../conexion.php");
	
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido | FloresyMas.co</title>
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
			<h3>Nuevo Pedido</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-nuevo-pedido" method="post">					
                        <h4>Carrito de Compras ------------</h3><br><br>				
						<div class="field-box">
							<label>Nombre del Producto:</label>
                            <div class="col-md-7">
								<select name="nombre_del_producto" style="width:350px" class="select2">
                                    <option value="Pixel Box">Pixel Box</option>
									<option value="Sierra Box">Sierra Box</option>
									<option value="Premium Box">Premium Box</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Cantidad</label>
							<div class="col-md-7">
								<input type="text"  value="" name="cantidad" class="form-control inline-input" placeholder="ingrese la cantidad" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Total (Sin puntos, comas, signos o separaciones)</label>
							<div class="col-md-7">
								<input type="text"  value="" name="total" class="form-control inline-input" placeholder="total" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Estado del Pedido:</label>
                            <div class="col-md-7">
								<select name="estado_pedido" style="width:350px" class="select2">                            
									<option value="Pendiente">Pendiente</option>
									<option value="Realizado">Realizado</option>
									<option value="Confirmado">Confirmado</option>				
									<option value="Abortado">Abortado</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div><br><br><br><br>
						
						<h4>Paso 1 ------------</h3><br><br>	
						<div class="field-box">
							<label>Fecha de Pedido</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_pedido" class="form-control inline-input" placeholder="fecha de pedido"/>
							</div>
						</div>
						<div class="field-box">
							<label>Fecha de Pago</label>
							<div class="col-md-7">
								<input type="text"  value="" name="fecha_de_pago" class="form-control inline-input" placeholder="fecha de pago"/>
							</div>
						</div>
						<div class="field-box">
							<label>Año, Mes y Dia de Entrega:</label>
                            <div class="col-md-2">
								<select name="ano_de_entrega" style="width:115px" class="select2">                               
									<option value="2015">2015</option>

                                </select>
							</div>
							<div class="col-md-2">
								<select name="mes_de_entrega" style="width:115px" class="select2">                                
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>

                                </select>
							</div>
							<div class="col-md-2">
								<select name="dia_de_entrega" style="width:115px" class="select2">                                  
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Hora de Entrega:</label>
                            <div class="col-md-7">
								<select name="hora_de_entrega" style="width:350px" class="select2">                                 
									<option value="En Menos de 90 Minutos">En Menos de 90 Minutos</option>
									<option value="7am - 11am">7am - 11am</option>
									<option value="11am - 3pm">11am - 3pm</option>
									<option value="3pm - 7pm">3pm - 7pm</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Ciudad de Entrega:</label>
                            <div class="col-md-7">
								<select name="ciudad_de_entrega" style="width:350px" class="select2">                                
									<option value="Bogota">Bogota</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Direccion de Entrega:</label>
                            <div class="col-md-2">
								<select name="dir_1_entrega" style="width:115px" class="select2">                                
									<option value="Calle">Calle</option>
									<option value="Carrera">Carrera</option>
									<option value="Avenida">Avenida</option>
									<option value="Avenida Carrera">Avenida Carrera</option>
									<option value="Avenida Calle">Avenida Calle</option>
									<option value="Circular">Circular</option>
									<option value="Circunvalar">Circunvalar</option>
									<option value="Diagonal">Diagonal</option>
									<option value="Manzana">Manzana</option>
									<option value="Transversal">Transversal</option>
									<option value="Via">Vía</option>
                                </select>
							</div>
							<div class="col-md-2">
								<input type="text"  value="" name="dir_2_entrega" class="form-control inline-input" placeholder="ingrese valor de envio" style="width:115px"/>
							</div>
							<div class="col-md-2">
								<input type="text"  value="" name="dir_3_entrega" class="form-control inline-input" placeholder="ingrese valor de envio" style="width:115px"/>
							</div>
						</div>					
						<div class="field-box">
							<label>Barrio</label>
							<div class="col-md-7">
								<input type="text"  value="" name="barrio" class="form-control inline-input" placeholder="ingrese valor de envio"/>
							</div>
						</div>
						<div class="field-box">
                            <label>Ayuda Envio:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="ayuda_envio"></textarea>
                            </div>
                        </div>
						<div class="field-box">
							<label>Nombre de Quien Envia</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_envia" class="form-control inline-input" placeholder="ingrese valor de envio"/>
							</div>
						</div>
						<div class="field-box">
							<label>Nombre de Quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_recibe" class="form-control inline-input" placeholder="ingrese valor de envio"/>
							</div>
						</div>
						<div class="field-box">
							<label>Telefono de Quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefono_de_quien_recibe" class="form-control inline-input" placeholder="ingrese valor de envio"/>
							</div>
						</div>
						<div class="field-box">
                            <label>Mensaje de la Tarjeta:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="mensaje_para_tarjeta"></textarea>
                            </div>
                        </div>
						<div class="field-box">
                            <label>Observaciones y Comentarios:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="observaciones_comentarios"></textarea>
                            </div>
                        </div>
						<br><br><br><br>
						
						<h4>Editar Paso 2 ------------</h3><br><br>	
						<div class="field-box">
							<label>Nombre de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_llama" class="form-control inline-input" placeholder="ingrese nombre de quien llama" />
							</div>
							<div id="div_nombre_de_quien_llama"></div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefono_de_quien_llama" class="form-control inline-input" placeholder="ingrese telefonos de quien llama"/>
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
			
						
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Subir"/>
							<input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>
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