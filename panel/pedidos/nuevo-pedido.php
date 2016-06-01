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
	<title>Nuevo Pedido | FloresyMas.co</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <!-- bootstrap -->
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- libraries -->
    <link href="../css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="../css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="../css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="../css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="../css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="../css/compiled/icons.css" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="../css/compiled/form-showcase.css" type="text/css" media="screen" />
    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />	
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../../assets/validacion/validar-pedido-panel.js"></script>
	
	<!--end validate-->	
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <!-- navbar -->
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->
    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard3.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">     
        <div id="pad-wrapper" class="form-page">
			<h3>Nuevo Pedido Manual</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form name="form" action="procesar-pedido-nuevo" method="post">					
                        <h4>Carrito de Compras ------------</h3><br><br>
						<div class="field-box">
							<label>Nombre del Producto</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_del_producto" class="form-control inline-input" placeholder="ingrese el total"/>
								<div id="div_nombre_del_producto"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Unidades de Rosas:</label>
                            <div class="col-md-7">
								<select name="unidades_de_rosas" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="12 Unidades">12 Unidades</option>
									<option value="18 Unidades">18 Unidades</option>
									<option value="24 Unidades">24 Unidades</option>
                                </select>
								<div id="div_unidades_de_rosas"></div>
							</div>							
                        </div>
						<div class="field-box">
							<label>Color de Rosas:</label>
                            <div class="col-md-7">
								<select name="colores_de_rosas" style="width:350px" class="select2">
                                    <option value="">Seleccionar</option>
									<option value="Rojas" >Rojas</option>
									<option value="Rosadas" >Rosadas</option>
									<option value="Amarillas" >Amarillas</option>
									<option value="Blancas" >Blancas</option>
									<option value="Invitadas" >Invitadas</option>
									<option value="Combinadas" >Combinadas</option>
                                </select>
								<div id="div_colores_de_rosas"></div>
							</div>							
                        </div>
						<div class="field-box">
							<label>Numero de Productos:</label>
                            <div class="col-md-7">
								<select name="cantidad" style="width:350px" class="select2">                            
									<option value="">Seleccionar</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>				
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>									
                                </select>
								<div id="div_cantidad"></div>
							</div>							
                        </div>
						<div class="field-box">
							<label>Total a Pagar</label>
							<div class="col-md-7">
								<input type="text"  value="" name="total" class="form-control inline-input" placeholder="ingrese el total"/>
								<div id="div_total"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Estado del Pedido:</label>
                            <div class="col-md-7">
								<select name="estado_pedido" style="width:350px" class="select2">                            
									<option value="1">Pendiente</option>
									<option value="5">Pagado</option>
									<option value="15">Confirmado</option>				
									<option value="7">Abortado</option>
                                </select>
							</div>
                        </div><br><br><br><br>						
						<h4>Paso 1 ------------</h3><br><br>	
						<div class="field-box">
							<label>Año, Mes y Dia de Entrega:</label>
                            <div class="col-md-2">
								<select name="ano_de_entrega" style="width:115px" class="select2">                               
									<option value="2015">2015</option>
                                </select>
							</div>
							<div class="col-md-2">
								<select name="mes_de_entrega" style="width:115px" class="select2">                                
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
                                </select>
							</div>
							<div class="col-md-2">
								<select name="dia_de_entrega" style="width:115px" class="select2">                                  
									<option value="">Seleccionar</option>
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
                        </div>
						<div class="field-box">
							<label>Hora de Entrega:</label>
                            <div class="col-md-7">
								<select name="hora_de_entrega" style="width:350px" class="select2">                                 
									<option value="">Seleccionar</option>
									<option value="En Menos de 90 Minutos">En Menos de 90 Minutos</option>
									<option value="7am - 11am">7am - 11am</option>
									<option value="11am - 3pm">11am - 3pm</option>
									<option value="3pm - 7pm">3pm - 7pm</option>
                                </select>
								<div id="div_hora_de_entrega"></div>
							</div>							
                        </div>
						<div class="field-box">
							<label>Ciudad de Entrega:</label>
                            <div class="col-md-7">
								<select name="ciudad_de_entrega" style="width:350px" class="select2">                                
									<option value="Bogota">Bogota</option>
                                </select>
							</div>
                        </div>
						<div class="field-box">
							<label>Direccion de Entrega:</label>
                            <div class="col-md-2">
								<select name="dir_1_entrega" style="width:115px" class="select2">                                
									<option value="">Seleccionar</option>
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
								<div id="div_dir_1_entrega"></div><br>
							</div>
							<div class="col-md-2">
								<input type="text"  value="" name="dir_2_entrega" class="form-control inline-input" placeholder="" style="width:115px"/>
								<div id="div_dir_2_entrega"></div>
							</div>
							<div class="col-md-2">
								<input type="text"  value="" name="dir_3_entrega" class="form-control inline-input" placeholder="#" style="width:115px"/>
								<div id="div_dir_3_entrega"></div>
							</div>
						</div>
						<div class="field-box">
							<label></label>
							<div class="col-md-2">
								<select name="dir_4_entrega" style="width:115px" class="select2">                                
									<option value="">Seleccionar</option>
									<option value="Apartamento">Apartamento</option>
									<option value="Oficina">Oficina</option>
									<option value="Casa">Casa</option>
									<option value="Otro">Otro</option>
                                </select>
								<div id="div_dir_4_entrega"></div>
							</div>
							<div class="col-md-2">
								<input type="text"  value="" name="dir_5_entrega" class="form-control inline-input" placeholder="#" style="width:115px"/>
								<div id="div_dir_5_entrega"></div>
							</div>
						</div>	
						<div class="field-box">
							<label>Barrio</label>
							<div class="col-md-7">
								<input type="text"  value="" name="barrio" class="form-control inline-input" placeholder="ingrese el barrio"/>
								<div id="div_barrio"></div>
							</div>
						</div>
						<div class="field-box">
                            <label>Ayuda Envio:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="ayuda_envio"></textarea>
								<div id="div_ayuda_envio"></div>
                            </div>
                        </div>
						<div class="field-box">
							<label>Nombre de Quien Envia</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_envia" class="form-control inline-input" placeholder="nombre envia"/>
								<div id="div_nombre_de_quien_envia"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Nombre de Quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_recibe" class="form-control inline-input" placeholder="nombre recibe"/>
								<div id="div_nombre_de_quien_recibe"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Telefono de Quien Recibe</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefono_de_quien_recibe" class="form-control inline-input" placeholder="telefono recibe"/>
								<div id="div_telefono_de_quien_recibe"></div>
							</div>
						</div>
						<div class="field-box">
                            <label>Mensaje de la Tarjeta:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="mensaje_para_tarjeta"></textarea>
								<div id="div_mensaje_para_tarjeta"></div>
                            </div>
                        </div>
						<div class="field-box">
                            <label>Observaciones y Comentarios:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="" rows="4" name="observaciones_comentarios"></textarea>
                            </div>
                        </div>
						<br><br><br><br>						
						<h4>Paso 2 ------------</h3><br><br>	
						<div class="field-box">
							<label>Nombre de Quien LLama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="nombre_de_quien_llama" class="form-control inline-input" placeholder="ingrese nombre de quien llama" />
								<div id="div_nombre_de_quien_llama"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Teléfonos de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="telefono_de_quien_llama" class="form-control inline-input" placeholder="ingrese telefonos de quien llama"/>
								<div id="div_telefono_de_quien_llama"></div>
							</div>
						</div>
						<div class="field-box">
							<label>Email de Quien Llama</label>
							<div class="col-md-7">
								<input type="text"  value="" name="email_de_quien_llama" class="form-control inline-input" placeholder="ingrese email de quien llama"/>
								<div id="div_email_de_quien_llama"></div>
							</div>
						</div>
						<br>	
						<div>	
							<input type="button" class="btn-glow primary btn-next" value="Subir" onClick="validar()">
							<input type="hidden" name="fecha_de_pedido" value="<?php echo date('m/d/Y')?>"/>	
							<input type="hidden" name="fecha_de_pago" value="<?php echo date('m/d/Y')?>"/>
							<input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- end main container -->
	<!-- scripts for this page -->
    <script src="../js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.datepicker.js"></script>
    <script src="../js/jquery.uniform.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/theme.js"></script>
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
	<?php
		}
	?>
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