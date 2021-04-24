<?php 
if(!class_exists('EncuestaDetalles'))
{
    class EncuestaDetalles
    {
        //atributes 
        private $idEncuestaDetalles;
        private $pregunta;
        private $respuesta;
        private $encuestaCabecera;
        private $idEstado;

        //construtor 
        public function __constrcut($encuestaDetallesController)
        {
            $this->setIdEncuestaDetalles($encuestaDetallesController);
            $this->pregunta = new Pregunta($encuestaDetallesController);
            $this->respuesta = new Respuesta($encuestaDetallesController);
            $this->encuestaCabecera = new EncuestaCabecera($encuestaDetallesController);
            $this->setIdEstado($encuestaDetallesController);
        }

        //methods
        //set $this->idEncuestaDetalles 
        public function setIdEncuestaDetalles($encuestaDetallesController)
        {
            if(!empty($encuestaDetallesController['id_encuesta_detalles']))
            {
                $this->idEncuestaDetalles = $encuestaDetallesController['id_encuesta_detalles'];
            }
        }

        //return $this->idEncuestaDetalles 
        public function getIdEncuestaDetalles()
        {
            return $this->idEncuestaDetalles;
        }

        //return $this->pregunta object 
        public function getPregunta()
        {
            return $this->pregunta;
        }

        //return $this->respuesta object 
        public function getRespuesta()
        {
            return $this->respuesta;
        }

        //return $this->encuestaCabecera object 
        public function getEncuestaCabecera()
        {
            return $this->encuestaCabecera;
        }

        //set $this->idEstado 
        public function setIdEstado($encuestaDetallesController)
        {
            if(!empty($encuestaDetallesController['id_estado']))
            {
                $this->idEstado = $encuestaDetallesController['id_estado'];
            }
        }

        //return $this->idEstado 
        public function getIdEstado()
        {
            return $this->idEstado;
        }
    }
}