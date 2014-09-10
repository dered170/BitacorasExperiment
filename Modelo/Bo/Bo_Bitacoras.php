<?php

/*
 * @Sistema de Bitácoras electrónicas. "Bo_Bitacoras.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Dao/Dao_Bitacoras.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Beans/Mensaje.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Bo/Sessiones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Bo/Roles.php';

class Bo_Bitacoras {

    private $dao;

    public function __construct() {
        $this->dao = new Dao_Bitacoras();
    }

    public function boLogin($datos) {
        $msg = new Mensaje();
        $usr = $this->sanearVariables('vacio', $datos->usuario);
        $pass = $this->sanearVariables('vacio', $datos->contrasena);
        if ($usr and $pass) { // SATINAR Y CAMPOS VACIOS
            $datos->usuario = $this->sanearVariables('san_string', $datos->usuario);
            //MD5  CONDIFICAR CUANDO SE ENCUENTRE EL REGISTRO DE USUARIOS
            if (!$this->dao->daoLogin($datos)) { // DATOS INCORRECTOS
                $msg->msj = '<strong>Advertencia:</strong> Nombre de usuario o contraseña es invalido.';
                $msg->tipo = 'Error';
                return $msg;
            } else { // USUARIO CORRECTO
                $inf_usr = $this->dao->verificaRol($datos->usuario); // VERIFICA EL ROL EN DB
                if ($this->statusUsuario($inf_usr['status'])) { // VERIFICA STATUS DE USUARIO
                    $msg->pag = 'desabilitado.php';
                    $msg->msj = '<strong>Exito:</strong> Ingresando...';
                    $msg->tipo = 'Exito';
                    return $msg;
                } else { //ASIGNA DIRECCION USR O ADMIN
                    Sessiones::construir_session();
                    $data = Array(
                        'usuario' => $inf_usr['usuario'],
                        'rol' => $inf_usr['idrol_usuario']);
                    Sessiones::set_var($data);
                    $usuario = Roles::get_roles($inf_usr['idrol_usuario']);
                    if ($usuario == 'admin') {
                        $msg->pag = 'panel.php';
                        $msg->msj = '<strong>Exito:</strong> Ingresando...';
                        $msg->tipo = 'Exito';
                        return $msg;
                    } else {
                        $msg->pag = 'usr.php';
                        $msg->msj = '<strong>Exito:</strong> Ingresando...';
                        $msg->tipo = 'Exito';
                        return $msg;
                    }
                }
            }
        } else {
            $msg->tipo = 'Vacio';
            $msg->msj = '<strong>Error:</strong> Existen campos vacios.';
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

// VERIFICA EL STATUS DEL USUARIO
    private function statusUsuario($status) {
        return ($status == 0) ? true : false;
    }

//
}
