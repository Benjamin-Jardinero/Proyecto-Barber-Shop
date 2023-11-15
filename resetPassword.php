<?php
// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }

session_start();
include("con_bd.php");
$errores = '';
$enviado = '';


$correoVerificar="";

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
				  }
			  }
	} else{
	  header("Location: vista.php");
	}

	$header = "From: noreply@example.com" . "\r\n";
	$header .= "Reply-To: noreply@example.com" . "\r\n";
	$header .= "X-Mailer: PHP/". phpversion();

	if (!empty($correoVerificar)) {
		$correoVerificar = filter_var($correoVerificar, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correoVerificar, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}

// Comprobamos si hay errores, si no hay entonces enviamos.

	if (!$errores) {
		$enviar_a = $correoVerificar;
		$asunto = "Restaurar Contraseña";
		$mensaje = "Para restaurar la contraseña dirijase a: http://localhost/proyectoBarber/resetContraVista.php";

		$email = @mail($enviar_a, $asunto, $mensaje, $header);
		$enviado = 'true';
	}
}
?>
