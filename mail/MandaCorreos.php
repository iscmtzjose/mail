<?php
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseQuery;
	ParseClient::initialize('cC2UDoJuBtf19dZYwzns0ifp04jx8U353J3lOmb2', '7Lq7uQfoJfnsPmJCxcBTVytfOZrecVjUpyoNwlP3', 'VaTxoMQF85SHDLyvQoiArprBKnyTCRnuLJiWfiLr');
	use Parse\ParseObject;

	
	//allow_url_include =true;
	include 'http://www.prueba-app-000001-2.azurewebsites.net/mail/mandarMetodo.php';
	
	$a = new mandar();
	$mail=array();
	
	$query = new ParseQuery("lista");
	$query->equalTo("mandado", "no");
	$results = $query->find();
	for ($i = 0; $i < count($results); $i++) {
		$object = $results[$i];
		$mail[$i]=$object->get('mail');
	}
	
	for($z=0;$z<count($mail); $z++){
		$b = $a->Send($mail[$z]);
	}
	
	$query = new ParseQuery("lista");
	$query->equalTo("mandado", "no");
	$results = $query->find();
	for ($i = 0; $i < count($results); $i++) {
		$objeto = $results[$i];
		$objeto->set("mandado", "si");
		try {
			$objeto->save();
		} 
		catch (ParseException $ex) {  
			echo 'No se pudo Ingresar la Pregunta Error: ' . $ex->getMessage();
		}
	}	
	


	
	
	
	
	

	