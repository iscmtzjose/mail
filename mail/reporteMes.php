<?php
require_once('library/class.phpmailer.php');
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseQuery;	
	ParseClient::initialize('KDFUnDvJ9klu2cLMZljpe6L9NflE0wQoE5iRWRQJ', '19dm1xNY8DMRaCt6ACKfwOw60iNmYtDnJd44sjWB', 'bxrQwfUZz9kGt1PoxyzDGYCEW9EKsEJnwnkVixpH');
	ParseClient::setServerURL('https://parseapi.back4app.com/');
	use Parse\ParseObject;	
	//set_time_limit(100000); 
$address=$_GET['direccion'];


//$address="vicmanare@hotmail.com";//vicmanare@hotmail.com
$name="Gerencia";




	//no mover  D:

	/*ParseClient::initialize('J4DC9eqQPFJYKZBMxWPubVigPYvpwCDqSvGYLFbi', 'd9BLwO7DTmfNsH2kvklnoE6GeyrD5nalRisKekX1', 'C8NGxrsWLIDnLHWBqg0j5YMzx1m3AtuLLnKMxIR2');
	ParseClient::setServerURL('https://ugmserver.herokuapp.com/Parse');*/
	//aqui ya se puede mover
	//$app_id, $rest_key, $master_key
	//ParseClient::initialize('TeoH37LLM24OB5uKpaeq9gjpE5Wdy9kdTOpwtAoG', '11281xIephz6Bl7VKmTdfco2C58yU3ErDrkONe0b', 'G3EKqbtM5Oc7n5HmeuqtMZRNtxSFaCBYmRzGIUjn');
	
	$despachador = array();
	$id=array();
	$corto=array();

