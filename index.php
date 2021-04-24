<?php
require_once('enlaces.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TP1 Integracion tecnologica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="">

    <?php 

        /**
         * El sistema verifica la existencia de una sesion 
         * de usuario
         */
    
         
        if( !empty($_SESSION['sessionUsuario']) )
        {
            require_once('paginas/nav.php');

            if(!empty($_GET['pagina']))
            {
                $pagina = htmlentities(addslashes($_GET['pagina']));
                require_once( cargarPagina($pagina) );
            }
            else
            {
                require_once('paginas/listaDeEncuestas.php');
            }
        }
        else
        {
            /**
             * El sistema muestra la posibilidad de ingresar 
             * con usuario y contraseña
             * EL sistema muestra la posibilidad 
             * de crear una cuenta
             */
            if(!empty($_GET['pagina']))
            {
                if($_GET['pagina'] == 'crearMiCuenta')
                {
                    require_once('views/formularioCrearCuenta.php');
                }
                else
                {
                    require_once('views/formularioLogin.php');
                }
            }
            else
            {
                require_once('views/formularioLogin.php');
            }
        }
        

    ?>

</body>
</html>