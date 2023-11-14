<?php
// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }

$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['resetPassword'])) {
	$correo = $_POST['correoReset'];
	$header = "From: noreply@example.com" . "\r\n";
	$header .= "Reply-To: noreply@example.com" . "\r\n";
	$header .= "X-Mailer: PHP/". phpversion();

	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}

// Comprobamos si hay errores, si no hay entonces enviamos.

	if (!$errores) {
		$enviar_a = $correo;
		$asunto = "Restaurar Contraseña";
		$mensaje = "Para restaurar la contraseña dirijase a: http://localhost/proyectoBarber/resetContraVista.php";

		$email = @mail($enviar_a, $asunto, $mensaje, $header);
		$enviado = 'true';
	}
}

include 'resetVista.php';

?>
