<?php
require_once('library/class.phpmailer.php');
	
$address=$_POST['direccion'];


//$address="vicmanare@hotmail.com";//vicmanare@hotmail.com
$name="Gerencia";

//$body=$_POST['body'];

$archivo = 'http://prueba-app.16mb.com/b4a2/Reportes/junio2016.pdf';
$body='<a href="http://prueba-app.16mb.com/b4a2/Reportes/junio2016.pdf" TARGET="_blank">Reporte Mensual</a>';

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
$mail->Subject = "Reporte Mensual  Año 2016_06";
  
  $mail->AddAttachment("http://prueba-app.16mb.com/b4a2/Reportes/junio2016.pdf");
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






<?php/*
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

if (isset($_POST['recibir'])) {
    if (comprobar_email($_POST['email'])) {
        require_once("classes/class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "from@domain.com";
        $mail->FromName = "Jose Aguilar";
        $mail->Subject = "Demo de PHPMailer";
        $mail->Body = "Hola, esto es una demo de envio de emails con archivos adjuntos!!!";
        $mail->AddAddress($_POST['email'], "User Name");
        $archivo = 'prueba.pdf';
        $mail->AddAttachment($archivo,$archivo);
        $mail->Send();
        echo '<p>Se ha enviado correctamente el email a '.$_POST['email'].'!</p>';
    }
    else {
        echo '<p>El email introducido no es correcto!</p>';
    }
}*/
?>