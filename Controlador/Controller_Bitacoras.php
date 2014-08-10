<?php

/*
 * @Sistema de Bitácoras electrónicas. "Controller_Bitacoras.php"
 * @versión: 1.0  @modificado: 5 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Controlador/Control_Bitacoras.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Beans/Usuario.php';

switch ($_POST['case']) {
    case 1:
        login();

        break;

    default:
        break;
}

function login() {
    $Control = new Control_Bitacoras();
    $Datos = new Usuario();
    $Datos->usuario = htmlentities(trim($_POST['usuario']));
    $Datos->contrasena = htmlentities(trim($_POST['contrasena']));
    $resp = $Control->controlLogin($Datos);
    $mensaje = Array('tipo' => $resp->tipo, 'mensaje' => $resp->msj);
    echo json_encode($mensaje);
}
