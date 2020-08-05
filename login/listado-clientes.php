<?php

include_once "config.php";
include_once "entidades/cliente.php";

$cliente= new Cliente();
$array_clientes = $cliente->obtenerTodos();

//print_r($array_tipo_producto);

 include_once("header.php");
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Listado de clientes</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="nuevo-cliente.php" class="btn btn-primary">Nuevo</a>
              </div>
         </div>

         <table class="table table-hover border">
            <tr>
                <th>Cuit</th>
                <th>Nombre</th>
                <th>Fecha nac</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($array_clientes as $item){?>
            <tr>
                    <td><?php echo $item->cuit;?></td>
                    <td><?php echo $item->nombre;?></td>
                    <td><?php echo date_format(date_create($item->fecha_nac),"d/m/Y H:i");?></td>
                    <td><?php echo $item->telefono;?></td>
                    <td><?php echo $item->correo;?></td>
                   <td><a href="nuevo-cliente.php?id=<?php echo $item->idcliente;?>"><i class="fas fa-search"></i></a></td>
            </tr>
            <?php }?>
         </table>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <?php include_once("footer.php")?>
        