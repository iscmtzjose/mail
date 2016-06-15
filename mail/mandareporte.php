<?php
require_once('library/class.phpmailer.php');
	
$address=$_POST['direccion'];


//$address="vicmanare@hotmail.com";//vicmanare@hotmail.com
$name="Gerencia";

$body=$_POST['body'];




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