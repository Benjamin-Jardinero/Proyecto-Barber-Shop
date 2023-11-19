<?php
// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
include("con_bd.php");
$errores = '';
$enviado = '';
$correoVerificar="";
$nombreUser = "";

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['resetPassword'])) {
	$_SESSION['correo'] = $_POST['correoReset'];
	if(isset($_SESSION['correo'])){
		$mail = $_SESSION['correo'];
		$consulta = "SELECT * FROM registros WHERE correo = '$mail'";
		$resultado = mysqli_query($conex, $consulta);
	
			  if ($resultado) {
				  while ($row = $resultado -> fetch_array()) {
					  //Obtenemos el correo del usuario que ha pedido cambiar su contraseña
					  $correoVerificar = $row['correo'];
					  $nombreUser = $row['nombre'];
				  }
			  }
	} else{
	  header("Location: vista.php");
	}

	//$header = "From: noreply@example.com" . "\r\n";
	//$header .= "Reply-To: noreply@example.com" . "\r\n";
	//$header .= "X-Mailer: PHP/". phpversion();

	//Comprobamos que el correo no este vacio
	if (!empty($correoVerificar)) {
		$correoVerificar = filter_var($correoVerificar, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correoVerificar, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}

	// Comprobamos que el nombre no este vacio.
	if (!empty($nombreUser)) {
		// Saneamos el nombreUser para eliminar caracteres que no deberian estar.
		$nombreUser = trim($nombreUser);
		$nombreUser = filter_var($nombreUser, FILTER_SANITIZE_STRING);
		// Comprobamos que el nombreUser despues de quitar los caracteres ilegales no este vacio.
		if ($nombreUser == "") {
			$errores.= 'Por favor ingresa un nombre.<br />';
		}
	} else {
		$errores.= 'Por favor ingresa un nombre.<br />';
	}

	// Comprobamos si hay errores, si no hay entonces enviamos.
	//Ejemplo sin PHPMailer

	// if (!$errores) {
	// 	$enviar_a = $correoVerificar;
	// 	$asunto = "Restaurar Contraseña";
	// 	$mensaje = "Para restaurar la contraseña dirijase a: http://localhost/proyectoBarber/resetContraVista.php";

	// 	$email = @mail($enviar_a, $asunto, $mensaje, $header);
	// 	$enviado = 'true';
	// }

	//Con PHPMailer
	if(!$errores){

		// Crea una instancia de PHPMailer
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
			$mail->addAddress($correoVerificar, $nombreUser);
			$mail->isHTML(true);
			$mail->Subject = 'Restaurar Password';
			$mail->Body = 'Para restaurar la contraseña dirijase a: http://localhost/proyectoBarber/resetContraVista.php';

			// Enviar el correo
			$mail->send();
			header("Location: passwordSuccess.php");
			exit();
		} catch (Exception $e) {
			echo "Error al enviar el correo: {$mail->ErrorInfo}";
		}
	}
}
?>
