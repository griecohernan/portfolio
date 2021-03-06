<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/domicilio.php";
include_once "entidades/provincia.php";
include_once "entidades/localidad.php";



$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);



if ($_POST) { 

  if (isset($_POST["btnGuardar"])){
    if (isset($_GET["id"]) && $_GET["id"] > 0) {
      $cliente->actualizar();
    } else {
      $cliente->insertar();
  }
  if(isset($_POST["txtTipo"])){
    $domicilio = new Domicilio();
    $domicilio->eliminarPorCliente($cliente->idcliente);
    for($i=0; $i< count($_POST["txtTipo"]); $i++){
        $domicilio->fk_idcliente = $cliente->idcliente; 
        $domicilio->fk_tipo = $_POST["txtTipo"][$i];
        $domicilio->fk_idlocalidad =  $_POST["txtLocalidad"][$i];
        $domicilio->domicilio = $_POST["txtDomicilio"][$i];
        $domicilio->insertar();
    }
  }
} else if (isset($_POST["btnBorrar"])){
    $domicilio = new Domicilio();
    $domicilio->eliminarPorCliente($cliente->idcliente);
    $cliente->eliminar();
  }
} 



if(isset($_GET["do"]) && $_GET["do"] == "buscarLocalidad" && $_GET["id"] && $_GET["id"] > 0){
  $idProvincia = $_GET["id"];
  $localidad = new Localidad();
  $aLocalidad = $localidad->obtenerPorProvincia($idProvincia);
  echo json_encode($aLocalidad);
  exit;
} else if(isset($_GET["id"]) && $_GET["id"] > 0){
  $cliente->obtenerPorId();
}


if(isset($_GET["do"]) && $_GET["do"] == "cargarGrilla"){
  $idCliente = $_GET['idCliente'];
  $request = $_REQUEST;

  $entidad = new Domicilio();
  $aDomicilio = $entidad->obtenerFiltrado($idCliente);

  $data = array();

  if (count($aDomicilio) > 0)
      $cont=0;
      for ($i=0; $i < count($aDomicilio); $i++) {
          $row = array();
          $row[] = $aDomicilio[$i]->tipo;
          $row[] = $aDomicilio[$i]->provincia;
          $row[] = $aDomicilio[$i]->localidad;
          $row[] = $aDomicilio[$i]->domicilio;
          $cont++;
          $data[] = $row;
      }

  $json_data = array(
      "draw" => isset($request['draw'])?intval($request['draw']):0,
      "recordsTotal" => count($aDomicilio), //cantidad total de registros sin paginar
      "recordsFiltered" => count($aDomicilio),//cantidad total de registros en la paginacion
      "data" => $data
  );
  echo json_encode($json_data);
  exit;
}


$tipoProvincia = new Provincia();
$array_provincia=$tipoProvincia -> obtenerTodos();




//$tipoProducto = new Tipoproducto();
//$aTipoProductos = $tipoProducto->obtenerTodos();




//print_r($producto);

 include_once("header.php");
