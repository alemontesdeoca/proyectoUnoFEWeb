<?php
/**
 * El sistema verifica si existe una sesion creada
 * EL sistema alamacena al obejto usuario en una variable 
 * para el mejor manejo de su informacion
 */
$idUsuario = null;
if( !empty($_SESSION['sessionUsuario']) )
{
    $miUsuario = unserialize($_SESSION['sessionUsuario']);
    $idUsuario = $miUsuario->getIdUsuario();
}

require_once('views/menuDinamico.php');