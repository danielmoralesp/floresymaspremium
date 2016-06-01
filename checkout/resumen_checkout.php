<?php	
	session_start();
	require_once("../conexion.php");
	$id_pedidos = $_GET["id_pedidos"];
	$sql="select * from pedidos where id_pedidos='".$_GET["id_pedidos"]."'"; 
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
    <title>Resumen del Pedido | FloresyMas Premium</title>
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	
	<?php $id_usuario = $_GET["id_usuario"]; ?>
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "resumen_checkout-m.php?id_pedidos=<?php echo $id_pedidos?>&id_usuario=<?php echo $id_usuario?>";
		}
	  //-->
	</script>     

    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/cart/base-8fa6ad487aea51d1cd6ecaf9db5eb33d.css" media="screen" rel="stylesheet" type="text/css" />

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
    <div class='global-wrapper'>
        <div id="flashes">
        </div>
		<?php require_once("../instancias/header3.php"); ?> 
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
		<div class='cart' id='view_edit_cart'>
			<div class="wrap-1100 center clear" id="heading">
				<h1 class="blue float-left">Resumen Pedido</h1>
				<a href="editar_pedido.php?id_pedidos=<?php echo $reg["id_pedidos"];?>&id_usuario=<?php echo $reg["id_usuario"];?>" class="button blue medium float-right bottom">Editar</a>
				<!--<a href="/products" class="link float-right bottom">Continue Shopping</a>-->	
			</div>	
			<div class="wrap-1100 center clear">
				<table class='products' id="cart_table" style='text-align: center;'>
					<thead>
						<tr>					
							<th class="align-left">Datos</th>
							<th class="align-left">Detalle del Pedido</th>					
						</tr>
					</thead>
					<tbody>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Fecha de Entrega</td>
							<td class="description"><?php echo $reg["dia_de_entrega"]; ?> - <?php echo $reg["mes_de_entrega"]; ?> - <?php echo $reg["ano_de_entrega"]; ?></td>
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Hora de Entrega</td>
							<td class="description"><?php echo $reg["hora_de_entrega"]; ?></td>
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Ciudad de Entrega</td>
							<td class="description"><?php echo $reg["ciudad_de_entrega"]; ?></td>
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Direccion de Entrega</td>
							<td class="description"><?php echo $reg["dir_1_entrega"]; ?> <?php echo $reg["dir_2_entrega"]; ?> # <?php echo $reg["dir_3_entrega"]; ?> / <?php echo $reg["dir_4_entrega"]; ?> <?php echo $reg["dir_5_entrega"]; ?></td>
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Barrio</td>
							<td class="description"><?php echo $reg["barrio"]; ?></td>
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Informacion de Ayuda Envío</td>
							<td class="description"><?php echo $reg["ayuda_envio"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Nombre de Quien Envia</td>
							<td class="description"><?php echo $reg["nombre_de_quien_envia"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Nombre de Quien Recibe</td>
							<td class="description"><?php echo $reg["nombre_de_quien_recibe"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Telefono de Quien Recibe</td>
							<td class="description"><?php echo $reg["telefono_de_quien_recibe"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Mensaje Para Tarjeta</td>
							<td class="description"><?php echo $reg["mensaje_para_tarjeta"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Observaciones o Comentarios</td>
							<td class="description"><?php echo $reg["observaciones_comentarios"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Sus Nombres y Apellidos</td>
							<td class="description"><?php echo $reg["nombre_de_quien_llama"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Sus Telefonos</td>
							<td class="description"><?php echo $reg["telefono_de_quien_llama"]; ?></td>					
						</tr>
						<tr class='product' data-id="131" data-price-per="15.0" data-key="131">
							<td class="description">Su Email</td>
							<td class="description"><?php echo $reg["email_de_quien_llama"]; ?></td>					
						</tr>
					</tbody>
				</table>		 
				<a href="editar_pedido.php?id_pedidos=<?php echo $reg["id_pedidos"];?>&id_usuario=<?php echo $reg["id_usuario"];?>" class="link float-right bottom">Editar Pedido</a>
			</div>
			 <br>
			 <br>
			 <br>
			<div class="wrap-1100 center clear">
				<table class='products' id="cart_table" style='text-align: center;'>
					<thead>
						<tr>
							<th colspan="2" class="align-left">Item</th>
							<th class="align-right">Unidades de Rosas</th>
							<th>Cantidad</th>
							<th class="align-right">Total</th>
							<th class="buttons"></th>
						</tr>
					</thead>			
					<?php
						if(isset($mi_carrito)){
							$total=0;
							$subtotal_3=0;
							$total_impuesto=0;
							for($i=0;$i<count($mi_carrito);$i++){
								if($mi_carrito[$i]<>NULL){
					?>
					<tbody>
                        <tr class='product' data-id="131" data-price-per="15.0" data-key="131">
                            <td class='name'>
                                <img alt="" src="../panel/catalogo/img/thumbnail/<?php echo $mi_carrito[$i]['foto_thumbnail'];?>" />
                            </td>
                            <td class="description">
                                <?php echo $mi_carrito[$i]['nombre_del_producto'];?><br>
								<span>
									<img src="../panel/img/colores/<?php echo $mi_carrito[$i]['colores_de_rosas'];?>.png" width="20px" height="20px"  / >									
								</span>		
								<?php 
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
									
									//Calculo del Impuesto
									$iva=16/100;
									$valor_iva=$iva*$total;
									$valor_iva2=$total-$valor_iva;
								?>
                            </td>
                            <td class='price-per money'>
                                <?php echo $mi_carrito[$i]['unidades_de_rosas'];?>
                            </td>
                            <td class='quantity'>
                                 <?php echo $reg["cantidad"];?>
                            </td>
                            <td class='price money'>
                                <div class="rel">
                                    <span class="amount">$<?php echo number_format(round($subtotal)); ?></span>
									<form action="" method="post">
										<div class="add-to-cart">    						
											<input name="id3" type="hidden" value="<?php echo $i?>" />
											<!--<input type="submit" value="X" class="remove" value="Eliminar" />-->
										</div>	
									</form>                                    
                                </div>
                            </td>
                        </tr>						
						<?php
								}	
							}							
						}
						?>				
					</tbody>
					<tfoot id="footer">
						<tr> 
							<td colspan='3' rowspan="2" class="upsell_section">
							</td>
							<td colspan='2' rowspan='1' class='subtotal'>
								<div class="rel">
									<div class="subtotal-text">
										<span class="label"><?php echo chao_tilde('Envío')?></span>
										<span class='money' id="subtotal">$<?php echo number_format($reg["costo_de_envio"]);?></span><br>
										<span class="label">Total</span>
										<?php
											$costo_de_envio = $reg["costo_de_envio"];
										?>
										<span class='money' id="subtotal">$<?php if(isset($total)) echo number_format($total+$costo_de_envio);?></span><br><br>
										<!--<a href="procesar_carrito" class="button blue medium float-right bottom">Checkout</a>-->
										<?php			
											$ApiKey = "20c7scfcmr6qrj4uto3s28t6o4";
											$merchant_id = "504830";
											$referenceCode = $reg['id_pedidos'];
											$total = $total+$costo_de_envio;
											$amount= number_format($total,1,'.','');
											$currency = "COP";
											$firma_cadena= "$ApiKey~$merchant_id~$referenceCode~$amount~$currency";
											$firmacreada = md5($firma_cadena);					
										?>
										<!--- SIN SERVICIO, COTIZACION -->
										<form name="form" accept-charset="UTF-8" action="cotizacion" method="post" >
											<div class="input-wrapper">
												<!--<a href="checkout/procesar_carrito" class="button blue medium float-right bottom">Checkout</a>-->
													<input type="submit" class="button blue medium " value="Pagar"><br><br>										  								
											</div>
										</form>	


										<!--CON SERVICIO-->
										<!--<form name="form" accept-charset="UTF-8" action="https://gateway.payulatam.com/ppp-web-gateway/" method="post" >
											<div class="input-wrapper">
												<!--<a href="checkout/procesar_carrito" class="button blue medium float-right bottom">Checkout</a>-->
													<!--<input type="submit" class="button blue medium " value="Pagar"><br><br>										  
													<input type="hidden" name="merchantId" value="504830"/>
													<input type="hidden" name="ApiKey" value="20c7scfcmr6qrj4uto3s28t6o4"/>
													<input type="hidden" name="referenceCode" value="<?php echo $reg["id_pedidos"];?>"/>
													<input type="hidden" name="accountId" value="505794"/>
													<input type="hidden" name="description" value="Pedido # <?php echo $reg["id_pedidos"];?> - <?php if(isset($nombre_del_producto)) echo $nombre_del_producto?> (FloresyMas Premium)"/>
													<input type="hidden" name="amount" value="<?php if(isset($total)) echo $total?>"/>
													<input type="hidden" name="tax" value="<?php echo $valor_iva?>"/>
													<input type="hidden" name="taxReturnBase" value="<?php echo $valor_iva2?>"/>
													<input type="hidden" name="currency" value="COP"/>
													<input type="hidden" name="signature" value="<?php echo $firmacreada;?>"/> 
													<input type="hidden" name="test" value="0"/>
													<input type="hidden" name="buyerEmail" value="<?php echo $reg["email_de_quien_llama"]; ?>"/>
													<input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>									
											</div>
										</form>
										<!--<p>
										<?php if(isset($nombre_del_producto)) echo $nombre_del_producto?><br>
										<?php if(isset($total)) echo $total+$costo_de_envio ?><br>
										<?php if(isset($cantidad)) echo $cantidad?>										
										</p>-->
									</div>
								</div>
							</td>
							<td class="buttons"></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
        <div id='back_to_top'></div>
        <div class='push'></div>
    </div><br><br>	
    <?php require_once("../instancias/footer.php"); ?>
	<?php
		}
	?>    
    <script src="../assets/desktop/global/init-5b2cab29e45b31055652fe8cae9e2e4d.js" type="text/javascript"></script>    
    <script src="../assets/desktop/cart/init-2e4e2d4ee2005b115063f92a8fce38cb.js" type="text/javascript"></script>
</body>
</html>
