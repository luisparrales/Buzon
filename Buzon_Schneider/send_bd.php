
<?php
header('content-type: text/html; charset=utf-8');
header('content-type: text/html; charset=utf-8');
  
	date_default_timezone_set("America/Mexico_City");
	


	$area = $_POST["area"];

$tipo=substr($area, 0,1);
if($tipo=="1")
{

$buzon='Sugerencia';

}

elseif($tipo=="2")
{

$buzon='Quejas';

}

else
{

$buzon='Felicitacion';

}

	$sugerencia = $_POST["sugerencia"];


require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'buzonquejas.schneider067@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'SchneiderElectric067';

//Set who the message is to be sent from
$mail->setFrom('buzonquejas.schneider067@gmail.com', 'Quejas y Sugerencias');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress("lapcopca@gmail.com", 'Luis Parrales jaja');

//Set the subject line
$mail->Subject = $buzon." de ".substr($area,1);

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($sugerencia);

//Replace the plain text body with one created manually
$mail->AltBody = $sugerencia;

//Attach an image file
//$mail->addAttachment($sugerencia);

//send the message, check for errors
if (!$mail->send()) {
    echo '<script language="javascript">alert("Tu mensaje no fue enviado");
     location.href ="home.html";
    </script>' . $mail->ErrorInfo;
}

else {
	
    echo '<script language="javascript">alert("Tu mensaje ha sido enviado ");
     location.href ="home.html";

    </script>'; 

 //  <a href='home.html'>Regresar</a></h2></html>;
}
?>