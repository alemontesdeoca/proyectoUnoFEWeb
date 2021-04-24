<?php 
if(file_exists('../enlaces.php'))
{
    require_once('../enlaces.php');
}
else
{
    header("Location:../index.php?pagina=error404");
    die();
}

/**
 * Este archivo:
 * Procesa la valides de los datos ingresados por el nuevo
 * usurio.
 * Verifica la existencia de los datos ingresados en la bbdd
 * Permite la creaciond e una cuenta.
 * Una persona no puede tener mas de una cuenta
 * Todas las cuentas creadas estan incativas hasta que 
 * sean habilitdas por el adminsitrador del sistema
 * 
 * Recibe:
 * alias de usuario
 * password , passwor2
 * nombre 
 * apellido
 */

/**
 * El sistema verifica la existencia de una sesion
 */
if( !empty($_SESSION['sessionUsuario']) )
{
    /**
     * el sistema redirige al panel del usuario a una pagina de error
     */
    header("Location:../index.php?pagina=error404");
    die();
}

/**
 * El sistema verifica la llegada de los datos
 */
if(empty($_POST['usuario']) || empty($_POST['pass_word']) 
|| empty($_POST['pass_word2']) || empty($_POST['nombre']) || empty($_POST['apellido']) 
|| empty($_POST['telefono']) || empty($_POST['direccion'])
)
{
    /**
     * EL sistema redigige a l usuario al formualrio de creacion de cuentas 
     * y muetra un error
     */
    header('Location:../index.php?pagina=crearMiCuenta&operacion=faltanDatos');
    die();
}

/**
 * El sistema verifica que las contraseñas sean iguales
 * El sitema redirige al usuario al formuario de crecion de cuentas 
 * y muetra un error
 */
if( strtolower($_POST['pass_word'])  !== strtolower($_POST['pass_word2']) )
{
    header('Location:../index.php?pagina=crearMiCuenta&operacion=password');
    die();
}



/**
 * El sistema verifica que el usuario no exista en la bbdd
 * Usuario controller metodo 2
 */

$usuarioController = new UsuarioController();
if($usuarioController->existeUsuario( htmlentities(addslashes($_POST['usuario']))  ) != false)
{
    /**
     * El sistema redirige al usuario a la pagina de creacion de cuentas
     * y muestra un error
     */
    header('Location:../index.php?pagina=crearMiCuenta&operacion=user');
    die();
}


/**
 * El sistema procede a crear la cuenta del usuario
 * UsuarioController metodo 3
 */


if($usuarioController->crearCuenta(
    htmlentities(addslashes($_POST['nombre'])),
    htmlentities(addslashes($_POST['apellido'])),
    htmlentities(addslashes($_POST['usuario'])),
    htmlentities(addslashes($_POST['pass_word'])),
    htmlentities(addslashes($_POST['direccion'])), 
    htmlentities(addslashes($_POST['telefono'])) 
    ) != false )
{
    /**
     * El sistema redirige al usuario a la pagina de login y muetra un mensaje de exito
     */
    header('Location:../index.php?pagina=formularioLogin&operacion=cuentaCreada');
    die();
}
/**
 * El sistema redirige al usuario a la pagina de creacion de cuentas y muetra un error
 */
header('Location:../index.php?pagina=formularioLogin&operacion=error');
die();




