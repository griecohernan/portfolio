<?php

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/producto.php";
include_once "entidades/cliente.php";

$venta= new Venta();
$array_ventas = $venta->obtenerTodos();
$array_ventas = $venta->cargarGrilla();


//print_r($array_tipo_producto);

 include_once("header.php");
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Listado de ventas</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="venta-formulario.php" class="btn btn-primary">Nuevo</a>
              </div>
         </div>

         <table class="table table-hover border">
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($array_ventas as $item){?>
            <tr>
                    
              <td><?php echo date_format(date_create($item->fecha),"d/m/Y H:i"); ?></td>
                    <td><?php echo $item->cantidad;?></td>
                    <td><?php echo $item->nombre_producto;?></td>
                    <td><?php echo $item->nombre_cliente;?></td>
                    <td><?php echo $item->total;?></td>
                   <td><a href="venta-formulario.php?id=<?php echo $item->idventa;?>"><i class="fas fa-search"></i></a></td>
            </tr>
            <?php }?>
         </table>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <?php include_once("footer.php")?>
        