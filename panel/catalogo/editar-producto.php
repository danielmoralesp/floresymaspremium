<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==3){
		require_once("../../conexion.php");
		$id_usuario =  $_SESSION['miSession']['id_usuario'];
		$sql="select * from usuarios where id_usuario='".$_SESSION['miSession']['id_usuario']."'"; 
		$res = mysql_query($sql,$con);	
		if($reg = mysql_fetch_array($res)){	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto | FloresyMas.co</title>
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
    <?php require_once("../instancias/header2.php"); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php require_once("../instancias/menu-dashboard.php"); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
		<?php
			$sql2="select * from producto
			where id_producto = ".$_GET["id_producto"]."";
			$res2 = mysql_query($sql2,$con);
			if($reg2 = mysql_fetch_array($res2)){		
		?>
        <div id="pad-wrapper" class="form-page">
			<h3>Editar Producto</h3><br><br>
			<div class="row filter-block">
                    <div class="pull-right">                        
						<a class="btn-flat warning new-product" href="javascript:void(0)" onClick="eliminar('<?php echo $reg2["id_producto"];?>')">Eliminar Producto</a>
						<a class="btn-flat warning new-product" href="upload-fotos-adicionales.php?id_producto=<?php echo $reg2["id_producto"];?>" >Fotos Adicionales</a>
                    </div><br><br>
                </div>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">					
                    <form accept-charset="UTF-8" name="form" action="edit-producto.php?id_producto=<?php echo $reg2["id_producto"];?>" method="post" enctype="multipart/form-data">					
                        <h4>Datos del Producto (Front-End)------------</h3><br><br>				
						<div class="field-box">
							<label>Producto Padre?:</label>
                            <div class="col-md-7">
								<select name="producto_padre" style="width:350px" class="select2">
                                    <option value="<?php echo $reg2["producto_padre"]; ?>"><?php echo $reg2["producto_padre"]; ?></option>
									<option value="si">Si</option>
									<option value="no">No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Nombre del Producto (Tipo Producto + Color):</label>
                            <div class="col-md-7">
								<input type="text"  name="nombre_del_producto" value="<?php echo $reg2["nombre_del_producto"]; ?>" class="form-control inline-input" placeholder="nombre del producto" />
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Precio del Producto (Sin puntos, comas, signos o separaciones)</label>
							<div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["precio_del_producto"]; ?>" name="precio_del_producto" class="form-control inline-input" placeholder="precio del producto" />
							</div>
							<div id="div_nombre_del_producto"></div>
						</div>
						<div class="field-box">
							<label>Disponible para Entrega en 90 Minutos?:</label>
                            <div class="col-md-7">
								<select name="menos_de_90_min" style="width:350px" class="select2">
                                    <option value="<?php echo $reg2["menos_de_90_min"]; ?>"><?php echo $reg2["menos_de_90_min"]; ?></option>
									<option value="si">Si</option>
									<option value="no">No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
                         <div class="field-box">
							<label>Orden de Importancia:</label>
                            <div class="col-md-7">
								<input type="text"  value="<?php echo $reg2["orden_importancia"]; ?>" name="orden_importancia" class="form-control inline-input" placeholder="Orden de Importancia" />
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Tipo de Producto:</label>
                            <div class="col-md-7">
								<select name="tipo_de_producto" style="width:350px" class="select2">
                                    <option value="<?php echo $reg2["tipo_de_producto"]; ?>"><?php echo $reg2["tipo_de_producto"]; ?></option>
									<option value="Premium Box">Premium Box</option>
									<option value="Pixel Box" >Pixel Box</option>
									<option value="Sierra Box" >Sierra Box</option>
									<option value="Cohiba Box" >Cohiba Box</option>
									<option value="Ikebana" >Ikebana</option>
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
                                    <option value="<?php echo $reg2["colores_de_rosas"]; ?>"><?php echo $reg2["colores_de_rosas"]; ?></option>
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
                                    <option value="<?php echo $reg2["unidades_de_rosas"]; ?>"><?php echo $reg2["unidades_de_rosas"]; ?></option>
									<option value="12" >12</option>
									<option value="18" >18</option>
									<option value="20" >20</option>
									<option value="24" >24</option>
									<option value="25" >25</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Tamaño del Producto:</label>
                            <div class="col-md-7">
								<select name="tamano_del_producto" style="width:350px" class="select2">
                                    <option value="<?php echo $reg2["tamano_del_producto"]; ?>"><?php echo $reg2["tamano_del_producto"]; ?></option>
									<option value="90cm * 23cm * 8cm" >90cm(Largo) * 23cm(Ancho) * 8cm(Alto)</option>
									<option value="23cm * 23cm * 20cm" >23cm(Largo) * 23cm(Ancho) * 20cm(Alto)</option>
									<option value="15cm * 15cm * 15cm" >15cm(Largo) * 15cm(Ancho) * 23cm(Alto)</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>En Inventario:</label>
                            <div class="col-md-7">
								<select name="en_inventario" style="width:350px" class="select2">
									<option value="<?php echo $reg2["en_inventario"]; ?>"><?php echo $reg2["en_inventario"]; ?></option>
									<option value="si" >Sí</option>
									<option value="no" >No</option>
                                </select>
							</div>
							<div id="div_hora_de_entrega"></div>
                        </div>
						<div class="field-box">
							<label>Flor de Exportacion?:</label>
                            <div class="col-md-7">
								<select name="flor_exportacion" style="width:350px" class="select2">
									<option value="<?php echo $reg2["flor_exportacion"]; ?>"><?php echo $reg2["flor_exportacion"]; ?></option>
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
									<option value="<?php echo $reg2["producto_incluye"]; ?>"><?php echo $reg2["producto_incluye"]; ?></option>
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
									<option value="<?php echo $reg2["ocasion_del_producto"]; ?>"><?php echo $reg2["ocasion_del_producto"]; ?></option>
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
                                <textarea class="form-control" value="<?php echo $reg2["descripcion_del_producto"]; ?>" rows="4" name="descripcion_del_producto"><?php echo $reg2["descripcion_del_producto"]; ?></textarea>
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
						<br><br>	
						<br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Editar"/>
							<input type="hidden" name="id_producto" value="<?php echo $_GET["id_producto"];?>"/>
							<a class="btn-flat warning new-product" href="listado-productos" >Volver</a>
						</div>
                    </form>					
                </div>
            </div>
        </div>
		<?php
			}
		}
		?>
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
</body>
</html>

<?php

	}else{
		echo "<script type='text/javascript'>
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='..usuarios/login';
			  </script>";
	}
	
?>