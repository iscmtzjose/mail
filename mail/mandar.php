<?php
require_once('library/class.phpmailer.php');

$address=$_GET['direccion'];


//$address="vicmanare@hotmail.com";//vicmanare@hotmail.com
$name="Cliente";
$body='
    <br>Gracias por contestar nuestra encuesta de calidad
 
	<br>Usted podrá participar en nuestro sorteo con el siguiente ticket
	 
	<br><b>94949494</b>
	 
	<br>Los resultados serán publicados en nuestra página:
	 
	 <br> www.eucomb.com.mx/sorteo
';

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
$mail->Subject = "Sorteo";
  $mail->isHTML( TRUE );
$mail->MsgHTML($body);
$mail->AddAddress($address, $name);

   $mail->WordWrap    = 900; 
   //$mail->Timeout=30;
 
 
 
 
 //for($i=0;$i<1;$i){
	if($mail->Send()) {
		echo "Email Enviado";
		$i=1000;
	} 
	else {
		echo "Hubo un Error: " . $mail->ErrorInfo;
	}
 //}
 

  $mail->SmtpClose();


/*


 $Mail = new PHPMailer();
  $Mail->IsSMTP(); // Use SMTP
  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
  $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'MyGmail@gmail.com'; // SMTP account username
  $Mail->Password    = 'MyGmailPassword'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = 'Test Email Using Gmail';
  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
  $Mail->From        = 'MyGmail@gmail.com';
  $Mail->FromName    = 'GMail Test';
  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = $MessageHTML;
  $Mail->AltBody = $MessageTEXT;
  $Mail->Send();
  $Mail->SmtpClose();

  if ( $Mail->IsError() ) { 
    echo "ERROR<br /><br />";
  }
  else {
    echo "OK<br /><br />";
  }












/*

ftp://waws-prod-sn1-025.ftp.azurewebsites.windows.net





prueba-app.eu5.org/mandar.php?direccion=prueba@correo.com































					require_once "Mail.php";

					$from = "Web Master <factura-electronica@eucomb.com.mx>";
					$to = "Nobody <iscmtzjose@gmail.com>";
					$subject = "Test email using PHP SMTP\r\n\r\n";
					$body = "This is a test email message";

					$host = "smtp.eucomb.com.mx";
					$port = "587";
					$username = "factura-electronica@eucomb.com.mx";
					$password = "eucomb07";
					$headers = array ('From' => $from,
					  'To' => $to,
					  'Subject' => $subject);
					$smtp = Mail::factory('smtp',
					  array ('host' => $host,
						'port' => $port,
						'auth' => true,
						'username' => $username,
						'password' => $password));

					$mail = $smtp->send($to, $headers, $body);

					if (PEAR::isError($mail)) {
					  echo("<p>" . $mail->getMessage() . "</p>");
					} else {
					  echo("<p>Message successfully sent!</p>");
					}
				


/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
//require 'mail/class.phpmailer.php';
/*
require 'mail/class.phpmailer.php';

 
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'smtp.eucomb.com.mx';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 25;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
$mail->Username   = "factura-electronica@eucomb.com.mx";
//Introducimos nuestra contraseña de gmail
$mail->Password   = 'eucomb07';
//Definimos el remitente (dirección y, opcionalmente, nombre)
$mail->SetFrom('factura-electronica@eucomb.com.mx"', 'Mi nombre');
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
$mail->AddAddress('iscmtzjose@icloud.com', 'El Destinatario');
//Definimos el tema del email
$mail->Subject = 'Esto es un correo de prueba';
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}
*/
?>