<?php 
if(!class_exists('Marca'))
{
    class Marca
    {
        //atributes
        private $idMarca;
        private $nombreMarca;

        //construct 
        public function __construct($marcaController)
        {
            $this->setIdMarca($marcaController);
            $this->setNombreMarca($marcaController);
        }

        //methos 
        //set $this->idMarca 
        public function setIdMarca($marcaController)
        {
            if(!empty( $marcaController['id_marca']))
            {
                $this->idMarca = $marcaController['id_marca'];
            }
        }

        //return $this->idMarca 
        public function getIdMarca()
        {
            return $this->idMarca;
        }

        //set $this->nombreMarca 
        public function setNombreMarca($marcaController)
        {
            if(!empty($marcaController['nombre_marca']))
            {
                $this->nombreMarca = $marcaController['nombre_marca'];
            }
        }

        //retunr $this->nombreMarca     
        public function getNombreMarca()
        {
            return $this->nombreMarca;
        }
    }
}