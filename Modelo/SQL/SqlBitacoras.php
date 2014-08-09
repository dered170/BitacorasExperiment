<?php

/*
 * @Sistema de Bitácoras electrónicas. "Config.php"
 * @versión: 1.0  @modificado: 7 de Agosto del 2014
 * @autor: Luis Pastén
 */

class SqlBitacoras {

// Tablas
    private static $tabla_usuarios = 'bita_usuarios';
// Campos
    private static $id_usuario = 'id_usuario';
    private static $usuario = 'usuario';
    private static $contrasena = 'contrasena';
    private static $idrol_usuario = 'idrol_usuario';
    private static $creado = 'creado';
    private static $actualizado = 'actualizado';
    private static $idinfo_usuario = 'idinfo_usuario';
    private static $status = 'status';

//    public static function login(){
//    }

    public static function consulta_usuarios() {
        $query = 'SELECT * FROM ' . self::$tabla_usuarios . '';
        return $query;
    }

}
