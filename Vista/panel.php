<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/BitacorasExperiment/Modelo/Bo/Sessiones.php';
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
Sessiones::construir_session();
echo Sessiones::get_var('usuario');
echo Sessiones::get_var('rol');

?>
<div class="wrapper">

<!-- comentando para -->
<input type="text">
LE SUBI UN CAMBIO 
le subi otro cambio!!! XD
</div>
	