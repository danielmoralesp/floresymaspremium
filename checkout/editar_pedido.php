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
    <title>Editar Pedido</title>
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	
	<?php $id_usuario = $_GET["id_usuario"]; ?>
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "editar_pedido-m.php?id_pedidos=<?php echo $reg["id_pedidos"];?>&id_usuario=<?php echo $reg["id_usuario"];?>";
		}
	  //-->
	</script>  
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/checkout/base-ec3b26d4c38ea303cded78672d365221.css" media="screen" rel="stylesheet" type="text/css" />
	<!-- VALIDADORES-->	
	<script language="javascript" type="text/javascript" src="../assets/validacion/validar-checkout-editar.js"></script>

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
        <div id="flashes">
        </div>
		<?php require_once("../instancias/header3.php"); ?> 
		<div class="wrapper">
			<ul class="breadcrumbs">									
			</ul>
			<h1 class="black-blue">Editar Pedido</h1>
			<aside class="summary" id="order_summary">
				<form name="form" accept-charset="UTF-8" action="edit_pedido.php?id_pedidos=<?php echo $reg["id_pedidos"];?>" method="post" enctype="multipart/form-data">				
					<h2 class="black-blue">Resumen de la Compra</h2>
					<div class="checkout-summary">
						<p class="dark-blue subtotal">Subtotal <span class="price">$<?php if(isset($subtotal_4)) echo number_format(round($subtotal_4));?></span></p>
						<p class="dark-blue shipping"><?php  echo chao_tilde('Envío')?> <span class="price" style="font-style: italic;">$<?php echo number_format($reg["costo_de_envio"]);?></span></p>
						<p class="dark-blue tax">IVA <span class="price">$<?php if(isset($total_impuesto)) echo number_format(round($total_impuesto));?></span></p>
						<p class="dark-blue discount" style="display: none;">Discount <span class="price">$0.00</span></p>
						<p class="dark-blue total">Total <small></small> <span class="price">$<?php if(isset($total)) echo number_format($total);?></span></p>
					</div><hr>	
					<div class="our-guarantee">
					<img alt="Our-guarantee" class="seal" src="../assets/global/our-guarantee-45615ce86ce77e45e1bf73f419a4b593.png" />
					<p><?php echo chao_tilde('Si usted no queda satisfecho le garantizamos la devolución del dinero')?></p>
					</div>
					<p class="guarantee-fineprint">
						<?php echo chao_tilde('Nuestra política es tener altos estándares de calidad en el servicio y el producto. 
						Llámanos a los numeros (051) - 3311010 / 312-8923924 y cuidaremos de usted')?>
					</p>
			</aside>
			<section class="page shipping" id="shipping_page">
				<span class="page-error-msg" style="display: none;"></span>
				<h2 class="black-blue"></h2>
				<div class="need-shipping" style="display: block">
					<div class="form address shipping grid" style="display: block">	
						<div class="col-2-3 grid pad-r">
							<p class="h6 black-blue col-1-1"><?php echo chao_tilde('Fecha de Entrega (Dia-Mes-Año)')?></p>
							<div class="col-1-2 pad-r">
								<label for="billing_month" style="display: none;">Dia</label>
								<select class="month" id="billing_month" name="dia_de_entrega" >
									<option value="<?php echo $reg["dia_de_entrega"]; ?>"><?php echo $reg["dia_de_entrega"]; ?></option>
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
							<div class="col-1-2 pad-l">
								<label for="billing_year" style="display: none;">Mes</label>
								<select class="year" id="billing_year" name="mes_de_entrega">
									<option value="<?php echo $reg["mes_de_entrega"]; ?>"><?php echo $reg["mes_de_entrega"]; ?></option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
						</div>	
						<div class="col-1-3 pad-l">
							<p class="h6 black-blue" style="color:white">Fecha de Entrega</p>
							<label for="billing_year" style="display: none;">Año</label>		
								<select class="year" id="billing_year" name="ano_de_entrega">
									<option value="<?php echo $reg["ano_de_entrega"]; ?>"><?php echo $reg["ano_de_entrega"]; ?></option>
									<option value="2015">2015</option>
								</select>
						</div>	
						<div class="col-1-2 pad-r">
						 <p class="h6 black-blue">Hora de Entrega</p>
							<label for="shipping_state" class="for-ie">State</label>
							<div  class="error-msg" id="div_hora_de_entrega"></div>
							<select id="shipping_state" name="hora_de_entrega" class="state">
									<option value="<?php echo $reg["hora_de_entrega"]; ?>"><?php echo $reg["hora_de_entrega"]; ?></option>
									<option value="En Menos de 90 Minutos">En Menos de 90 Minutos</option>
									<option value="7am - 11am">7am - 11am</option>
									<option value="11am - 3pm" >11am - 3pm</option>
									<option value="3pm - 7pm" >3pm - 7pm</option>
									
							</select>
						</div>	
						<div class="col-1-1">
							<p class="h6 black-blue"><?php echo chao_tilde('Dirección de Entrega')?></p>
							<label for="shipping_name" class="for-ie">Name</label>
							 <select class="month" id="billing_month" name="ciudad_de_entrega">		 
							 <option value="<?php echo $reg["ciudad_de_entrega"]; ?>"><?php echo $reg["ciudad_de_entrega"]; ?></option>
							<option value="Bogota">Bogotá</option>
							<!--<option value="medellin">Medellín</option>-->
							</select>
						</div>	
						<div class="col-2-3 grid pad-r">
							<!--<p class="h6 black-blue col-1-1">Dirección de Entrega</p>-->
							<div class="col-1-2 pad-r">
								<label for="billing_month" style="display: none;">Dia</label>
								<select class="month" id="billing_month" name="dir_1_entrega">
								<option value="<?php echo $reg["dir_1_entrega"]; ?>"><?php echo $reg["dir_1_entrega"]; ?></option>
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
							<div class="col-1-2 pad-l">
								<label for="shipping_name" class="for-ie"></label>
							<input id="shipping_name" type="text" placeholder="" name="dir_2_entrega" class="name" maxlength="100" value="<?php echo $reg["dir_2_entrega"]; ?>">
							<div  class="error-msg" id="div_dir_2_entrega"></div>
							</div>
						</div>
						<div class="col-1-3 pad-l">
						   <label for="shipping_name" class="for-ie">Name</label>
							<input id="shipping_name" type="text" placeholder="#" name="dir_3_entrega" class="name" maxlength="100" value="<?php echo $reg["dir_3_entrega"]; ?>">
							<div  class="error-msg" id="div_dir_3_entrega"></div>
						</div>	
						<div class="col-2-3 grid pad-r">	
							<div class="col-1-2 pad-r">
								<label for="billing_month" style="display: none;">Dia</label>
								<select class="month" id="billing_month" name="dir_4_entrega">
									<option value="<?php echo $reg["dir_4_entrega"]; ?>"><?php echo $reg["dir_4_entrega"]; ?></option>
									<option value="Apartamento">Apartamento</option>
									<option value="Oficina">Oficina</option>
								</select>
							</div>
							<div class="col-1-2 pad-l">
								<label for="shipping_name" class="for-ie"></label>
									<input id="shipping_name" type="text" placeholder="#" name="dir_5_entrega" value="<?php echo $reg["dir_5_entrega"]; ?>" class="name" maxlength="100" value="">
									<div  class="error-msg" id="div_dir_5_entrega"></div>
							</div>
						</div>		
						<div class="col-1-2 pad-r">
							<label for="shipping_state" class="for-ie">State</label>
							<input id="shipping_address_line_1" type="text" placeholder="Barrio" name="barrio" class="address_line_1" maxlength="30" value="<?php echo $reg["barrio"]; ?>">
							<div  class="error-msg" id="div_barrio"></div>
						</div>
						<div class="col-1-1">
							<label for="shipping_name" class="for-ie">Name</label>
							<textarea id="shipping_name" type="text" placeholder="Información de Adicional de Ayuda Para el Envío" name="ayuda_envio" class="name" maxlength="100" value="<?php echo $reg["ayuda_envio"]; ?>"><?php echo $reg["ayuda_envio"]; ?></textarea>
							<div  class="error-msg" id="div_ayuda_envio"></div>
						</div>
					</div>
					<h2 class="black-blue shipping-options-head"><?php echo chao_tilde('Opciones de Envío')?></h2>
					<div class="shipping-options" data-default="1">
						<div class="type " style="display: block" id="st_US_economy_wrapper">
							<input
								type="radio"
								id="st_US_economy"
								name="costo_de_envio"
								value="10000"
								data-method="economy"
								data-price="3.0"
								data-country="US"
								data-estimate="5-10"
								data-po-box-shippable="true"
								checked
							>
							<label for="st_US_economy" class="radio"></label>
							<label for="st_US_economy" class="text">
								<span class="h6 method-name"><?php echo chao_tilde('Fuera Perímetro')?></span>
									<span class="h6 method-cost">$10.000</span>
							</label>
						</div>
						<div class="type " style="display: block" id="st_US_economy-free_wrapper">
							<input 
								type="radio"
								id="st_US_economy-free"
								name="costo_de_envio"
								value="0"
								data-method="economy-free"
								data-price="0.0"
								data-country="US"
								data-estimate="5-10"
								data-po-box-shippable="true"
								
							>
							<label for="st_US_economy-free" class="radio"></label>
							<label for="st_US_economy-free" class="text">
								<span class="h6 method-name"><?php echo chao_tilde('Dentro Perímetro')?></span>
									<span class="h6 method-cost" style="font-style: italic;">gratis</span>
							</label>
						</div><br>						
						<p><a href=""><?php echo chao_tilde('Ver Perímetros')?></a></p>
					</div><hr>
					<div class="form address shipping grid" style="display: block">	
						<div class="col-1-1">
							<p class="h6 black-blue"><?php echo chao_tilde('Envío y Recepción')?></p>
							<label for="shipping_name" class="for-ie">Name</label>
							<input id="shipping_name" type="text" placeholder="Nombre de Quien Envia" name="nombre_de_quien_envia" class="address_line_1" maxlength="100" value="<?php echo $reg["nombre_de_quien_envia"]; ?>">
							<div  class="error-msg" id="div_nombre_de_quien_envia"></div>
						</div>
						<div class="col-1-1">
							<label for="shipping_address_line_1" class="for-ie">Address Line 1</label>
							<input id="shipping_address_line_1" type="text" placeholder="Nombre de Quien Recibe" name="nombre_de_quien_recibe" class="address_line_1" maxlength="30" value="<?php echo $reg["nombre_de_quien_recibe"]; ?>">
							<div  class="error-msg" id="div_nombre_de_quien_recibe"></div>
						</div>
						<div class="col-1-1">
							<label for="shipping_address_line_2" class="for-ie">Address Line 2</label>
							<input id="shipping_address_line_2" type="text" placeholder="Teléfono de Quien Recibe" name="telefono_de_quien_recibe" class="address_line_2" maxlength="255" value="<?php echo $reg["telefono_de_quien_recibe"]; ?>">
							<div  class="error-msg" id="div_telefono_de_quien_recibe"></div>
						</div>
						<div class="col-1-1">
							<textarea id="shipping_city" type="text" placeholder="Mensaje de la Tarjeta" name="mensaje_para_tarjeta" class="city" maxlength="255" value="<?php echo $reg["mensaje_para_tarjeta"]; ?>"><?php echo $reg["mensaje_para_tarjeta"]; ?></textarea>
							<div  class="error-msg" id="div_mensaje_para_tarjeta"></div>
						</div>	
						<div class="col-1-1">
							<textarea id="shipping_city" type="text" placeholder="Observaciones" name="observaciones_comentarios" class="city" maxlength="255" value="<?php echo $reg["observaciones_comentarios"]; ?>"><?php echo $reg["observaciones_comentarios"]; ?></textarea>
						</div>
						<div class="col-1-1">
						<p class="h6 black-blue">Sus Datos Personales</p>
							<label for="shipping_state" class="for-ie">State</label>
							<input id="shipping_address_line_1" type="text" placeholder="Sus Nombres y Apellidos" name="nombre_de_quien_llama" class="address_line_1" maxlength="30" value="<?php echo $reg["nombre_de_quien_llama"]; ?>">
							<div  class="error-msg" id="div_nombre_de_quien_llama"></div>
						</div>						
						<div class="col-1-1">
							<label for="shipping_state" class="for-ie">State</label>
							<input id="shipping_address_line_1" type="text" placeholder="Sus Numeros Telefónicos de Contacto" name="telefono_de_quien_llama" class="address_line_1" maxlength="30" value="<?php echo $reg["telefono_de_quien_llama"]; ?>">
							<div  class="error-msg" id="div_telefono_de_quien_llama"></div>
						</div>						
						<div class="col-1-1">
							<label for="shipping_state" class="for-ie">State</label>
							<input id="shipping_address_line_1" type="text" placeholder="Su Email" name="email_de_quien_llama" class="address_line_1" maxlength="30" value="<?php echo $reg["email_de_quien_llama"]; ?>">
						</div>						
					</div>
				  <br><br>
				  <!--<input type="submit" class="button blue medium bottom" value="Continuar">-->
				  <input type="button" class="button blue medium bottom" value="Editar" onClick="validar()">
				  <input type="hidden" name="nombre_del_producto" value="<?php if(isset($nombre_del_producto)) echo $nombre_del_producto?>"/>
				  <input type="hidden" name="total" value="<?php if(isset($total)) echo $total?>"/>
				  <input type="hidden" name="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>"/>
				  <input type="hidden" name="estado_pedido" value="<?php echo $reg["estado_pedido"]; ?>"/>
				  <input type="hidden" name="fecha_de_pedido" value="<?php echo $reg["fecha_de_pedido"]; ?>"/>
				  <input type="hidden" name="fecha_de_pago" value="<?php echo $reg["fecha_de_pago"]; ?>"/>
				  <input type="hidden" name="unidades_de_rosas" value="<?php echo $reg["unidades_de_rosas"]; ?>"/>
				  <input type="hidden" name="colores_de_rosas" value="<?php echo $reg["colores_de_rosas"]; ?>"/>
				  <input type="hidden" name="id_usuario" value="<?php echo $reg["id_usuario"]; ?>"/>
				  <input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>
				</form>
				<div class="disabled-address"></div>
				</div>
		</div>
    </div>
			</section>
			<?php require_once("../instancias/footer.php"); ?>
			 <?php
				}
			 ?>
    <script src="../assets/desktop/global/init-f4172392de5a94d426c0cff014321f77.js" type="text/javascript"></script>    
    <script src="https://js.stripe.com/v2/stripe-dss3.js" type="text/javascript"></script>
    <script src="../assets/shared/checkout/init-b7f3ece69e7f1a78b26bbfb2a734dcc2.js" type="text/javascript"></script>

</body>
</html>
