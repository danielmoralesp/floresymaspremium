<?php
	session_start();
	if($_SESSION["usuario"]){
	
	require_once("../conexion.php");
	$id_gastos = $_GET["id_gastos"];
	$sql="select * from gastos where id_gastos='".$_GET["id_gastos"]."'	"; 
	$res = mysql_query($sql,$con);

		if($reg = mysql_fetch_array($res)){

	?>	
	


	
<!DOCTYPE html>
<html>
<head>
	<title>Detalle del Gasto | FloresyMas.co</title>
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

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script language="javascript" type="text/javascript">
		function eliminar(id){
			if(confirm("Realmente desea eliminar el Gasto?")){
				window.location="eliminar-gasto.php?id_gastos="+id;
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
        
       
        <div id="pad-wrapper">
            
            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>Detalle del Gasto</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">                        
                        <a class="btn-flat info new-product" href="editar-gasto.php?id_gastos=<?php echo $reg["id_gastos"];?>">Editar</a>
						<a class="btn-flat warning new-product" href="javascript:void(0)" onClick="eliminar('<?php echo $reg["id_gastos"];?>')">Eliminar</a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">                                    
                                    Datos
                                </th>
                                <th class="col-md-6">
                                    <span class="line"></span>Descripción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                                <td class="description">
                                    Fecha de Gasto
                                </td>
                                <td class="description">
                                    <?php echo $reg["fecha_de_dato"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Proveedor
                                </td>
                                <td class="description">
                                    <?php echo $reg["proveedor"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Categoria
                                </td>
                                <td class="description">
                                    <?php echo $reg["categoria"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Subcategoria
                                </td>
                                <td class="description">
                                    <?php echo $reg["subcategoria"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Item
                                </td>
                                <td class="description">
                                    <?php echo $reg["item"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Pagado con
                                </td>
                                <td class="description">
                                    <?php echo $reg["pagado_con"]; ?>
                                </td>
                            </tr>
							<tr class="first">
                                <td class="description">
                                    Valor
                                </td>
                                <td class="description">
                                    <?php echo $reg["valor"]; ?>
                                </td>
                            </tr>
						</tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->
			<div class="wizard-actions">
				<a href="gastos"><input type="button" class="btn-glow success btn-finish" value="Gastos" /></a>							
			</div>
        </div>
    </div>
	
	<?php
		}			
	?>
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
				alert('Usted no esta logueado. Porfavor Ingrese al sistema');
				window.location='login';
			  </script>";
	}
	
?>