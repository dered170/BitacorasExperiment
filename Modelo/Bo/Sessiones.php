<?php

/*
 * @Sistema de Bitácoras electrónicas. "Sessiones.php"
 * @versión: 1.0  @modificado: 6 de Septiembre del 2014
 * @autor: Luis Pastén
 */

class Sessiones {

    public static function construir_session() {
        session_start();
    }

    public static function verificar_seteo($key) {
        if (isset($_SESSION[$key])) {
            return true;
        }
        return false;
    }

    public static function set_var($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get_var($key) {
        if (self::verificar_seteo($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete_var($key) {
        if (self::verificar_seteo($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function destruir_session() {
        session_destroy();
    }

}
