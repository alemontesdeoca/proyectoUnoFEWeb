<?php 
if(!class_exists('Respuesta'))
{
    class Respuesta
    {
        //atributes
        private $idRespuesta;
        private $descripcionRespuesta;
        private $pregunta;

        //constrcutor 
        public function __construct($respuestaController)
        {
            $this->setIdRespuesta($respuestaController);
            $this->setDescripcionRespuesta($respuestaController);
            $this->pregunta = new Pregunta($respuestaController);
        }

        //methods 
        //set $this->idRespuesta 
        public function setIdRespuesta($respuestaController)
        {
            if(!empty($respuestaController['id_respuesta']))
            {
                $this->idRespuesta = $respuestaController['id_respuesta'];
            }
        }

        //return $this->idRespuesta 
        public function getIdRespuesta()
        {
            return $this->idRespuesta;
        }

        //set $this->descripcionRespuesta 
        public function setDescripcionRespuesta($respuestaController)
        {
            if(!empty($respuestaController['descripcion_respuesta']))
            {
                $this->descripcionRespuesta = $respuestaController['descripcion_respuesta'];
            }
        }

        //return $this->descripcionRespuesta 
        public function getDescripcionRespuesta()
        {
            return $this->descripcionRespuesta;
        }

        //return $this->preguntaobject 
        public function getPregunta()
        {
            return $this->pregunta;
        }
    }
}