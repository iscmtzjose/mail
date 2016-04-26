<?php
	echo "hola";
	
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseQuery;
	ParseClient::initialize('cC2UDoJuBtf19dZYwzns0ifp04jx8U353J3lOmb2', '7Lq7uQfoJfnsPmJCxcBTVytfOZrecVjUpyoNwlP3', 'VaTxoMQF85SHDLyvQoiArprBKnyTCRnuLJiWfiLr');
	use Parse\ParseObject;

	echo "hola 1";//////////////////////////
	//allow_url_include =true;
	require_once ('mandarMetodo.php');
	
	$a = new madarMetodo();
	echo "hola 2";
	
	$query = new ParseQuery("lista");
	$query->equalTo("mandado", "no");
	$results = $query->find();
	for ($i = 0; $i < count($results); $i++) {
		$object = $results[$i];
		echo $mail=$object->get('mail');
		echo $b = $a->Send($mail);
	}
	
		echo "hola 3";
	
	
		echo "hola 4";
	
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
	

	echo "hola 5";
	
	
	
	
	

	