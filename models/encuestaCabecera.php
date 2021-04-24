<?php
if(!class_exists('EncuestaCabecera'))
{
    class EncuestaCabecera
    {
        //atributes 
        private $idEncuestaCabecera;
        private $fecha;
        private $puntuacion;
        private $usuarioObject;
        private $productoObject;
        private $marcaObject;
      

        //constructor
        public function __construct($encuestaCabeceraController)
        {
            $this->setIdEncuestaCabecera($encuestaCabeceraController);
            $this->setFecha($encuestaCabeceraController);
            $this->setPuntuacion($encuestaCabeceraController);

            $this->usuarioObject = new Usuario($encuestaCabeceraController);
            $this->productoObject = new Producto($encuestaCabeceraController);
            $this->marcaObject = new Marca($encuestaCabeceraController);
   
        }

        //methods
        //set $this->idEncuestaCabecera 
        public function setIdEncuestaCabecera($encuestaCabeceraController)
        {
            if(!empty($encuestaCabeceraController['id_encuesta_cabecera']))
            {
                $this->idEncuestaCabecera = $encuestaCabeceraController['id_encuesta_cabecera'];
            }
        }

        //return $this->idEncuestaCabecera 
        public function getIdEncuestaCabecera()
        {
            return $this->idEncuestaCabecera; 
        }

        //set $this->fecha 
        public function setFecha($encuestaCabeceraController)
        {
            if(!empty($encuestaCabeceraController['fecha']))
            {
                $this->fecha = $encuestaCabeceraController['fecha'];
            }
        }

        
        //set $this->puntuacion 
        public function setPuntuacion($encuestaCabeceraController)
        {
            
            if(!empty($encuestaCabeceraController['puntuacion']))
            {
                $this->puntuacion = $encuestaCabeceraController['puntuacion'];
            }
        }

        //return $this->puntuacion 
        public function getPuntuacion()
        {
            return $this->puntuacion; 
        }




        //return $this->fecha 
        public function getFecha()
        {
            return $this->fecha; 
        }

        //return $this->usuarioObject 
        public function getUsuario()
        {
            return $this->usuarioObject;
        }

        //return $this->marcaObject 
        public function getMarca()
        {
            return $this->marcaObject;
        }

        //return $this->productoObject 
        public function getProducto()
        {
            return $this->productoObject;
        }
    }
}