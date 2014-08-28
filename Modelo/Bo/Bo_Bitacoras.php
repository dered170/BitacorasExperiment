<?php
/*
 * @Sistema de Bitácoras electrónicas. "Bo_Bitacoras.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Dao/Dao_Bitacoras.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Beans/Mensaje.php';

class Bo_Bitacoras {

    private $dao;

    public function __construct() {
        $this->dao = new Dao_Bitacoras();
    }

    public function boLogin($datos) {
        $msg = new Mensaje();
        $usr = $this->sanearVariables('vacio', $datos->usuario);
        $pass = $this->sanearVariables('vacio', $datos->contrasena);
        if ($usr and $pass) {
            $datos->usuario = $this->sanearVariables('san_string', $datos->usuario);
//            md5 codificar cuando se encuentre el registro de usuarios
            $datos->contrasena = $datos->contrasena;
            return $this->dao->daoLogin($datos);
            
        } else {
            $msg->tipo = "Vacio";
            $msg->msj = "<strong>Error:</strong> Existen campos vacios ";
            return $msg;
        }
    }

//Función encargada de validar y sanear variables
    private function sanearVariables($filtro, $var) {
        switch ($filtro) {
            case 'vacio':
                return (!empty($var)) ? true : false;
                break;
            case 'san_string':
                return filter_var($var, FILTER_SANITIZE_STRING);
                break;

            default:

              break;
        }
    }

}
