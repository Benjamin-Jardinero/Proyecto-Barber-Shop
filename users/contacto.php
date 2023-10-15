<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }

$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

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
	if (!$errores) {






// se instancia el objeto de php mailer 
$mail = new PHPMailer(true);



try {
    //configuracion del servidor 
    $mail->SMTPDebug = 0;                                       // ver errores 
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //smtp cambia dependiendo el mail que se usa
    $mail->SMTPAuth   = true;                                   //
    $mail->Username   = '42027184@itbeltran.com.ar';                     //SMTP mail de donde sale estos datos los usa para entrar a tu mail
    $mail->Password   = 'Enzoperez24';                               //SMTP clave de tu mail
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port el puerto cambia dependiendo de donde se manda gmail/hotmail/oficce365

    //Recipients
    $mail->setFrom('42027184@itbeltran.com.ar', 'Benja');// desde donde se manda
    $mail->addAddress($correo, 'user');     //quien lo recibe 
    

   

    //Contenido del mail 
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enviado desde Barber Shop';
    $mail->Body    = $mensaje; // este mensaje se toma de la vista
    
    $mail->send(); // se envia el mail

} catch (Exception $e) { ?>
	<div class="alert error" role="alert">
		<?php echo "NO SE PUDO ENVIAR EL ERROR ES EL SIGUIENTE: {$mail->ErrorInfo}"; ?>
	</div>
 <?php   
}


}

}


require 'mailer.php';
?>
