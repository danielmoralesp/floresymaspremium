<?php
	/*$con = mysql_connect("localhost","root","");	
	$bd = mysql_select_db("harrys",$con);
	*/
	
	
	$con = mysql_connect("localhost","ebaniste_fym_pre","dfmp12022421202242");
	//$bd = "sepalos";
	$bd = mysql_select_db("ebaniste_floresymaspremium",$con);	
	mysql_close();
	
	
	function chao_tilde($entra)
	{
	$traduce=array( 'ª' => '&ordf;' , 'º' => '&ordm;' , '¡' => '&iexcl;' , '¿' => '&iquest;' , 'Á' => '&Aacute;' , 'É' => '&Eacute;' , 'Í' => '&Iacute;' , 'Ó' => '&Oacute;' , 'Ú' => '&Uacute;' ,  'á' => '&aacute;' , 'é' => '&eacute;' , 'í' => '&iacute;' , 'ó' => '&oacute;' , 'ú' => '&uacute;' , 'ñ' => '&ntilde;' , 'Ñ' => '&Ntilde;' , 'ä' => '&auml;' , 'ë' => '&euml;' , 'ï' => '&iuml;' , 'ö' => '&ouml;' , 'ü' => '&uuml;');
	$sale=strtr( $entra , $traduce );
	return $sale;
	}
	
	

  
?>

