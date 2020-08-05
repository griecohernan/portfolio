<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function guardarCorreo($correo){
    $archivo=fopen("mails.txt","a+");
    fwrite($archivo, $correo. ";\n");
    fclose($archivo);
}


$pg ="contacto";

include_once ("PHPMailer/src/PHPMailer.php");
include_once ("PHPMailer/src/SMTP.php");

if ($_POST){
    $nombre=$_POST["txtNombre"];
    $correo=$_POST["txtCorreo"];
    $asunto=$_POST["txtAsunto"];
    $mensaje=$_POST["txtMensaje"];
    guardarCorreo($correo);
    
   


    if($nombre != "" && $correo != ""){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "mail.hernangrieco.com.ar"; // SMTP a utilizar
        $mail->Username = "info@hernangrieco.com.ar"; // Correo completo a utilizar
        $mail->Password = "H3RN4.8012";
        $mail->Port = 25;
        $mail->From = "info@hernangrieco.com.ar"; //Desde la cuenta donde enviamos
        $mail->FromName = utf8_decode("Hernán Grieco");;
        $mail->IsHTML(true);
        $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

        //Destinatarios
        $mail->addAddress($correo);
        $mail->addBCC("griecohernan@gmail.com"); //Copia oculta
        $mail->Subject = utf8_decode("Contacto página Web");
        $mail->Body = "Recibí tu consulta, te responderemos a la brevedad.";
        if(!$mail->Send()){
            $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        }
        $mail->ClearAllRecipients(); //Borra los destinatarios

        //Envía ahora un correo a nosotros con los datos de la persona
        $mail->addAddress("griecohernan@gmail.com");
        $mail->Subject = utf8_decode("Recibiste un mensaje desde tu página Web");
        $mail->Body = "Te escribio $nombre cuyo correo es $correo, con el asunto $asunto y el siguiente mensaje:<br><br>$mensaje";
       
        if($mail->Send()){ /* Si fue enviado correctamente redirecciona */
            header('Location: confirmacion-envio.php');
        } else {
            $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        }    
    } else {
        $msg = "Complete todos los campos";
    }

}





?>










<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/cv.ico" type="image/x-icon">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

<?php include_once("menu.php");?>

    <div class="container">



        <section id="contacto">

            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <h1>¡Trabajemos juntos!</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mb-5">
                    <h2 class="contacto-h2">Para más detalles sobre mi <br> trabajo podés ver mi <a
                            href="https://www.linkedin.com/in/hernangrieco/"
                            target="_blank">Linkedin</a>, <br>
                        descargar mi <a href="files/GriecoHernanCV.pdf" target="_blank">CV</a> o mandarme un <a
                            href="#formContacto">mensaje</a>.
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-10">
                    <form id="formContacto" action="" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-6 form-group">
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required
                                    placeholder="Nombre">
                                <hr>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required
                                    placeholder="Correo">
                                <hr>
                            </div>
                            <div class="col-12 col-sm-12 form-group">
                                <input type="text" name="txtAsunto" id="TxtAsunto" class="form-control" required
                                    placeholder="Asunto">
                                <hr>
                            </div>
                            <div class="col-12 form-group">
                                <textarea name="txtMensaje" id="txtMensaje" cols="30" rows="10" class="form-control"
                                    placeholder="Mensaje" required></textarea>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-4 mb-sm-5">
                                <input type="submit" name="btnEnviar" value="ENVIAR" class="btn-contacto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 d-sm-none text-right mb-5 depc-mobile">
                    <p>Patrocinado por <br><a href="https://depcsuite.com" target="_blank"><span>DePc Suite</span></a>
                    </p>
                </div>

        </section>
    </div>


    <?php include_once("footer.php");?>

            

    <footer id="responsive">
        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <a href="https://api.whatsapp.com/send?phone=541164187516&amp;text=Hola
                     " target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
                 <div class="col text-center">
                            <a href="https://www.linkedin.com/in/hernangrieco/" target="_blank"> <i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col text-right" >
                    <a href="https://github.com/griecohernan" target="_blank"><i class="fab fa-github"></i> </a>
                 </div>
                
            </div>
        </div>

    </footer>




</body>

</html>