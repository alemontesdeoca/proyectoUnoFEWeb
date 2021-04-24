<?php 
if(!class_exists('Usuario'))
{
    class Usuario
    {
        //method
        private $idUsuario;
        private $alias;
        private $password;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;

        //construct
        public function __construct($usuarioController)
        {
            $this->setIdUsuario($usuarioController);
            $this->setAlias($usuarioController);
            $this->setPassword($usuarioController);
            $this->setNombre($usuarioController);
            $this->setApellido($usuarioController);
        }

        //method
        //set $this->idUsuario 
        public function setIdUsuario($usuarioController)
        {
            if(!empty($usuarioController['id_usuario']))
            {
                $this->idUsuario = $usuarioController['id_usuario'];
            }
        }

        //return $this->idUsuario 
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        //set $this->alias 
        public function setAlias($usuarioController)
        {
            if(!empty($usuarioController['alias']))
            {
                $this->alias = $usuarioController['alias'];
            }
        }

        //return $this->alias 
        public function getAlias()
        {
            return $this->alias;
        }


        //set $this->password 
        public function setPassword($usuarioController)
        {
            if(!empty($usuarioController['pass_word']))
            {
                $this->password = $usuarioController['pass_word'];
            }
        }

        //return $this->pass_word 
        public function getPassword()
        {
            return $this->password;
        }

        //set $this->nombre 
        public function setNombre($usuarioController)
        {
            if(!empty($usuarioController['nombre']))
            {
                $this->nombre = $usuarioController['nombre'];
            }
        }

        //return $this->nombre 
        public function getNombre()
        {
            return $this->nombre;
        }


        //set $this->apellido 
        public function setApellido($usuarioController)
        {
            if(!empty($usuarioController['apellido']))
            {
                $this->apellido = $usuarioController['apellido'];
            }
        }

        //return $this->apellido 
        public function getApellido()
        {
            return $this->apellido;
        }


        //set $this->telefono 
        public function setTelefono($usuarioController)
        {
            if(!empty($usuarioController['telefono']))
            {
                $this->telefono = $usuarioController['telefono'];
            }
        }

        //return $this->telefono 
        public function getTelefono()
        {
            return $this->telefono;
        }


        //set $this->direccion 
        public function setDireccion($usuarioController)
        {
            if(!empty($usuarioController['direccion']))
            {
                $this->direccion = $usuarioController['direccion'];
            }
        }

        //return $this->direccion 
        public function getDireccion()
        {
            return $this->direccion;
        }
    }
}