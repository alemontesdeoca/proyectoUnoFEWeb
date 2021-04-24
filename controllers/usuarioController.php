<?php 
if(!class_exists('UsuarioController'))
{
    class UsuarioController 
    {
        //methods

        //return the conexionObject
        public function getConexion()
        {   
            return Conexion::getConexion();
        }


        /**
         * Metodo que valida la existencia del usuario y la 
         * contraseña en la bbdd.
         * El sistema verifica que el usuario y la contraseña se correspondad
         * Devuelve un objeto de tipo usuario
         * Recibe por parametros un alias y una contraseña
         */
        public function validarDatosUsuarios($usuario,$pass_word) //metodo 1
        {
            $instruccionSQL =  "select * from usuario 
                                where alias = ?  
                                and usuario_activo = ? ";
            $usuarioActivo = 1;
            $esteUsuario = null;

            try
            {
                $sentencia = $this->getConexion()->prepare($instruccionSQL);
                if($sentencia->execute(array($usuario,$usuarioActivo)))
                {
                    if($sentencia->rowCount() > 0)
                    {
                        
                        $respuesta = $sentencia->fetch();
                        $esteUsuario = new Usuario($respuesta);
                        return $esteUsuario;                        
                    }
                }
            }
            catch(Exception $e)
            {
                
            }
            return false;
        }

        /**
         * Metodo que verifica si el alias de un usuario 
         * ya esta registrado en la bbdd
         * Valores devueltos: boolean
         * Parametros : alias
         */
        public function existeUsuario($alias) //metodo 2
        {
            $instruccionSQL = "select * from usuario where alias = ? ";
            try 
            {
                $sentencia = $this->getConexion()->prepare($instruccionSQL);
                if($sentencia->execute(array($alias)))
                {
                    if($sentencia->rowCount() > 0)
                    {
                        return true;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }

        /**
         * Metodo que hace un insert de los datos del usuario en la bbdd
         * Carga datos de la persona y datos del usuario
         * Crear proceso almacenado para ejecutar dos insert en tablas relacionadas
         */
        public function crearCuenta($nombre,$apellido,$usuario,$pass_word,$direccion,$telefono) //metodo 3
        {
            $instruccionSQL =   "insert into usuario (alias,pass_word,nombre,apellido,usuario_activo,telefono,direccion)
                                values(?,?,?,?,?,?,?)";
            $usuarioActivo = 1;
            $passwordEncriptada = password_hash($pass_word, PASSWORD_DEFAULT);

            try 
            {
                $sentencia = $this->getConexion()->prepare($instruccionSQL);
                if($sentencia->execute(array($usuario,$passwordEncriptada,$nombre,$apellido,$usuarioActivo,$telefono,$direccion)))
                {
                    return true;
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }

    }
}
