<?php 
/**
 * Este archivo crea la cabecera de la encuesta que se va a completar
 * recibe el id del usuario que va a completar la encuesta
 * recibe el id del producto que se va a encuestar
 */
require_once('../enlaces.php');
if( empty($_SESSION['sessionUsuario']) )
{
    /**
     * el sistema redirige al usuario al formulario de login
     */
    header("Location:../index.php?pagina=ingresarAMiCuenta");
    die();
}

/**
 * El sistema verifica la llegada de todos los datos 
 * esperados
 */
if(empty($_POST['idUsuario'])  || empty($_POST['idProducto'])  )
{
    /**
     * EL sistema redirige al usuario a una pagina de error 
     */
    header("Location:../index.php?pagina=error404");
    die();
}
$idUsuario = htmlentities(addslashes($_POST['idUsuario']));
$idProducto = htmlentities(addslashes($_POST['idProducto']));


/**
 * El sistema crea la cabecera de la encuesta
 */
$encuestaControlelr = new EncuestaController();

if($encuestaControlelr->crearCabeceraEncuesta($idUsuario,$idProducto) != false )
{
    /**
     * El sistema redirige al usuario a la pagina donde va a responder la encuesta
     */
    header("Location:../index.php?pagina=responderEncuesta&operacion=exito");
    die();

}
/**
 * El sistema redirige al usuario a una pagina de error
 */
header('Location:../index.php?pagina=error404');
die();