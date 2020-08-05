<?php

include_once "config.php";
include_once "entidades/tipo_productos.php";
include_once "entidades/producto.php";


$tipoproducto = new Tipoproducto();
$tipoproducto->cargarFormulario($_REQUEST);

if ($_POST) { 
  if (isset($_POST["btnGuardar"])){
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $tipoproducto->actualizar();
    } else {
      $tipoproducto->insertar();
  }
} else if (isset($_POST["btnBorrar"])){
    $tipoproducto->eliminar();
    header("location:tipo-productos.php");
  }
} 

if (isset($_GET["id"]) && $_GET["id"] > 0) {
  $tipoproducto->obtenerPorId();
}

//$tipoproducto = new Tipoproducto();
//$aTipoProductos = $tipoproducto->obtenerTodos();


//print_r($producto);

 include_once("header.php");
?>
  <form action="" method="POST">
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tipo de productos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="tipo-productos.php" class="btn btn-primary">Listado</a>
                <a href="" class="btn btn-primary">Nuevo</a>
                <button type="submit" class="btn btn-success btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger btnBorrar" name ="btnBorrar">Borrar</button>
              </div>
         </div>

          <!-- Content Row -->

          <div class="row">
              <div class="col-12 form-group">
                  <label for="txtNombre">Nombre:</label>
                  <input type="text" class="form-control" name="txtNombre" value="<?php echo $tipoproducto->nombre?>">
              </div>
              
            </div>
            
        </div>
        <!-- /.container-fluid -->
        </form>
      </div>
      <!-- End of Main Content -->
      
      <?php include_once("footer.php")?>
        
