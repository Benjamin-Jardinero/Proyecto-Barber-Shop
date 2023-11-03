<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'users/PHPMailer/Exception.php';
require 'users/PHPMailer/PHPMailer.php';
require 'users/PHPMailer/SMTP.php';

// Comprobando si los datos se envian por el metodo POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	echo "Se enviaron por POST";
// }

$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
$correo;
if (isset($_POST['resetPassword'])) {
	$correo = $_POST['correoReset'];
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

// se instancia el objeto de php mailer 
$mail = new PHPMailer(true);



try {
    //configuracion del servidor 
    $mail->SMTPDebug = 0;                                       // ver errores 
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //smtp cambia dependiendo el mail que se usa
    $mail->SMTPAuth   = true;     
    $mail->Username   = '42027184@itbeltran.com.ar';                     //SMTP mail de donde sale estos datos los usa para entrar a tu mail                              //
    $mail->Password   = 'Enzoperez24';                               //SMTP clave de tu mail
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port el puerto cambia dependiendo de donde se manda gmail/hotmail/oficce365

    //Recipients
    $mail->setFrom('42027184@itbeltran.com.ar', 'Reset Contraseña');// desde donde se manda
    $mail->addAddress($correo, 'user');     //quien lo recibe 
    

   

    //Contenido del mail 
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enviado desde Barber Shop';
    $mensaje = "Para restaurar su contraseña dirijase a la siguiente pagina";
    $mensaje .= " http://localhost/proyectoBarber/resetContraVista.php ";
    $mail->Body    = $mensaje; // este mensaje se toma de la vista
    
    $mail->send(); // se envia el mail

    ?>
        <h3>Se envio un mail, revise en spam</h3>
    <?php
} catch (Exception $e) { ?>
	<div class="alert error" role="alert">
		<?php echo "NO SE PUDO ENVIAR EL ERROR ES EL SIGUIENTE: {$mail->ErrorInfo}"; ?>
	</div>
 <?php   
}


}

}
?>
