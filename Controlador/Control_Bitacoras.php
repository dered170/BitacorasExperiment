<?php

/*
 * @Sistema de Bitácoras electrónicas. "Controller_Bitacoras.php"
 * @versión: 1.0  @modificado: 9 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Bo/Bo_Bitacoras.php';

class Control_Bitacoras {

    private $bo;

    function __construct() {
        $this->bo = new Bo_Bitacoras();
    }

    public function controlLogin($datos) {
        return $this->bo->boLogin($datos);
    }

}
