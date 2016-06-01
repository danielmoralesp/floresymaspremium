<?php
	session_start();
	if($_SESSION["usuario"]){	
	
	require_once("../conexion.php");
	$sql="select * from producto
	where id_producto = ".$_GET["id_producto"]."";
	$res = mysql_query($sql,$con);

	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto | FloresyMas.co</title>
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
	
	<script language="javascript" type="text/javascript">
		function eliminar(id){
			if(confirm("Realmente desea eliminar el producto?")){
				window.location="eliminar-producto.php?id_producto="+id;
			}
		}
	</script>
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
			<h3>Editar Producto</h3><br><br>
			<div class="row filter-block">
                    <div class="pull-right">                        
						<a class="btn-flat warning new-product" href="javascript:void(0)" onClick="eliminar('<?php echo $reg["id_producto"];?>')">Eliminar Producto</a>
                    </div><br><br>
                </div>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">					
                    <form accept-charset="UTF-8" name="form" action="edit-producto.php?id_producto=<?php echo $reg["id_producto"];?>" method="post" enctype="multipart/form-data">					
                        <h4>Datos del Producto (Front-End)------------</h3><br><br>				
						<div class="field-box">
							<label>Producto Padre?:</label>
                            <div class="col-md-7">
								<select name="producto_padre" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["producto_padre"]; ?>"><?php echo $reg["producto_padre"]; ?></option>
									<option value="si">Si</option>
									<option value="no">No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Nombre del Producto (Tipo Producto + Color):</label>
                            <div class="col-md-7">
								<input type="text"  name="nombre_del_producto" value="<?php echo $reg["nombre_del_producto"]; ?>" class="form-control inline-input" placeholder="nombre del producto" />
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Precio del Producto (Sin puntos, comas, signos o separaciones)</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg["precio_del_producto"]; ?>" name="precio_del_producto" class="form-control inline-input" placeholder="precio del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Disponible para Entrega en 90 Minutos?:</label>
                            <div class="col-md-7">
								<select name="menos_de_90_min" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["menos_de_90_min"]; ?>"><?php echo $reg["menos_de_90_min"]; ?></option>
									<option value="si">Si</option>
									<option value="no">No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Orden de Importancia:</label>
                            <div class="col-md-7">
								<select name="orden_importancia" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["orden_importancia"]; ?>"><?php echo $reg["orden_importancia"]; ?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Tipo de Producto:</label>
                            <div class="col-md-7">
								<select name="tipo_de_producto" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["tipo_de_producto"]; ?>"><?php echo $reg["tipo_de_producto"]; ?></option>
									<option value="Premium Box">Premium Box</option>
									<option value="Pixel Box" >Pixel Box</option>
									<option value="Sierra Box" >Sierra Box</option>
									<option value="Coiba Box" >Coiba Box</option>
									<option value="Chocolate" >Chocolate</option>
									<option value="Peluche" >Peluche</option>
									<option value="Vino" >Vino</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Colores de Rosas:</label>
                            <div class="col-md-7">
								<select name="colores_de_rosas" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["colores_de_rosas"]; ?>"><?php echo $reg["colores_de_rosas"]; ?></option>
									<option value="Rojas" >Rojas</option>
									<option value="Rosadas" >Rosadas</option>
									<option value="Amarillas" >Amarillas</option>
									<option value="Blancas" >Blancas</option>
									<option value="Invitadas" >Invitadas</option>
									<option value="Combinadas" >Combinadas</option>
									<option value="Cafe Oscuro" >Cafe Oscuro</option>
									<option value="Cafe Claro" >Cafe Claro</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Unidades de Rosas:</label>
                            <div class="col-md-7">
								<select name="unidades_de_rosas" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["unidades_de_rosas"]; ?>"><?php echo $reg["unidades_de_rosas"]; ?></option>
									<option value="12" >12</option>
									<option value="18" >18</option>
									<option value="24" >24</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Tamaño del Producto:</label>
                            <div class="col-md-7">
								<select name="tamano_del_producto" style="width:350px" class="select2">
                                    <option value="<?php echo $reg["tamano_del_producto"]; ?>"><?php echo $reg["tamano_del_producto"]; ?></option>
									<option value="90cm * 23cm * 8cm" >90cm(Largo) * 23cm(Ancho) * 8cm(Alto)</option>
									<option value="23cm * 23cm * 20cm" >23cm(Largo) * 23cm(Ancho) * 20cm(Alto)</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>En Inventario:</label>
                            <div class="col-md-7">
								<select name="en_inventario" style="width:350px" class="select2">
									<option value="<?php echo $reg["en_inventario"]; ?>"><?php echo $reg["en_inventario"]; ?></option>
									<option value="si" >Sí</option>
									<option value="no" >No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Producto Incluye:</label>
                            <div class="col-md-7">
								<select name="producto_incluye" style="width:350px" class="select2">
									<option value="<?php echo $reg["producto_incluye"]; ?>"><?php echo $reg["producto_incluye"]; ?></option>
									<option value="Nada" >Nada</option>
									<option value="Flores con Frutas" >Frutas</option>
									<option value="Flores con Chocolates" >Chocolate</option>
									<option value="Flores con Peluche" >Peluche</option>
									<option value="Flores con Vino" >Vino</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Ocasion del Producto:</label>
                            <div class="col-md-7">
								<select name="ocasion_del_producto" style="width:350px" class="select2">
									<option value="<?php echo $reg["ocasion_del_producto"]; ?>"><?php echo $reg["ocasion_del_producto"]; ?></option>
									<option value="Flores para Cumpleanos" >Cumpleaños</option>
									<option value="Flores para Romance" >Romance</option>
									<option value="Flores para Funeral" >Funeral</option>
									<option value="Flores para Otra Ocasion" >Otra Ocasión</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
                            <label>Descripcion del Producto:</label>
                            <div class="col-md-7">
                                <textarea class="form-control" value="<?php echo $reg["descripcion_del_producto"]; ?>" rows="4" name="descripcion_del_producto"><?php echo $reg["descripcion_del_producto"]; ?></textarea>
                            </div>
                        </div>
						<div class="control-group">
							<label class="control-label" for="inputEmail1">Foto Grande</label>
							
							  <input type="file" name="foto_grande" placeholder="Foto Grande"/>
							
						</div><br>

						<div class="control-group">
							<label class="control-label" for="inputEmail1">Foto Thumbnail </label>
						
							  <input type="file" name="foto_thumbnail" placeholder="Foto Thumbnail"/>
						
						</div>	
						
						<br><br><br><br>
						
						<h4>Datos del Producto (Back-Office / Iventario)------</h3><br><br>	
						<div class="field-box">
							<label>Flor 1 Principal:</label>
                            <div class="col-md-7">
								<select name="flor_1_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_1_principal"]; ?>"><?php echo $reg["flor_1_principal"]; ?></option>
									<option value="Hot Paris">Hot Paris</option>
									<option value="Jade">Jade</option>
									<option value="Vendela">Vendela</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 1 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_1_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_1_principal"]; ?>"><?php echo $reg["unidades_flor_1_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 2 Principal:</label>
                            <div class="col-md-7">
								<select name="flor_2_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_2_principal"]; ?>"><?php echo $reg["flor_2_principal"]; ?></option>
									<option value="Hot Paris">Hot Paris</option>
									<option value="Jade">Jade</option>
									<option value="Vendela">Vendela</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 2 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_2_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_2_principal"]; ?>"><?php echo $reg["unidades_flor_2_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 3 Principal:</label>
                            <div class="col-md-7">
								<select name="flor_3_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_3_principal"]; ?>"><?php echo $reg["flor_3_principal"]; ?></option>
									<option value="Hot Paris">Hot Paris</option>
									<option value="Jade">Jade</option>
									<option value="Vendela">Vendela</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 3 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_3_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_3_principal"]; ?>"><?php echo $reg["unidades_flor_3_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						
						---------------------------------------------------------------------------------<br><br><br>
						
						<div class="field-box">
							<label>Flor 1 Secundaria:</label>
                            <div class="col-md-7">
								<select name="flor_1_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_1_secundaria"]; ?>"><?php echo $reg["flor_1_secundaria"]; ?></option>
									<option value="Astromelia">Astromelia</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 1 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_1_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_1_secundaria"]; ?>"><?php echo $reg["unidades_flor_1_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 2 Secundaria:</label>
                            <div class="col-md-7">
								<select name="flor_2_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_2_secundaria"]; ?>"><?php echo $reg["flor_2_secundaria"]; ?></option>
									<option value="Astromelia">Astromelia</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 2 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_2_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_2_secundaria"]; ?>"><?php echo $reg["unidades_flor_2_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 3 Secundaria:</label>
                            <div class="col-md-7">
								<select name="flor_3_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_3_secundaria"]; ?>"><?php echo $reg["flor_3_secundaria"]; ?></option>
									<option value="Astromelia">Astromelia</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 3 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_3_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_3_secundaria"]; ?>"><?php echo $reg["unidades_flor_3_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						
						---------------------------------------------------------------------------------<br><br><br>
						
						<div class="field-box">
							<label>Flor 1 Terciaria:</label>
                            <div class="col-md-7">
								<select name="flor_1_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_1_terciaria"]; ?>"><?php echo $reg["flor_1_terciaria"]; ?></option>
									<option value="Hortencias">Hortencias</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 1 Terciaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_1_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_1_terciaria"]; ?>"><?php echo $reg["unidades_flor_1_terciaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 2 Terciaria:</label>
                            <div class="col-md-7">
								<select name="flor_2_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_2_terciaria"]; ?>"><?php echo $reg["flor_2_terciaria"]; ?></option>
									<option value="Hortencias">Hortencias</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 2 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_2_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_2_terciaria"]; ?>"><?php echo $reg["unidades_flor_2_terciaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Flor 3 Terciaria:</label>
                            <div class="col-md-7">
								<select name="flor_3_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["flor_3_terciaria"]; ?>"><?php echo $reg["flor_3_terciaria"]; ?></option>
									<option value="Hortencias">Hortencias</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Flor 3 Terciaria:</label>
                            <div class="col-md-7">
								<select name="unidades_flor_3_terciaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_flor_3_terciaria"]; ?>"><?php echo $reg["unidades_flor_3_terciaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						
						---------------------------------------------------------------------------------<br><br><br>
						
						
						<div class="field-box">
							<label>Follaje 1 Principal:</label>
                            <div class="col-md-7">
								<select name="follaje_1_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_1_principal"]; ?>"><?php echo $reg["follaje_1_principal"]; ?></option>
									<option value="Rusco">Rusco</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 1 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_1_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_1_principal"]; ?>"><?php echo $reg["unidades_follaje_1_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Follaje 2 Principal:</label>
                            <div class="col-md-7">
								<select name="follaje_2_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_2_principal"]; ?>"><?php echo $reg["follaje_2_principal"]; ?></option>
									<option value="Rusco">Rusco</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 2 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_2_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_2_principal"]; ?>"><?php echo $reg["unidades_follaje_2_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Follaje 3 Principal:</label>
                            <div class="col-md-7">
								<select name="follaje_3_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_3_principal"]; ?>"><?php echo $reg["follaje_3_principal"]; ?></option>
									<option value="Rusco">Rusco</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 3 Principal:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_3_principal" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_3_principal"]; ?>"><?php echo $reg["unidades_follaje_3_principal"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						
						---------------------------------------------------------------------------------<br><br><br>
						
						<div class="field-box">
							<label>Follaje 1 Secundaria:</label>
                            <div class="col-md-7">
								<select name="follaje_1_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_1_secundaria"]; ?>"><?php echo $reg["follaje_1_secundaria"]; ?></option>
									<option value="Helecho">Helecho</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 1 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_1_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_1_secundaria"]; ?>"><?php echo $reg["unidades_follaje_1_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Follaje 2 Secundaria:</label>
                            <div class="col-md-7">
								<select name="follaje_2_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_2_secundaria"]; ?>"><?php echo $reg["follaje_2_secundaria"]; ?></option>
									<option value="Helecho">Helecho</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 2 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_2_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_2_secundaria"]; ?>"><?php echo $reg["unidades_follaje_2_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Follaje 3 Secundaria:</label>
                            <div class="col-md-7">
								<select name="follaje_3_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["follaje_3_secundaria"]; ?>"><?php echo $reg["follaje_3_secundaria"]; ?></option>
									<option value="Helecho">Helecho</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades Follaje 3 Secundaria:</label>
                            <div class="col-md-7">
								<select name="unidades_follaje_3_secundaria" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_follaje_3_secundaria"]; ?>"><?php echo $reg["unidades_follaje_3_secundaria"]; ?></option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						
						---------------------------------------------------------------------------------<br><br><br>
						
						
						<div class="field-box">
							<label>Base Floral</label>
                            <div class="col-md-7">
								<select name="base_floral" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["base_floral"]; ?>"><?php echo $reg["base_floral"]; ?></option>
									<option value="90cm x 21cm x 21cm">90cm x 21cm x 21cm</option>
									<option value="21cm x 21cm x 15cm">21cm x 21cm x 15cm</option>
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades de Oasis (Oasis Sencillo - Pequeño):</label>
                            <div class="col-md-7">
								<select name="unidades_de_oasis" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_de_oasis"]; ?>"><?php echo $reg["unidades_de_oasis"]; ?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>				
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
						<div class="field-box">
							<label>Unidades de Cinta (En Centimetros):</label>
                            <div class="col-md-7">
								<select name="unidades_de_cinta" style="width:350px" class="select2"> 
									<option value="<?php echo $reg["unidades_de_cinta"]; ?>"><?php echo $reg["unidades_de_cinta"]; ?></option>
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
                                </select>
							</div>
							<div id="div_metodo_pago"></div>
                        </div>
			
						
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Editar"/>
							<input type="hidden" name="id_producto" value="<?php echo $_GET["id_producto"];?>"/>
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