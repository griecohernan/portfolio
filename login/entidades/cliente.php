<?php

class Cliente {
    private $idcliente;
    private $cuit;
    private $nombre;
    private $telefono;
    private $correo;
    private $fecha_nac;

    public function __construct(){

    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request){
        $this->idcliente = isset($request["id"])? $request["id"] : "";
        $this->cuit = isset($request["txtCuit"])? $request["txtCuit"]: "";
        $this->nombre = isset($request["txtNombre"])? $request["txtNombre"] : "";
        $this->telefono = isset($request["txtTelefono"])? $request["txtTelefono"]: "";
        $this->correo = isset($request["txtCorreo"])? $request["txtCorreo"] : "";
        $this->fecha_nac = isset($request["txtFechaNac"])? $request["txtFechaNac"] :"";
    }

    public function insertar(){
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        //Arma la query
        $sql = "INSERT INTO clientes (
                    idcliente,
                    cuit, 
                    nombre, 
                    telefono, 
                    correo, 
                    fecha_nac
                ) VALUES (
                    '" . $this->idcliente ."', 
                    '" . $this->cuit ."', 
                    '" . $this->nombre ."', 
                    '" . $this->telefono ."', 
                    '" . $this->correo ."', 
                    '" . $this->fecha_nac ."'
                );";
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idcliente = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "UPDATE clientes SET
                nombre = '".$this->nombre."',
                cuit = '".$this->cuit."',
                telefono = '".$this->telefono."',
                correo = '".$this->correo."',
                fecha_nac =  '".$this->fecha_nac."'
                WHERE idcliente = " . $this->idcliente;
          
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "DELETE FROM clientes WHERE idcliente = " . $this->idcliente;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT idcliente, 
                        cuit, 
                        nombre, 
                        telefono, 
                        correo, 
                        fecha_nac 
                FROM clientes 
                WHERE idcliente = " . $this->idcliente;
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if($fila = $resultado->fetch_assoc()){
            $this->idcliente = $fila["idcliente"];
            $this->cuit = $fila["cuit"];
            $this->nombre = $fila["nombre"];
            $this->telefono = $fila["telefono"];
            $this->correo = $fila["correo"];
            $this->fecha_nac = $fila["fecha_nac"];
        }  
        $mysqli->close();

    }

    public function obtenerTodos() {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT idcliente,
                    cuit,
                    nombre,
                    telefono,
                    correo,
                    fecha_nac
            FROM clientes";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if ($resultado) {
            //Convierte el resultado en un array asociativo
            while ($fila = $resultado->fetch_assoc()) {
                $entidadAux = new Cliente();
                $entidadAux->idcliente = $fila["idcliente"];
                $entidadAux->cuit = $fila["cuit"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->telefono = $fila["telefono"];
                $entidadAux->correo = $fila["correo"];
                $entidadAux->fecha_nac = $fila["fecha_nac"];
                $aResultado[] = $entidadAux;
            }
        }
        $mysqli->close();
        return $aResultado;
    }


}


?>