$body='
	<html>
		<head>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="librerias/jquery-1.3.2.min.js"></script>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		</head>
	<body>

	<center><h1>Sistema de Encuestas Grupo Gasolinero EUCOMB</h1>
	
	<img src="http://prueba-app.16mb.com/b4a2/LOGO.jpg" style="width: 300px; height: 250px;"></img>
	
	<center><h2>Resultados Correspondientes al mes de Junio 2016</h2></center>
		<table border="1" WIDTH=90% class="table table-hover">
		<thead>
			<tr><th><center>Pregunta</center></th><th><center>Promedio</center></th></tr>
			</thead>
			<tbody>';



							$arreglo=array();
							$arregloPreguntas=array();
							$query = new ParseQuery("Estacion");
							$results = $query->find();
							for ($i = 0; $i < count($results); $i++) {
								$arreglo[$i]=$object = $results[$i];
								$arregloPreguntas[$i]=$val=$object->get('name');
								//echo "<option value='".$val."'>".$val."</option>";
							}
							$cadena="valores=".count($arreglo); 
							
		$startDate = new DateTime(); //Has current date and time
	$startDate->modify("-1 months");
	
	for($x=0;$x<count($arreglo);$x++){
		$body=$body."<tr><td>".$arregloPreguntas[$x]."</td>";
		$query = new ParseQuery("Movimiento");
		$query->equalTo("estacion", $arreglo[$x]);
		$query->greaterThanOrEqualTo("createdAt", $startDate);
		$results = $query->find();
		/*echo "<td>".*/$prom=count($results);/*."</td>";*/
		$contadorAux=0;
		for ($i = 0; $i < count($results); $i++) {
			$object2 = $results[$i];
			$contadorAux=$contadorAux+$object2->get('score');		
		}
		
		if($prom>0){
			$xyz=$contadorAux/$prom;
		}
		else{
			$xyz=0;
		}
		
		
		$body=$body."<td><center>".$valor=number_format(($xyz)*(25), 1, '.', ',')."</center></td></tr>";	
		$cadena=$cadena."&valorA".$x."='".$arregloPreguntas[$x]."'&valorB".$x."=".($xyz)*(25);	
	}
	$body=$body."</tbody></table>";


	$body=$body.'<img src="http://prueba-app.16mb.com/b4a2/mes/1.png"></img>
	
	<h2>Resultados por pregunta</h2>
		<table border="1" WIDTH=90%  class="table table-hover">
		<thead>
			<tr><th><center></center></th><th><center>Pregunta</center></th><th><center>Promedio</center></th></tr>
			</thead>
			<tbody>';
		
	
	$arreglo=array();
	$arregloPreguntas=array();
	$arregloCorta=array();
		$query = new ParseQuery("Pregunta");
		$query->equalTo("active",True);
		$query->equalTo("rank",False);
		$results = $query->find();
		for ($i = 0; $i < count($results); $i++) {
			$arreglo[$i]=$object2 = $results[$i];
			$arregloCorta[$i]=$object2->get('label');
			$arregloPreguntas[$i]=$object2->get('text');
		}
		$cadena="valores=".count($arreglo); 
	
	for($x=0;$x<count($arreglo);$x++){
		$body=$body."<tr><td>".$arregloCorta[$x]."</td><td>".$arregloPreguntas[$x]."</td>";
		$query = new ParseQuery("Movimiento");
		$query->greaterThanOrEqualTo("createdAt", $startDate);
		$query->equalTo("pregunta",$arreglo[$x]);
		
		
			if(isset($_POST['nombre'])){
				if($bandera){ 
					$query->equalTo("estacion", $estacion);
				}
				
			}
		
		
		$results = $query->find();
		/*echo "<td>".*/$prom=count($results);/*."</td>";*/
		$contadorAux=0;
		for ($i = 0; $i < count($results); $i++) {
			$object2 = $results[$i];
			$contadorAux=$contadorAux+$object2->get('score');		
		}
		
		if($prom>0){
			$xyz=$contadorAux/$prom;
		}
		else{
			$xyz=0;
		}
		
		
		$body=$body."<td><center>".$valor=number_format(($xyz)*(2.5), 1, '.', ',')."</center></td></tr>";	
		$cadena=$cadena."&valorA".$x."='".($x+1)."'&valorB".$x."=".($xyz)*(2.5);	
	}
	$body=$body. '</tbody></table>
	<img src="http://prueba-app.16mb.com/b4a2/mes/2.png"></img>
	<br>';	
	
	
	
	
	
	
	//primera parte crea arreglo con las preguntas
	$pregunta2= array();
	$arregloPreguntas=array();
	$query = new ParseQuery("Pregunta");
	$query->equalTo("active",True);
	$query->equalTo("rank",True);
	$results = $query->find();
	for ($i = 0; $i < count($results); $i++) {
		$arregloPreguntas[$i] = $object = $results[$i];
		$pregunta2[$i]=$object->get('text');
		$id[$i]=$object->getObjectId();
	}
	//obtiene las posibles respuestas de la pregunta
	$opciones=array();
	$op=array();
	$vecesEcontrada=array();
	for($i=0;$i<1;$i++){
	$contenido=array();
	$valores=array();
		$query = new ParseQuery("prueba");
		$query->equalTo("numero", $id[$i]);
		$results = $query->find();
		for ($j = 0; $j< count($results); $j++) {
			$object = $results[$j];
			$contenido[$j]=$object->get('cont');
			$valores[$j]=$object->get('valor');
		}
		$body=$body."<h3>Pregunta: ".$pregunta2[$i].", Respuesta: No,  	¿Por qué?</h3><br>";
		//al tener creados los arrays de preguntas, id, contenido, y valor se recorren las respuestas para encontrar el numero de coincidencias por respuesta 
		$body=$body.'<table border="1" WIDTH=90%  class="table table-hover">
		<thead>
			<tr><th><center>Opción</center></th><th><center>Respuestas</center></th></tr>
			</thead>
			<tbody>';
		
		//$cosas = array(); 
		
		for($j=0;$j<count($valores);$j++){
		 	$valor=$valores[$j]+1-1;
			$query = new ParseQuery("Movimiento");
			$query->equalTo("pregunta", $arregloPreguntas[$i]);
			$query->greaterThanOrEqualTo("createdAt", $startDate);
			if(isset($_POST['nombre'])){
				if($bandera){ 
					$query->equalTo("estacion", $estacion);
				}
				
			}
			
		
			
			$query->equalTo("score", $valor);
			$results = $query->find();
			//echo"<tr><td>".($opciones[$j]=$contenido[$j])."</td><td>".($op[$j]=count($results))."</td></tr>";
			
			$users[] = array('name' => "<tr><td>".($opciones[$j]=$contenido[$j])."</td><td><center>".($op[$j]=count($results))."</center></td></tr>", 'age' => ($op[$j]=count($results)));
		}
		foreach ($users as $key => $row) {
			$aux[$key] = $row['age'];
		}

		array_multisort($aux, SORT_DESC, $users);
		
		foreach ($users as $key => $row) {
			$body=$body.$row['name'];
		}
		
		$body=$body."</tbody>
		</table>";
	
		$body=$body.'<img src="http://prueba-app.16mb.com/b4a2/mes/3.png"></img>';
		$body=$body.'<img src="http://prueba-app.16mb.com/b4a2/mes/4.png"></img>';

}

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.eucomb.com.mx";
$mail->Port = 25   ;
$mail->SMTPSecure = 'ssh';
  $mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $mail->CharSet     = 'UTF-8';
$mail->Username = "factura-electronica@eucomb.com.mx";
$mail->Password = "eucomb07";
$mail->SetFrom("factura-electronica@eucomb.com.mx", "EUCOMB");
$mail->Subject = "Reporte Mensual";
  $mail->isHTML( TRUE );
$mail->MsgHTML($body);
$mail->AddAddress($address, $name);

   $mail->WordWrap    = 900; 
   //$mail->Timeout=30;
 

	if($mail->Send()) {
		echo "Email Enviado";
		$i=1000;
	} 
	else {
		echo "Hubo un Error: " . $mail->ErrorInfo;
	}

 

  $mail->SmtpClose();

?>