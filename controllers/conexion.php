<?php
if(!class_exists("Conexion"))
{
    class Conexion{
        public static function getConexion()
        {
            $usuario = "root";
            $contraseña = "";
            try {
                return $obejtoConexion = new PDO('mysql:host=localhost;dbname=proyecto-uno', $usuario, $contraseña);
            } catch (PDOException $e) {
                //header("Location:index.php?pagina=error404");
                //die();
            }
        }
    }
}