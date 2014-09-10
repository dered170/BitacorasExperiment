<?php

/*
 * @Sistema de Bitácoras electrónicas. "Usuario.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */

class Mensaje {

    var $tipo;
    var $msj;
    var $datos;
    var $pag;
    private $data;

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

}
