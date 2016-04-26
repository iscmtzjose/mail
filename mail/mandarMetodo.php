<?php
	require_once('library/class.phpmailer.php');
  
	class madar{
		public function Send($address){
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
				if($mail->Send()) {
					echo "Email Enviado";
				} 
				else {
					echo "Hubo un Error: " . $mail->ErrorInfo;
				}
			$mail->SmtpClose();
		}
	}
  ?>