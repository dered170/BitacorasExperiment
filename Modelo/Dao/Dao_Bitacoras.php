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

    public function consulta() {
        //$con = $this->con->get_db_con();
        $statement = SqlBitacoras::consulta_usuarios();
        //var_dump($statement);
        $_stmt = $this->con->query($statement);
        var_dump($_stmt);
    }

}

$inst = new Dao_Bitacoras();
$inst->consulta();
//echo $inst->consulta();
