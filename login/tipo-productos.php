<?php

include_once "config.php";
include_once "entidades/tipo_productos.php";


$tipoproducto= new TipoProducto();
$array_tipo_producto = $tipoproducto->obtenerTodos();

//print_r($array_tipo_producto);

 include_once("header.php");
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Listado de tipo de productos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="tipoproducto-formulario.php" class="btn btn-primary">Nuevo</a>
              </div>
         </div>

         <table class="table table-hover border">
            <tr>
                
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($array_tipo_producto as $item){?>
            <tr>
                      <td><?php echo $item->nombre;?></td>
                   <td><a href="tipoproducto-formulario.php?id=<?php echo $item->idtipoproducto;?>"><i class="fas fa-search"></i></a></td>
            </tr>
            <?php }?>
         </table>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <?php include_once("footer.php")?>
        