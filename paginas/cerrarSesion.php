<?php
/**
 * El sistema procede a cerrar la sesion del usuario
 */
session_destroy();
header("Location:index.php?pagina=ingresarAMiCuenta");
die();