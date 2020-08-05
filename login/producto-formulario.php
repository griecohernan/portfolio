<?php

include_once "config.php";
include_once "entidades/tipo_productos.php";
include_once "entidades/producto.php";


$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

$tipoProducto = new Tipoproducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

if ($_POST) { 
  if (isset($_POST["btnGuardar"])){
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $productoAux = new Producto();
    $productoAux->idproducto = $_GET["id"];
    $productoAux->obtenerPorId();
    $imagenAnterior = $productoAux ->imagen;
      
    if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["txtImagen"]["tmp_name"];
        $nombreArchivo = $_FILES["txtImagen"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nombreImagen = $nombreAleatorio . "." . $extension;
        move_uploaded_file($archivo_tmp, "archivos/$nombreImagen");
      }
        if ($imagenAnterior != ""){
        unlink("archivos/$imagenAnterior");
      }
    
      $producto->imagen=$nombreImagen;
      $producto->actualizar();

    } else {
      if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["txtImagen"]["tmp_name"];
        $nombreArchivo = $_FILES["txtImagen"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nombreImagen = $nombreAleatorio . "." . $extension;
        move_uploaded_file($archivo_tmp, "archivos/$nombreImagen");
      }
     
      $producto->imagen=$nombreImagen;
      $producto->insertar();
  }
} else if (isset($_POST["btnBorrar"])){
    $producto->eliminar();
    header("location:producto-listado.php");
  }

 
} 



if (isset($_GET["id"]) && $_GET["id"] > 0) {
  $producto->obtenerPorId();
}




//print_r($producto);

 include_once("header.php");
?>
  <form action="" method="POST" enctype="multipart/form-data">
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Productos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="producto-listado.php" class="btn btn-primary">Listado</a>
                <a href="" class="btn btn-primary">Nuevo</a>
                <button type="submit" class="btn btn-success btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger btnBorrar" name ="btnBorrar">Borrar</button>
              </div>
         </div>

          <!-- Content Row -->

          <div class="row">
              <div class="col-6 form-group">
                  <label for="txtNombre">Nombre:</label>
                  <input type="text" class="form-control" name="txtNombre" value="<?php echo $producto->nombre?>">
              </div>
              <div class="col-6 form-group">
                    <label for="txtNombre">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto" class="form-control">
                        <option value="0" disabled selected>Tipo de producto</option>
                            <?php foreach ($aTipoProductos as $item) {
                                if ($producto->fk_idtipoproducto == $item->idtipoproducto) {
                                    echo "<option selected value=" . $item->idtipoproducto . "> $item->nombre </option>";
                                } else {
                                    echo "<option value=" . $item->idtipoproducto . "> $item->nombre </option>";
                                }
                        }
                        ?>
                    </select>
              </div>
          </div>
            
          <div class="row">
                <div class="col-6 form-group">
                    <label for="">Cantidad:</label>
                    <input type="text"  class="form-control" name="txtCantidad" value="<?php echo $producto->cantidad?>">
                </div>
                <div class="col-6 form-group">
                    <label for="">Precio:</label>
                    <input type="text"  class="form-control" name="txtPrecio" value="<?php echo $producto->precio?>">
                </div>
          </div>

            <div class="row">
                  <div class="col-6 form-group ">
                  <label for="" >Imagen:</label>
                  <input type="file" class="form-control" name="txtImagen"  value="<?php echo $producto->imagen?>">
                  </div>
            

            <div class="col-12 form-group mt-sm-4">
                    <label for="">Descripción:</label>
                    <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion?></textarea> 
            </div>

            </div>
        </div>
        <!-- /.container-fluid -->
        </form>
      </div>
      <!-- End of Main Content -->
      <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
      <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
      
      <?php include_once("footer.php")?>
        
