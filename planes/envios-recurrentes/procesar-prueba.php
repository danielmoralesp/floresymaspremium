						<?php  							
							if($_POST["color_de_rosas"]=="rosas_rojas"){
								$valor_rosas = 2300;							
							}else if ($_POST["color_de_rosas"]=="rosas_rosadas"){
								$valor_rosas= 2200;		
							}else if ($_POST["color_de_rosas"]=="rosas_amarillas"){
								$valor_rosas= 2100;
							}else if ($_POST["color_de_rosas"]=="rosas_blancas"){
								$valor_rosas= 2000;
							}else if ($_POST["color_de_rosas"]=="rosas_combinadas"){
								$valor_rosas= 2500;
							}else {
								$valor_rosas= 2050;
							}	
							
						?>
						
						<?php echo $valor_rosas?>
						
						
						
		ciudad_de_entrega = '".$_POST["ciudad_de_entrega"]."',
		dir_1_entrega = '".$_POST["dir_1_entrega"]."',
		dir_2_entrega = '".$_POST["dir_2_entrega"]."',
		dir_3_entrega = '".$_POST["dir_3_entrega"]."',
		barrio = '".$_POST["barrio"]."',
		ayuda_envio = '".$_POST["ayuda_envio"]."',
		nombre_de_quien_llama = '".$_POST["nombre_de_quien_llama"]."',
		telefonos_de_quien_llama = '".$_POST["telefonos_de_quien_llama"]."',
		email_de_quien_llama = '".$_POST["email_de_quien_llama"]."',
		password_de_quien_llama = '".$_POST["password_de_quien_llama"]."',	
		
		