?>
  <form action="" method="POST">
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nuevo Cliente</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
                <div class="col-12 mb-sm-5">
                <a href="listado-clientes.php" class="btn btn-primary">Listado</a>
                <a href="nuevo-cliente.php" class="btn btn-primary">Nuevo</a>
                <button type="submit" class="btn btn-success btnGuardar" name="btnGuardar">Guardar</button>
                <button type="submit" class="btn btn-danger btnBorrar" name ="btnBorrar">Borrar</button>
              </div>
         </div>

          <!-- Content Row -->

          <div class="row">
              <div class="col-6 form-group">
                  <label for="txtNombre">Nombre:</label>
                  <input type="text" class="form-control" name="txtNombre" value="<?php echo $cliente->nombre?>">
              </div>
              <div class="col-6 form-group">
                    <label for="txtNombre">Cuit:</label>
                    <input type="text" class="form-control" name="txtCuit" value="<?php echo $cliente->cuit?>">
              </div>
            </div>
            
            <div class="row">
              <div class="col-6 form-group">
                  <label for="">Fecha de nacimiento:</label>
                  <input type="date" class="form-control" name="txtFechaNac" id="txtFechaNac" value="<?php echo $cliente->fecha_nac?>">
              </div>
              <div class="col-6 form-group">
                  <label for="">Teléfono:</label>
                  <input type="number" class="form-control" name="txtTelefono" value="<?php echo $cliente->telefono?>">
              </div>
              <div class="col-6 form-group">
                  <label for="">Correo:</label>
                  <input type="text" class="form-control" name="txtCorreo" value="<?php echo $cliente->correo?>">
              </div>
            
          
            </div>
            

                  <div class="row">
              <div class="col-12">  
              <div class="card mb-3">
                      <div class="card-header">
                          <i class="fa fa-table"></i> Domicilios
                          <div class="pull-right">
                              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDomicilio">Agregar</button>
                              <div class="modal fade" id="modalDomicilio" tabindex="-1" role="dialog" aria-labelledby="modalDomicilio" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Domicilio</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                            <label for="">Tipo de domicilio:</label>
                                            <select name="lstTipo" id="lstTipo" class="form-control">
                                            <option value="" disabled selected>Seleccionar</option>
                                            <option value="1">Personal</option>
                                            <option value="2">Laboral</option>
                                            <option value="3">Comercial</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                            <label for="">Provincia:</label>
                                            <select name="lstProvincia" id="lstProvincia" onchange="fBuscarLocalidad();" class="form-control">
                                            <option value="" disabled selected>Seleccionar</option>
                                            <?php foreach ($array_provincia as $prov) {
                                                                echo "<option value=" . $prov->idprovincia . "> $prov->nombre </option>";
                                                        }?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                            <label for="">Localidad:</label>
                                            <select name="lstLocalidad" id="lstLocalidad" class="form-control">
                                            <option value="" disabled selected>Seleccionar</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                            <label for="">Dirección:</label>
                                           <input type="text" id="txtDireccion" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary"  onclick="fAgregarDomicilio()">Agregar</button>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
 
                      <div class="panel-body">
                          <table id="grilla" class="display" style="width:98%">
                              <thead>
                                  <tr>
                                      <th>Tipo</th>
                                      <th>Provincia</th>
                                      <th>Localidad</th>
                                      <th>Dirección</th>
                                  </tr>
                              </thead>
                          </table> 
                      </div>
                  </div>          
              </div>
          </div>

         


          


    </div>

        
        <!-- /.container-fluid -->
  </form>
 </div>
      <!-- End of Main Content -->

      <script>
      window.onload = function () {
        var idCliente = '<?php echo isset($cliente) && $cliente->idcliente > 0? $cliente->idcliente : 0 ?>';

        var dataTable = $('#grilla').DataTable({
        "processing": true,
        "serverSide": false,
        "bFilter": false,
        "bInfo": true,
        "bSearchable": false,
        "paging": false,
        "pageLength": 25,
        "order": [[ 0, "asc" ]],
        "ajax": "nuevo-cliente.php?do=cargarGrilla&idCliente=" + idCliente
    });

      }

      function fBuscarLocalidad(){
            idProvincia = $("#lstProvincia option:selected").val();
            $.ajax({
                type: "GET",
                url: "nuevo-cliente.php?do=buscarLocalidad",
                data: { id:idProvincia },
                async: true,
                dataType: "json",
                success: function (respuesta) {
                    $("#lstLocalidad option").remove();
                    $("<option>", {
                        value: 0,
                        text: "Seleccionar",
                        disabled: true,
                        selected: true
                    }).appendTo("#lstLocalidad");
                
                    for (i = 0; i < respuesta.length; i++) {
                        $("<option>", {
                            value: respuesta[i]["idlocalidad"],
                            text: respuesta[i]["nombre"]
                            }).appendTo("#lstLocalidad");
                        }
                    $("#lstLocalidad").prop("selectedIndex", "0");
                }
            });
        }


        function fAgregarDomicilio(){
            var grilla = $('#grilla').DataTable();
            grilla.row.add([
                $("#lstTipo option:selected").text() + "<input type='hidden' name='txtTipo[]' value='"+ $("#lstTipo option:selected").val() +"'>",
                $("#lstProvincia option:selected").text() + "<input type='hidden' name='txtProvincia[]' value='"+ $("#lstProvincia option:selected").val() +"'>",
                $("#lstLocalidad option:selected").text() + "<input type='hidden' name='txtLocalidad[]' value='"+ $("#lstLocalidad option:selected").val() +"'>",
                $("#txtDireccion").val() + "<input type='hidden' name='txtDomicilio[]' value='"+$("#txtDireccion").val()+"'>"
            ]).draw();
            $('#modalDomicilio').modal('toggle');
            limpiarFormulario();
        }
        
        function limpiarFormulario(){
            $("#lstTipo").val("");
            $("#lstProvincia").val("");
            $("#lstLocalidad").val("");
            $("#txtDireccion").val("");
        }


        </script>


      
      <?php include_once("footer.php")?>
        
