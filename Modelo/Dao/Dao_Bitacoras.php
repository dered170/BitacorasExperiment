<?php

/*
 * @Sistema de Bitácoras electrónicas. "Dao_Bitacoras.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/SQL/SqlBitacoras.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Db/Conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Beans/Mensaje.php';

class Dao_Bitacoras {

    private $con;

    function __construct() {
        $this->con = new Conexion();
    }

    public function daoLogin($datos) {
        $msg = new Mensaje();
        $statement = SqlBitacoras::sql_login();
        $datos = Array(
            ':usuario' => $datos->usuario,
            ':contrasena' => $datos->contrasena);
        $_stmt = $this->con->query($statement, $datos);
        if ($_stmt->fetch(PDO::FETCH_NUM) == 0) {
            $msg->msj = "<strong>Advertencia:</strong> Nombre de usuario o contraseña es invalido.";
            $msg->tipo = "Error";
            return $msg;
        }
        $msg->msj = "<strong>Exito:</strong> Ingresando...";
        $msg->tipo = "Exito";
        return $msg;
    }

}

//$inst = new Dao_Bitacoras();
//$inst->consulta();
//echo $inst->consulta();
