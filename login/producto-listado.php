<?php

include_once "config.php";
include_once "entidades/producto.php";

$producto= new Producto();
$array_producto = $producto->obtenerTodos();

//print_r($array_tipo_producto);

 include_once("header.php");
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Listado de productos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="producto-formulario.php" class="btn btn-primary">Nuevo</a>
              </div>
         </div>

         <table class="table table-hover border">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($array_producto as $item){?>
            <tr>
            <td class="w-25"><img src="archivos/<?php echo $item->imagen?>" class="w-50 img-thumbnail"></td>
                    <td><?php echo $item->nombre;?></td>
                    <td><?php echo $item->cantidad;?></td>
                    <td><?php echo number_format($item->precio, 2, ",", ".");?></td>
                   <td><a href="producto-formulario.php?id=<?php echo $item->idproducto;?>"><i class="fas fa-search"></i></a></td>
            </tr>
            <?php }?>
         </table>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <?php include_once("footer.php")?>
        