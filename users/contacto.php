<?php
// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];
	
	//$header = "From: noreply@example.com" . "\r\n";
	//$header .= "Reply-To: noreply@example.com" . "\r\n";
	//$header .= "X-Mailer: PHP/". phpversion();

// Comprobamos que el nombre no este vacio.
	if (!empty($nombre)) {
		// Saneamos el nombre para eliminar caracteres que no deberian estar.
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
		// Comprobamos que el nombre despues de quitar los caracteres ilegales no este vacio.
		if ($nombre == "") {
			$errores.= 'Por favor ingresa un nombre.<br />';
		}
	} else {
		$errores.= 'Por favor ingresa un nombre.<br />';
	}

	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}


	if (!empty($mensaje)) {
		// Podemos sanear la cadena de texto con filter_var, pero queremos que en el mensaje los signos se conviertan en entidades HTML
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripslashes($mensaje);
	} else {
		$errores.= 'Por favor ingresa el mensaje.<br />';
	}

// Comprobamos si hay errores, si no hay entonces enviamos.
	

	// if (!$errores) {
	// 	$enviar_a = "benjaminlazarte123@gmail.com";
	// 	$asunto = 'Consulta por Barber Shop';
	// 	$mensaje = $_POST['mensaje'];
	// 	$mensaje .= "Enviado desde: " . $correo;

	// 	$email = @mail($enviar_a, $asunto, $mensaje, $header);
	// 	$enviado = 'true';
	// }
	if(!$errores){
		$mail = new PHPMailer(true);

		try {
			// Configuración del servidor SMTP
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = 'smtp.office365.com';
			$mail->SMTPAuth = true;
			$mail->Username = '42027184@itbeltran.com.ar'; //correo del usuario en gmail
			$mail->Password = 'Enzoperez24'; //contraseña del gmail
			$mail->SMTPSecure = 'tls'; // Puedes usar 'tls o ssl' también dependiendo de la configuración de tu servidor
			$mail->Port = 587; // Cambia esto según la configuración de tu servidor 587 o 465

			// Configuración del correo electrónico
			$mail->setFrom('42027184@itbeltran.com.ar', 'Barber Shop');
			$mail->addAddress("benjaminlazarte123@gmail.com", "Benja");
			$mail->isHTML(true);
			$mail->Subject = 'Consulta por contacto de Barber Shop';
			$mail->Body = $mensaje;

			// Enviar el correo
			$mail->send();
			$enviado = 'true';
		} catch (Exception $e) {
			echo "Error al enviar el correo: {$mail->ErrorInfo}";
		}
	}
}
require("mailer.php");
?>
