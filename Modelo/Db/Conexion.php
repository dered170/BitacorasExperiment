<?php

/*
 * @Sistema de Bitácoras electrónicas. "Conexion.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Db/Config.php';

class Conexion {

    private $_host;
    private $_user;
    private $_pass;
    private $_db;
    private $_dns;
    private $_dbcon;

    public function __construct() {
        $this->_host = trim(CON_HOST);
        $this->_user = trim(CON_USER);
        $this->_pass = trim(CON_PASS);
        $this->_db = trim(CON_DB);
        $this->_dns = 'mysql:host=' . $this->_host . ';dbname=' . $this->_db . '';
        $this->set_db_con();
    }

    public function get_db_con() {
        return $this->_dbcon;
    }

    public function set_db_con() {
        try {
            $con = new PDO($this->_dns, $this->_user, $this->_pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->_dbcon = $con;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }

    public function query($_sql,$_datos = null) {
        try {
            $_conx = $this->_dbcon;
            $_conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $_stmt = $_conx->prepare($_sql);
            $_stmt->execute($_datos);
            return $_stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}
