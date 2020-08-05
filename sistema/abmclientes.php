<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 
 
if(file_exists("datos.txt")){
    $json_clientes= file_get_contents("datos.txt");
    $aClientes = json_decode($json_clientes,true);
} else {
    $aClientes=array();
}


$id = isset($_GET["id"]) ? $_GET["id"] : '';

if(isset($_GET["id"]) && isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset ($aClientes[$id]);
    $json_clientes = json_encode($aClientes);
    file_put_contents("datos.txt",$json_clientes);
}
  

if($_POST){

$dni=$_POST["txtDni"];
$nombre=$_POST["txtNombre"];
$telefono=$_POST["txtTelefono"];
$correo=$_POST["txtCorreo"];
$nombreImagen="";


if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
    $nombreAleatorio = date("Ymdhmsi");
    $archivo_tmp = $_FILES["archivo"]["tmp_name"];
    $nombreArchivo = $_FILES["archivo"]["name"];
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $nombreImagen = $nombreAleatorio . "." . $extension;
    move_uploaded_file($archivo_tmp, "archivos/$nombreImagen");
}


//Si hay una imagen anterior eliminarla, siempre y cuando se suba una nueva imagen  
        //unlink("archivo/imagen123.png"); - Esto elimina el archivo

        //Si no viene ninguna imagen, conservar el nombre de la imagen anterior




if(isset($_GET["id"])){
    
    $imagenAnterior = $aClientes[$id]["imagen"];

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
        if($imagenAnterior != ""){
            unlink("archivos/$imagenAnterior");
        }
    }        
    if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
        $nombreImagen = $imagenAnterior;
    }

   

    
    //actualizada
    $aClientes[$id]=array("dni" =>$dni,
                "nombre"=>$nombre,
                "telefono"=>$telefono,
                "correo"=>$correo,
                "imagen"=>$nombreImagen
);

} else{
    //es nuevo
    $aClientes[]=array("dni" =>$dni,
    "nombre"=>$nombre,
    "telefono"=>$telefono,
    "correo"=>$correo,
    "imagen"=>$nombreImagen
    );


}



//Convertir el array en json
$json_clientes = json_encode($aClientes);

//Guardar el json en un archivo data.txt con file_put_contents
file_put_contents("datos.txt",$json_clientes);
$id = "";



}



?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="txtDni">DNI:</label>
                            <input type="text" id="txtDni" name="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["dni"] : ''; ?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["nombre"] : ''; ?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtTelefono">Teléfono:</label>
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["telefono"] : ''; ?>"> 
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtCorreo">Correo:</label>
                            <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["correo"] : ''; ?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="txtCorreo">Archivo:</label>
                            <input type="file" id="archivo" name="archivo" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>      


                    <?php  foreach ($aClientes as $id => $cliente){?>
                    <tr>
                    <td><img src="archivos/<?php echo $cliente["imagen"];?>" class="img-thumbnail"></td>
                    <td><?php echo $cliente["dni"]; ?></td>
                    <td><?php echo $cliente["nombre"]; ?></td>
                    <td><?php echo $cliente["correo"]; ?></td>
                    <td style="width: 110px; display:inline-flex">
                            <a href="abmclientes.php?id=<?php echo $id ?>"><i class="fas fa-edit"></i></a>
                            <a href="abmclientes.php?id=<?php echo $id ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>    
                        </td>
                    </tr>   
                    <?php } ?>       
                </table>
                <a href="abmclientes.php"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>
    </div>
    
</body>
</html>