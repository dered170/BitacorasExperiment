<?php

/*
 * @Sistema de Bitácoras electrónicas. "Dao_Bitacoras.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/SQL/SqlBitacoras.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Db/Conexion.php';

class Dao_Bitacoras {

    private $con;

    function __construct() {
        $this->con = new Conexion();
    }

    public function daoLogin($datos) {
        $statement = SqlBitacoras::sql_login();
        $datos = Array(
            ':usuario' => $datos->usuario,
            ':contrasena' => $datos->contrasena);
        $_stmt = $this->con->query($statement, $datos);
        if ($_stmt->fetch(PDO::FETCH_NUM) == 0) {
            return false;
        }
        return true;
    }

    public function verificaRol($usuario) {
        $statement = SqlBitacoras::sql_rol();
        $datos = Array(
            ':usuario' => $usuario);
        $_stmt = $this->con->query($statement, $datos);
        $result = $_stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
