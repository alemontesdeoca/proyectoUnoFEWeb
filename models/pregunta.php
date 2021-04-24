<?php 
if(!class_exists('Pregunta'))
{
    class Pregunta 
    {
        //atributes
        private $idPregunta;
        private $descripcionPregunta;


        //constructor 
        public function __construct($preguntaController)
        {
            $this->setIdPregunta($preguntaController);
            $this->setDescripcionPregunta($preguntaController);
        }

        //methods 
        //set $this->idPregunta 
        public function setIdPregunta($preguntaController)
        {
            if(!empty($preguntaController['id_pregunta']))
            {
                $this->idPregunta = $preguntaController['id_pregunta'];
            }
        }

        //return $this->pregunta 
        public function getIdPregunta()
        {
            return $this->idPregunta;
        }


        //methods 
        //set $this->descripcionPregunta 
        public function setDescripcionPregunta($preguntaController)
        {
            if(!empty($preguntaController['descripcion_pregunta']))
            {
                $this->descripcionPregunta = $preguntaController['descripcion_pregunta'];
            }
        }

        //return $this->descripcionPregunta 
        public function getDescripcionPregunta()
        {
            return $this->descripcionPregunta;
        }

    }
}