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
	<title>Fotos Adicionales | FloresyMas.co</title>
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
		<script language="javascript" type="text/javascript" src="../js/validacion-paso1.js"></script>
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
    <?php require_once("../instancias/menu-dashboard2.php"); ?>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">       
        <div id="pad-wrapper" class="form-page">
			<h3>Nuevas Fotos Adicionales</h3><br><br>
            <div class="row form-wrapper">
				<!-- left column -->
                <div class="col-md-8 column">				
                    <form accept-charset="UTF-8" name="form" action="procesar-nuevas-fotos.php?id_producto=<?php echo $_GET["id_producto"];?>" method="post" enctype="multipart/form-data">					
                        <h4>Fotos del Producto Adicional 1(Front-End)------------</h3><br><br>
						<div class="control-group">
							<label class="control-label" for="inputEmail1">Foto Grande</label>							
							  <input type="file" name="foto_grande" placeholder="Foto Grande"/>							
						</div><br>
						<div class="control-group">
							<label class="control-label" for="inputEmail1">Foto Thumbnail </label>						
							  <input type="file" name="foto_thumbnail" placeholder="Foto Thumbnail"/>						
						</div>							                   
                        <br><br>
						<div>
							<input type="submit" class="btn-glow primary btn-next" value="Subir"/>
							<a class="btn-flat warning new-product" href="editar-producto.php?id_producto=<?php echo $_GET["id_producto"];?>" >Volver</a>
						</div>	
                        <br><br><br><br>					
                    </form>
                    <!--<form accept-charset="UTF-8" name="form" action="procesar-nuevas-fotos2.php?id_producto=<?php echo $_GET["id_producto"];?>" method="post" enctype="multipart/form-data">                 
                        <h4>Fotos del Producto Adicional 2(Front-End)------------</h3><br><br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Grande 2 </label>                      
                              <input type="file" name="foto_grande2" placeholder="Foto Thumbnail"/>                       
                        </div>                          
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Thumbnail 2</label>                      
                              <input type="file" name="foto_thumbnail2" placeholder="Foto Thumbnail"/>                       
                        </div>                                                   
                        <br><br>
                        <div>
                            <input type="submit" class="btn-glow primary btn-next" value="Subir"/>
                            <?php   
                             $id_producto = $_GET["id_producto"];
                                $sql2="select * from fotos_adicionales where id_producto='".$_GET["id_producto"]."'"; 
                                $res2 = mysql_query($sql2,$con);    
                                if($reg2 = mysql_fetch_array($res2)){   
                                ?>
                                <!--ESTE CODIGO ES PARA SACAR LAS FOTOS YA MONTADAS-->
                                <?php
                                    }
                                ?>
                            <!--<input type="hidden" name="foto_adicional_1" value="<?php echo $reg2["foto_adicional_1"]; ?>"/>
                            <input type="hidden" name="foto_adicional_2" value="<?php echo $reg2["foto_adicional_2"]; ?>"/>
                            <a class="btn-flat warning new-product" href="editar-producto.php?id_producto=<?php echo $_GET["id_producto"];?>" >Volver</a>
                        </div> 
                        <br><br><br><br>                     
                    </form>
                    <form accept-charset="UTF-8" name="form" action="procesar-nuevas-fotos3.php?id_producto=<?php echo $_GET["id_producto"];?>" method="post" enctype="multipart/form-data">                 
                        <h4>Fotos del Producto Adicional 3(Front-End)------------</h3><br><br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Grande 3</label>                      
                              <input type="file" name="foto_grande3" placeholder="Foto Thumbnail"/>                       
                        </div>                          
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Thumbnail 3</label>                      
                              <input type="file" name="foto_thumbnail3" placeholder="Foto Thumbnail"/>                       
                        </div>                            
                        <br><br>
                        <div>
                            <input type="submit" class="btn-glow primary btn-next" value="Subir"/>
                            <a class="btn-flat warning new-product" href="editar-producto.php?id_producto=<?php echo $_GET["id_producto"];?>" >Volver</a>
                        </div> 
                        <br><br><br><br>                     
                    </form>
                    <form accept-charset="UTF-8" name="form" action="procesar-nuevas-fotos4.php?id_producto=<?php echo $_GET["id_producto"];?>" method="post" enctype="multipart/form-data">                 
                        <h4>Fotos del Producto Adicional 4(Front-End)------------</h3><br><br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Grande 4</label>                      
                              <input type="file" name="foto_grande4" placeholder="Foto Thumbnail"/>                       
                        </div>                          
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">Foto Thumbnail 4</label>                      
                              <input type="file" name="foto_thumbnail4" placeholder="Foto Thumbnail"/>                       
                        </div>                          
                        <br><br>
                        <div>
                            <input type="submit" class="btn-glow primary btn-next" value="Subir"/>
                            <a class="btn-flat warning new-product" href="editar-producto.php?id_producto=<?php echo $_GET["id_producto"];?>" >Volver</a>
                        </div>
                        <br><br><br><br>                      
                    </form>-->
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
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='../usuarios/login';
			  </script>";
	}	
?>