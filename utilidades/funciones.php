<?php 
/**
 * Funcion que carga paginas de forma dinamica segun valores 
 * recibidos por $_GET
 * La funcion verfica que los valores recibidos por url coincidan con los 
 * posibles valores de cada pagina.
 * Si existe una sesion, la funcion carga una pagina por defecto.
 * Si no existe una sesion la funcion redirige al usuario al 
 * formualrio de login.
 * Si los valores recibidos son manipulados de forma manual, 
 * el sistema redirige al usuario ana pagina de error
 */
if(!function_exists('cargarPagina'))
{
    function cargarPagina($pagina)
    {
        if($pagina === 'error404')
        {
            return 'views/error404.php';
        }
        else if($pagina === 'crearMiCuenta')
        {
            return 'views/formularioCrearCuenta.php';
        }
        else if($pagina === 'ingresarAMiCuenta')
        {
            return 'views/formularioLogin.php';
        }
        else if($pagina === 'cerrarSesion')
        {
            return 'paginas/cerrarSesion.php';
        }
        else if($pagina === 'listaDeEncuestas')
        {
            return 'paginas/listaDeEncuestas.php';
        }
        if($pagina === 'reporte')
        {
            return 'paginas/reporte.php';
        }
        if($pagina === 'responderEncuesta')
        {
            return 'paginas/responderEncuesta.php';
        }
        
    }
}

/**
 * Funcion para mostrar los estados del sistema  a travez de alerts
 * Segun los valores de url recibidos, la funcion devuelve un alert determinado
 * 
 */
if(!function_exists('mostrarAlerts'))
{
    function mostrarAlerts($operacion)
    {
        if($operacion == 'error')
        {
            return '<p class="text-center alert-danger p-3">No se prudo completar la operacion.<br>Se produjo un error</p>';
        }
        if($operacion == 'exito')
        {
            return '<p class="text-center alert-success p-3">La operacion se completo exitosamente.</p>';
        }
        if($operacion == 'faltanDatos')
        {
            return '<p class="text-center alert-danger p-3">Todos los datos son obligatorios.</p>';
        }
        if($operacion == 'password')
        {
            return '<p class="text-center alert-danger p-3">Las contrseñas no coinciden.</p>';
        }
        if($operacion == 'user')
        {
            return '<p class="text-center alert-danger p-3">No podes usar usuario elejido.</p>';
        }
        if($operacion == 'cuentaCreada')
        {
            return '<p class="text-center alert-success p-3">Ya podes usar tu nueva cuenta.</p>';
        }
        if($operacion == 'datosIncorrectos')
        {
            return '<p class="text-center alert-danger p-3">Los datos son incorrectos.</p>';
        }
    }
}
