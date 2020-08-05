<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/venta.php";
include_once "entidades/producto.php";



$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

if ($_POST) { 
  if (isset($_POST["btnGuardar"])){
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $venta->actualizar();
    } else {
      $venta->insertar();
  }
} else if (isset($_POST["btnBorrar"])){
    $venta->eliminar();
    header("location:listado-ventas.php");
  }
} 

if (isset($_GET["id"]) && $_GET["id"] > 0) {
  $venta->obtenerPorId();
}

$producto = new Producto();
$array_producto = $producto->obtenerTodos();

$cliente = new Cliente();
$array_cliente = $cliente->obtenerTodos();

if(isset($_GET["do"]) && $_GET["do"] == "buscarProducto" && $_GET["id"] && $_GET["id"] > 0){
  $idProducto = $_GET["id"];
  $producto = new Producto();
  $preciounitario = $producto->obtenerPrecio($idProducto);
  echo json_encode($preciounitario);
  exit;
} else if(isset($_GET["id"]) && $_GET["id"] > 0){
  $venta->obtenerPorId();
}



//print_r($producto);

 include_once("header.php");
?>
  <form action="" method="POST">
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nueva Venta</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="listado-ventas.php" class="btn btn-primary">Listado</a>
                <a href="venta-formulario.php" class="btn btn-primary">Nuevo</a>
                <button type="submit" class="btn btn-success btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger btnBorrar" name ="btnBorrar">Borrar</button>
              </div>
         </div>

          <!-- Content Row -->

          <div class="row">
              <div class="col-6 form-group">
                  <label for="txtFecha">Fecha:</label>
                  <input type="date" class="form-control" name="txtFecha" id="txtFecha" value="<?php echo date_format(date_create($venta->fecha), "Y-m-d"); ?>">
              </div>
              <div class="col-6 form-group">
                    <label for="txtFecha">Hora:</label>
                    <input type="time" class="form-control" name="txtHora" id="txtHora" value="<?php echo date_format(date_create($venta->fecha), "H:i"); ?>">
              </div>
            </div>
            
            <div class="row">
                <div class="col-6 form-group">
                <label for="lstcliente">Cliente:</label>
                   <select class="form-control" name="lstCliente" id="lstCliente">
                   <option value="0" disable selected>Cliente:</option>
                   <?php foreach ($array_cliente as $item) {
                        if ($venta->fk_idcliente == $item->idcliente) {
                            echo "<option selected value=" . $item->idcliente . "> $item->nombre </option>";
                        } else {
                            echo "<option value=" . $item->idcliente . "> $item->nombre </option>";
                        }
                    }?>
                    </select>
                </div>
                <div class="col-6 form-group">
                <label for="lstProducto">Producto:</label>
                <select class="form-control" name="lstProducto" id="lstProducto" onchange="fBuscarPrecio();">
                <option value="0" disable selected>Producto:</option>
                <?php foreach ($array_producto as $item) {
                        if ($venta->fk_idproducto == $item->idproducto) {
                            echo "<option selected value=" . $item->idproducto . "> $item->nombre </option>";
                        } else {
                            echo "<option value=" . $item->idproducto . "> $item->nombre </option>";
                        }
                    } ?>
                    </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                    <label for="">Precio unitario:</label>
                    <input type="text" class="form-control" id="txtPrecioUnitario" name="txtPrecioUnitario" value="<?php echo $venta->preciounitario?>">

                </div>
                
                <div class="col-6 form-group">
                    <label for="">Cantidad:</label>
                    <input type="text" class="form-control" id="txtCantidad" name="txtCantidad"  onchange="fCalcularTotal();" value="<?php echo $venta->cantidad?>">
                </div>
              </div>
              <div class="row">
                <div class="col-6 form-group">
                    <label for="">Total:</label>
                    <input type="text" class="form-control"  id="txtTotal" name="txtTotal" value="<?php echo $venta->total?>">
                </div>
              </div>
          
            
        </div>
        <!-- /.container-fluid -->
        </form>
      </div>
      <!-- End of Main Content -->
    <script>
    function fBuscarPrecio(){
    var idProducto = $("#lstProducto option:selected").val();
      $.ajax({
            type: "GET",
            url: "venta-formulario.php?do=buscarProducto",
            data: { id:idProducto },
            async: true,
            dataType: "json",
            success: function (respuesta) {
                $("#txtPrecioUnitario").val(respuesta);
            }
        });

}

    function fCalcularTotal(){
        var precio = $('#txtPrecioUnitario').val();
        var cantidad = $('#txtCantidad').val();
        var resultado = precio * cantidad;
        $("#txtTotal").val(resultado);
        
      }
  </script>
      
      <?php include_once("footer.php")?>
        
