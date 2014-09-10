<?php

/*
 * @Sistema de Bitácoras electrónicas. "Roles.php"
 * @versión: 1.0  @modificado: 6 de Agosto del 2014
 * @autor: Luis Pastén
 */

class Roles {

    public static function get_roles($id_rol) {
        switch ($id_rol){
            case 0:
                return 'user';
                break;
            case 1:
                return 'admin';
                break;
        }
    }

}
