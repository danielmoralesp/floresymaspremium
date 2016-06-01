<?php	
	session_start();
	require_once("../conexion.php");
	$id_pedidos = $_GET["id_pedidos"];
	$sql="select * from pedidos where id_pedidos='".$_GET["id_pedidos"]."'	"; 
	$res = mysql_query($sql,$con);	
	if($reg = mysql_fetch_array($res)){	
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title>Checkout | Paso 2</title>
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	
	<?php $id_usuario = $_GET["id_usuario"]; ?>

	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "checkout_step2-m.php?id_pedidos=<?php echo $id_pedidos?>&id_usuario=<?php echo $id_usuario?>";
		}
	  //-->
	</script> 
	
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/checkout/base-ec3b26d4c38ea303cded78672d365221.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../assets/validacion/validar-checkout2.js"></script>

	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="//v2.zopim.com/?3QHttEutJ1CyxQJLP3MYVfd7D2E3Id0T";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zopim Live Chat Script-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69094727-1', 'auto');
	  ga('send', 'pageview');

	</script>

</head>
<body>
	<?php
		if(isset($_POST['id_producto'])){		
			$id_producto=$_POST['id_producto'];
			$foto_thumbnail=$_POST['foto_thumbnail'];
			$descripcion_del_producto=$_POST['descripcion_del_producto'];
			$nombre_del_producto=$_POST['nombre_del_producto'];
			$precio_del_producto=$_POST['precio_del_producto'];
			$cantidad=$_POST['cantidad'];
			$mi_carrito[]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cantidad);
		}		
		if(isset($_SESSION['carrito'])){
			$mi_carrito=$_SESSION['carrito'];
			if(isset($_POST['id_producto'])){
				$id_producto=$_POST['id_producto'];
				$foto_thumbnail=$_POST['foto_thumbnail'];
				$descripcion_del_producto=$_POST['descripcion_del_producto'];
				$nombre_del_producto=$_POST['nombre_del_producto'];
				$precio_del_producto=$_POST['precio_del_producto'];
				$cantidad=$_POST['cantidad'];
				$pos=-1;
				for($i=0;$i<count($mi_carrito);$i++){
					if($id_producto==$mi_carrito[$i]['id_producto']){
						$pos=$i;
					}
				}
				if($pos<>-1){
					$cuanto=$mi_carrito[$pos]['cantidad']+$cantidad;
					$mi_carrito[$pos]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cuanto);
				}else{				
					$mi_carrito[]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cantidad);
				}
			}
		}		
		if(isset($_POST['id2'])){
			$indice=$_POST['id2'];
			$cuanto=$_POST['cantidad2'];
			$mi_carrito[$indice]['cantidad']=$cuanto;
		}		
		if(isset($_POST['id3'])){
			$indice=$_POST['id3'];
			$mi_carrito[$indice]=NULL;
		
		}		
		if(isset($mi_carrito)) $_SESSION['carrito']=$mi_carrito;		
	?>	
	<?php
		if(isset($mi_carrito)){
			$total=0;
			$subtotal_3=0;
			$total_impuesto=0;
				for($i=0;$i<count($mi_carrito);$i++){
					if($mi_carrito[$i]<>NULL){
						$subtotal= $mi_carrito[$i]['precio_del_producto']*$mi_carrito[$i]['cantidad']; 
						$impuesto= $subtotal-($subtotal/1.16);
						$subtotal_2= $subtotal+$impuesto;
						$total= $total+$subtotal;
						$subtotal_3=$subtotal_3+$subtotal;
						$total_impuesto=$total_impuesto+$impuesto;
						$foto_thumbnail = $mi_carrito[$i]['foto_thumbnail'];
						$nombre_del_producto = $mi_carrito[$i]['nombre_del_producto'];
						$cantidad = $mi_carrito[$i]['cantidad'];
						$subtotal_4 = $subtotal_3 - $total_impuesto;
						$unidades_de_rosas = $mi_carrito[$i]['unidades_de_rosas'];
						$colores_de_rosas = $mi_carrito[$i]['colores_de_rosas'];
						}
					}							
				}
	?>
    <div class='global-wrapper'>
		<?php require_once("../instancias/header3.php"); ?>        
		<div class="wrapper">
			<ul class="breadcrumbs">
					<li class="crumb disabled">
						<span class="number">1</span> <span class="text"><?php  echo chao_tilde('Información de Envío')?></span>
					</li>
					 > 
					<li class="crumb active">
						<span class="number">2</span> <span class="text"><?php  echo chao_tilde('Información Remitente')?></span>
					</li>
					 > 
					<li class="crumb disabled">
						<span class="number">3</span> <span class="text">Resumen y Pago</span>
					</li>					
			</ul>
			<h1 class="black-blue"><?php  echo chao_tilde('Información Remitente')?></h1>
			<aside class="summary" id="order_summary">
				<h2 class="black-blue">Resumen de la Compra</h2>
					<div class="checkout-summary">
						<p class="dark-blue subtotal">Subtotal <span class="price">$<?php if(isset($subtotal_4)) echo number_format(round($subtotal_4));?></span></p>
						<p class="dark-blue shipping"><?php  echo chao_tilde('Envío')?> <span class="price" style="font-style: italic;">$<?php echo number_format($reg["costo_de_envio"]);?></span></p>
						<p class="dark-blue tax">IVA <span class="price">$<?php if(isset($total_impuesto)) echo number_format(round($total_impuesto));?></span></p>
						<p class="dark-blue discount" style="display: none;">Discount <span class="price">$0.00</span></p>
						<?php
							$costo_de_envio = $reg["costo_de_envio"];
						?>
						<p class="dark-blue total">Total <small></small> <span class="price">$<?php if(isset($total)) echo number_format($total+$costo_de_envio); ?></span></p>
					</div><hr>	
					<div class="our-guarantee">
					<img alt="Our-guarantee" class="seal" src="../assets/global/our-guarantee-45615ce86ce77e45e1bf73f419a4b593.png" />
					<p><?php  echo chao_tilde('Si usted no queda satisfecho le garantizamos la devolución del dinero')?></p>
					</div>
					<p class="guarantee-fineprint">
						<?php  echo chao_tilde('Nuestra política es tener altos estándares de calidad en el servicio y el producto. 
						Llámanos a los numeros (051) - 3311010 / 312-8923924 y cuidaremos de usted')?>
					</p>
			</aside>
			<section class="page shipping" id="shipping_page">
				<span class="page-error-msg" style="display: none;"></span>
				<h2 class="black-blue">Datos Personales</h2>
				<div class="need-shipping" style="display: block">
					<form name="form" accept-charset="UTF-8" action="procesar_checkout_step2.php?id_pedidos=<?php echo $reg["id_pedidos"];?>" method="post" enctype="multipart/form-data">
						<div class="form address shipping grid" style="display: block">	
							<div class="col-1-1">
								<input id="shipping_address_line_1" type="text" placeholder="Sus Nombres y Apellidos" name="nombre_de_quien_llama" class="address_line_1"  value="">
								<div  class="error-msg" id="div_nombre_de_quien_llama"></div>
							</div>	
							<div class="col-1-1">
								<input id="shipping_address_line_1" type="text" placeholder="<?php  echo chao_tilde('Sus Numeros Telefónicos de Contacto')?>" name="telefono_de_quien_llama" class="address_line_1" value="">
								<div  class="error-msg" id="div_telefono_de_quien_llama"></div>
							</div>
							<?php
								$sql2="select * from usuarios where id_usuario='".$_GET["id_usuario"]."'";			
								$res2 = mysql_query($sql2,$con);	
								if($reg2 = mysql_fetch_array($res2)){
							?>
							<div class="col-1-1">
								<label for="shipping_state" class="for-ie">State</label>
								<input id="shipping_address_line_1" type="text" placeholder="Su Email" name="email_de_quien_llama" class="address_line_1" maxlength="30" value="<?php echo $reg2["user"];?>">
							</div>
							<?php
								}
							?>  							  
						</div>
						<div class="shipping-options" data-default="4">
							<div class="updating" style="display: none;">Updating ...</div>								
								<div class="shipping_class " style="display: block;" id="sc_US_economy-free_wrapper">									
									<input type="radio" id="sc_US_economy-free" name="shipping_class" value="4" checked="">
									<label for="sc_US_economy-free" class="radio"></label>
									<label for="sc_US_economy-free" class="text">
										<a href="../terminos-del-servicio">
											<span class="h6 method-name">Acepto Terminos y Condiciones</span>
											<span class="h6 method-cost" style="font-style: italic;">Ver</span>
										</a>
									</label>									
								</div>								
						</div>
						<br>
							  <!--<input type="submit" class="button blue medium bottom" value="Continuar">-->
							  <input type="button" class="button blue medium bottom" value="Continuar" onClick="validar()">
							  <input type="hidden" name="nombre_del_producto" value="<?php if(isset($nombre_del_producto)) echo $nombre_del_producto?>"/>
							  <input type="hidden" name="total" value="<?php if(isset($total)) echo $total+$costo_de_envio ?>"/>
							  <input type="hidden" name="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>"/>
							  <input type="hidden" name="estado_pedido" value="<?php echo $reg["estado_pedido"]; ?>"/>
							  <input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>
							  <input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
							  <input type="hidden" name="dia_de_entrega" value="<?php echo $reg["dia_de_entrega"]; ?>"/>
							  <input type="hidden" name="mes_de_entrega" value="<?php echo $reg["mes_de_entrega"]; ?>"/>
							  <input type="hidden" name="ano_de_entrega" value="<?php echo $reg["ano_de_entrega"]; ?>"/>
							  <input type="hidden" name="hora_de_entrega" value="<?php echo $reg["hora_de_entrega"]; ?>"/>
							  <input type="hidden" name="dir_1_entrega" value="<?php echo $reg["dir_1_entrega"]; ?>"/>
							  <input type="hidden" name="dir_2_entrega" value="<?php echo $reg["dir_2_entrega"]; ?>"/>
							  <input type="hidden" name="dir_3_entrega" value="<?php echo $reg["dir_3_entrega"]; ?>"/>
							  <input type="hidden" name="barrio" value="<?php echo $reg["barrio"]; ?>"/>
							  <input type="hidden" name="ayuda_envio" value="<?php echo $reg["ayuda_envio"]; ?>"/>
							  <input type="hidden" name="nombre_de_quien_envia" value="<?php echo $reg["nombre_de_quien_envia"]; ?>"/>
							  <input type="hidden" name="nombre_de_quien_recibe" value="<?php echo $reg["nombre_de_quien_recibe"]; ?>"/>
							  <input type="hidden" name="telefono_de_quien_recibe" value="<?php echo $reg["telefono_de_quien_recibe"]; ?>"/>
							  <input type="hidden" name="mensaje_para_tarjeta" value="<?php echo $reg["mensaje_para_tarjeta"]; ?>"/>
							  <input type="hidden" name="observaciones_comentarios" value="<?php echo $reg["observaciones_comentarios"]; ?>"/>
							  <input type="hidden" name="ciudad_de_entrega" value="<?php echo $reg["ciudad_de_entrega"]; ?>"/>
							  <input type="hidden" name="dir_4_entrega" value="<?php echo $reg["dir_4_entrega"]; ?>"/>
							  <input type="hidden" name="dir_5_entrega" value="<?php echo $reg["dir_5_entrega"]; ?>"/>
							  <input type="hidden" name="costo_de_envio" value="<?php echo $reg["costo_de_envio"]; ?>"/>
							  <input type="hidden" name="unidades_de_rosas" value="<?php echo $reg["unidades_de_rosas"]; ?>"/>
							  <input type="hidden" name="colores_de_rosas" value="<?php echo $reg["colores_de_rosas"]; ?>"/>
							  <input type="hidden" name="id_usuario" value="<?php echo $reg["id_usuario"]; ?>"/>
							  <input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>
					</form>	
				</div>
			</section>		
		</div>
		 <?php require_once("../instancias/footer.php"); ?>
		 <?php
			}
		  ?>
	<script src="../assets/desktop/global/init-f4172392de5a94d426c0cff014321f77.js" type="text/javascript"></script>    
    <script src="https://js.stripe.com/v2/stripe-dss3.js" type="text/javascript"></script>
    <script src="../assets/shared/checkout/init-b7f3ece69e7f1a78b26bbfb2a734dcc2.js" type="text/javascript"></script>
	
</body>
</html>
