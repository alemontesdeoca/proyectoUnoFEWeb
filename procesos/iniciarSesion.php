<?php 
require_once('../enlaces.php');


/**
 * Este archivo:
 * Procesa la valides de los datos ingresados por el 
 * usurio.
 * Verifica la existencia de los datos del usuario en la bbdd
 * Permite el inicio de sesion de los usuarios
 * 
 * Recibe:
 * alias de usuario
 * password de usuario
 */

/**
 * El sistema verifica la existencia de una sesion
 */
if( !empty($_SESSION['sessionUsuario']) )
{
    /**
     * el sistema redirige al usuario a una pagina de error
     */
    header("Location:../index.php?pagina=error404");
    die();
}

/**
 * El sistema verifica la llegada de los datos
 */
if(empty($_POST['usuario']) || empty($_POST['pass_word']) )
{
    /**
     * El sistema redirige al usuario al formualrio de login
     * y mujestra un error
     */
    header('Location:../index.php?pagina=formularioLogin&operacion=faltanDatos');
    die();
}


/**
 * El sistema procesa la valides de la informacion
 * ingresada por el usuario contrastandola con la bbdd
 * El sistema procede a crear la sesion del usuario
 */
$usuarioController = new UsuarioController();


if($usuarioController->validarDatosUsuarios( htmlentities(addslashes($_POST['usuario'])),htmlentities(addslashes($_POST['pass_word']))) != false)
{   
    $esteUsuario = $usuarioController->validarDatosUsuarios(htmlentities(addslashes($_POST['usuario'])),htmlentities(addslashes($_POST['pass_word']))
    );
    /**
     * El sistema crea la sesion y almacena la informacion del usario 
     * en una variable para su mejor manejo
     */
    if ( password_verify( htmlentities(addslashes($_POST['pass_word'])) ,  $esteUsuario->getPassword()) ) 
    {
        //serializamos el usuario

        $usuarioSerializado = serialize($esteUsuario);
        $_SESSION['sessionUsuario'] = $usuarioSerializado;

        header("Location:../index.php");
        die();
    }

}


/**
 * El sistema redirige al suuario a la pagina de login
 */
header("Location:../index.php?pagina=formularioLogin&operacion=datosIncorrectos");
die();





