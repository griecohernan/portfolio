<?php 

include_once ("config.php");
include_once ("entidades/usuario.php");

$msg="";

if($_POST){
  //comprobamos que el usuario sea admin y la contraseña admin123
  //El trim elimina los espacios laterales
  $usuario = trim($_POST["txtUsuario"]);
  $clave = trim($_POST["txtClave"]);


  $entidadUsuario= new Usuario();
  $entidadUsuario -> obtenerPorUsuario($usuario);
  //print_r($clave); //ver la clave encriptada
   //print_r($entidadUsuario);exit;//ver la clave encriptada

  if($entidadUsuario->verificarClave($clave,$entidadUsuario->clave)){
    $_SESSION ["nombre"]= $entidadUsuario->nombre;
    header("location:index.php"); //redirecciona a la home 
  } else {
    $msg= "usuario o clave incorrecto"; //sino muestra en pantalla este mensaje al usuario
  }
}


// session_start();
// $claveEncriptada= password_hash("admin123",PASSWORD_DEFAULT);
// $msg="";
// //es Postback?
// if($_POST){
//   $usuario = $_POST["txtUsuario"];
//   $clave = $_POST["txtClave"];

// // Comprobamos que el usuario sea admin y la clave sea admin 123
// if($usuario =="admin" &&  password_verify($clave, $claveEncriptada)){
//   //si es correcto creamos una variable de session llamada nombre y tenga el valor ana valle
//   //redireccionamos a la home
//     $_SESSION ["nombre"]= "Hernán Grieco";
//   header("Location: index.php");

// } 
//   $msg= "usuario o clave incorrecto";
  
// }


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  
                  <form class="user" method="POST">
                    <?php if($msg!=""):?>
                     <div class="alert alert-danger" role="alert">
                      <?php echo $msg;?>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="txtUsuario" placeholder="Usuario" value="admin">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="txtClave" placeholder="Clave" value ="admin123">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordarme</label>
                      </div>
                    </div>
                    <button type="submit" href="index.php" class="btn btn-primary btn-user btn-block">
                      Entrar
                    </button>
                    <hr>
                  </form>

                  <div class="text-center">
                    <a class="small" href="forgot-password.html">¿Olvidaste la clave?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Crea una cuenta</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
