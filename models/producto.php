<?php 
if(!class_exists('Producto'))
{
    class Producto
    {
        //atributes
        private $idProducto;
        private $nombre;
        private $descripcion;
        private $imagen;

        //Marca marca
        private $marca;

        //construct
        public function __construct($productoController)
        {
            $this->setIdProducto($productoController);
            $this->setNombre($productoController);
            $this->setDescripcion($productoController);
            $this->setImagen($productoController);
            $this->marca = new Marca($productoController);
        }

        //methods
        //set $this->idProducto 
        public function setIdProducto($productoController)
        {
            if(!empty($productoController['id_producto']))
            {
                $this->idProducto = $productoController['id_producto'];
            }
        }

        //return $this->idProducto 
        public function getIdProducto()
        {
            return $this->idProducto;
        }

        //set $this->nombre 
        public function setNombre($productoController)
        {
            if(!empty($productoController['nombre_producto']))
            {
                $this->nombre = $productoController['nombre_producto'];
            }
        }

        //return $this->nombre 
        public function getNombre()
        {
            return $this->nombre;
        }

        //set $this->descripcion 
        public function setDescripcion($productoController)
        {
            if(!empty($productoController['descripcion']))
            {
                $this->descripcion = $productoController['descripcion'];
            }
        }

        //return $this->descripcion 
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        //set $this->imagen 
        public function setImagen($productoController)
        {
            if(!empty($productoController['imagen']))
            {
                $this->imagen = $productoController['imagen'];
            }
        }

        //return $this->imagen 
        public function getImagen()
        {
            return $this->imagen;
        }

        //return $this->marca Object 
        public function getMarca()
        {
            return $this->marca;
        }
    }
}