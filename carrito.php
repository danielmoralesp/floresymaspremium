<?php
	session_start();
	require_once("conexion.php");	
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <title>Carrito de Compras | FloresyMas.co</title>
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="authenticity_token" name="csrf-param" />
	<meta content="" name="csrf-token" />
	
	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "carrito-m";
		}
	  //-->
	</script>

    <script src="assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/desktop/cart/base-8fa6ad487aea51d1cd6ecaf9db5eb33d.css" media="screen" rel="stylesheet" type="text/css" />

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
		<?php require_once("instancias/header.php"); ?>  
		<?php
			if(isset($_POST['id_producto'])){			
				$id_producto=$_POST['id_producto'];
				$foto_thumbnail=$_POST['foto_thumbnail'];
				$descripcion_del_producto=$_POST['descripcion_del_producto'];
				$nombre_del_producto=$_POST['nombre_del_producto'];
				$precio_del_producto=$_POST['precio_del_producto'];
				$cantidad=$_POST['cantidad'];
				$colores_de_rosas=$_POST['colores_de_rosas'];
				$unidades_de_rosas=$_POST['unidades_de_rosas'];
				$tamano_del_producto=$_POST['tamano_del_producto'];
				$mi_carrito[]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cantidad,'colores_de_rosas'=>$colores_de_rosas,'unidades_de_rosas'=>$unidades_de_rosas,'tamano_del_producto'=>$tamano_del_producto);
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
					$colores_de_rosas=$_POST['colores_de_rosas'];
					$unidades_de_rosas=$_POST['unidades_de_rosas'];
					$tamano_del_producto=$_POST['tamano_del_producto'];
					$pos=-1;
					for($i=0;$i<count($mi_carrito);$i++){
						if($id_producto==$mi_carrito[$i]['id_producto']){
							$pos=$i;
						}
					}
					if($pos<>-1){
						$cuanto=$mi_carrito[$pos]['cantidad']+$cantidad;
						$mi_carrito[$pos]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cuanto,'colores_de_rosas'=>$colores_de_rosas,'unidades_de_rosas'=>$unidades_de_rosas,'tamano_del_producto'=>$tamano_del_producto);
					}else{				
						$mi_carrito[]=array('id_producto'=>$id_producto,'foto_thumbnail'=>$foto_thumbnail,'descripcion_del_producto'=>$descripcion_del_producto,'nombre_del_producto'=>$nombre_del_producto,'precio_del_producto'=>$precio_del_producto,'cantidad'=>$cantidad,'colores_de_rosas'=>$colores_de_rosas,'unidades_de_rosas'=>$unidades_de_rosas,'tamano_del_producto'=>$tamano_del_producto);
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
				<h1 class="blue float-left">Su Carrito</h1>
				<a href="productos.php" class="link float-right bottom">Volver al <?php  echo chao_tilde('Catálogo') ?></a>
			</div>
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
                                <img alt="" src="panel/catalogo/img/thumbnail/<?php echo $mi_carrito[$i]['foto_thumbnail'];?>" />
                            </td>
                            <td class="description">
                                <?php echo $mi_carrito[$i]['nombre_del_producto'];?><br>
								<span>
									<img src="panel/img/colores/<?php echo $mi_carrito[$i]['colores_de_rosas'];?>.png" width="20px" height="20px"  / >									
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
									$unidades_de_rosas = $mi_carrito[$i]['unidades_de_rosas'];
									$colores_de_rosas = $mi_carrito[$i]['colores_de_rosas'];
								?>
                            </td>
                            <td class='price-per money'>
                                <?php echo $mi_carrito[$i]['unidades_de_rosas'];?>
                            </td>
                            <td class='quantity'>
                                   <form action="" method="post" name="actualizo">
										<input name="id2" type="hidden" value="<?php echo $i?>" />
										<input class="" name="cantidad2" style="max-width:60px" value="<?php echo $mi_carrito[$i]['cantidad'];?>" id="appendedInputButtons" size="16" type="text">
										<button type="submit" value="actualizar" >
											<span class="increase">
												<span class="v"></span>
												<span class="h"></span>
											</span>
										</button>		
									</form>
                            </td>
                            <td class='price money'>
                                <div class="rel">
                                    <span class="amount">$<?php echo number_format(round($subtotal)); ?></span>	
									<form action="" method="post">
										<div class="add-to-cart">    						
											<input name="id3" type="hidden" value="<?php echo $i?>" />
											<input type="submit" value="X" class="remove" value="Eliminar" />
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
                            <!--<div class="upsell-msg">La <?php  echo chao_tilde('adición')?> perfecta para su regalo:</div>
                            <?php			
								$sql = "select * from producto where tipo_de_producto='Chocolate' or tipo_de_producto='Peluche' or tipo_de_producto='Vino' and en_inventario='si' order by rand() limit 1";
								$res = mysql_query($sql,$con);
								while($reg = mysql_fetch_array($res)){	
							?>
							<div class="upsell vertical" data-product-ids="147,149">
                                <a href="productos/adicion.php?id_producto=<?php echo $reg["id_producto"];?>">
									<div class="upsell_button vertical">
										<div class="tip">Add</div>
										<span class="add">
                                            <span class="plus">+</span>
                                        </span>
                                        <div class="product">
                                            <img alt="" src="panel/catalogo/img/thumbnail/<?php echo $reg["foto_thumbnail"];?>"  width="83px" height="110px"/>
                                        </div>
                                        <h9><?php echo $reg["nombre_del_producto"];?></h9>
                                        <div class="price">$<?php echo number_format($reg["precio_del_producto"]);?></div>
									</div>
								</a>
                            </div>
							<?php
								}
							?>
							-->
							</td>
							<td colspan='2' rowspan='1' class='subtotal'>
							<div class="rel">
								<div class="subtotal-text">
									<span class="label">Subtotal</span>
									<span class='money' id="subtotal">$<?php if(isset($total)) echo number_format($total);?></span><br><br>
									<!--<a href="procesar_carrito" class="button blue medium float-right bottom">Checkout</a>-->
									<form name="form" accept-charset="UTF-8" action="checkout/procesar_carrito" method="post" enctype="multipart/form-data">
										<div class="input-wrapper">
											<!--<a href="checkout/procesar_carrito" class="button blue medium float-right bottom">Checkout</a>-->
											<input type="submit" class="button blue medium " value="Comprar">
											<input type="hidden" name="nombre_del_producto" value="<?php if(isset($nombre_del_producto)) echo $nombre_del_producto?>"/>
											<input type="hidden" name="total" value="<?php if(isset($total)) echo $total?>"/>
											<input type="hidden" name="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>"/>
											<input type="hidden" name="estado_pedido" value="1"/>
											<input type="hidden" name="fecha_de_pedido" value="<?php echo date('m/d/Y')?>"/>	
											<input type="hidden" name="fecha_de_pago" value="<?php echo date('m/d/Y')?>"/>
											<input type="hidden" name="unidades_de_rosas" value="<?php if(isset($unidades_de_rosas)) echo $unidades_de_rosas?>"/>
											<input type="hidden" name="colores_de_rosas" value="<?php if(isset($colores_de_rosas)) echo $colores_de_rosas?>"/>
											<input type="hidden" name="id_pedidos" value="<?php echo $_GET["id_pedidos"];?>"/>
											<input type="hidden" name="id_producto" value="<?php echo $reg["id_producto"];?>"/>
										</div>
									</form>
									<!--<p>
									<?php if(isset($nombre_del_producto)) echo $nombre_del_producto?><br>
									<?php if(isset($total)) echo $total?><br>
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
    </div>
	<?php require_once("instancias/footer.php"); ?>
    <script src="assets/desktop/global/init-5b2cab29e45b31055652fe8cae9e2e4d.js" type="text/javascript"></script>    
    <script src="assets/desktop/cart/init-2e4e2d4ee2005b115063f92a8fce38cb.js" type="text/javascript"></script>
</body>
</html>
