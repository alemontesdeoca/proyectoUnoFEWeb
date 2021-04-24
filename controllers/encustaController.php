<?php 
if(!class_exists('EncuestaController'))
{
    class EncuestaController
    {
        //return the conection object
        public function getConexion()
        {
            return Conexion::getconexion();
        }

        /**
         * Metodo para crear una nueva encuesta
         * devuelve el de la encuesta
         */
        public function crearCabeceraEncuesta($idUsuario,$idProducto) 
        {
            $isntruccionSQL =   "insert into encuesta_cabecera(id_usuario,fecha,id_producto,id_estado)
                                values(?,now(),?,?)";
            $idEstado = 3 ;
            try 
            {
                $sentencia = $this->getConexion()->prepare($isntruccionSQL);
                if($sentencia->execute(array($idUsuario,$idProducto,$idEstado)))
                {
                    return true;
                }
            }
            catch(Exception $e)
            {
                
            }
            return false;
        }

        /**
         * Metodo que trae la cabcera de una encuesta 
         * segun el id del usuario y el estado pedido
         */
        public function traerCabecerasEncuestas($idUsuario,$idEstado)
        {
            $isntruccionSQL =   "select * from encuesta_cabecera 
                                join producto 
                                on producto.id_producto = encuesta_cabecera.id_producto
                                where id_usuario = ? and id_estado = ? ";

            try 
            {
                $sentencia = $this->getConexion()->prepare($isntruccionSQL);
                if($sentencia->execute(array($idUsuario,$idEstado)))
                {
                    if($sentencia->rowCount() > 0)
                    {
                        $respuesta = $sentencia->fetch();
                        $cabeceraEncuesta = new EncuestaCabecera($respuesta);
                        return $cabeceraEncuesta;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }

        /**
         * metodo para traer las respuesta y respuestas para una encuesta
         */
                /**
         * Metodo que trae la cabcera de una encuesta 
         * segun el id del usuario y el estado pedido
         */
        public function mostrarPreguntasEncuestas()
        {
            $isntruccionSQL =   "select * from pregunta ";

            try 
            {
                $sentencia = $this->getConexion()->prepare($isntruccionSQL);
                if($sentencia->execute())
                {
                    if($sentencia->rowCount() > 0)
                    {
                        while($respuesta = $sentencia->fetch())
                        {
                            $pregunta[] = new Pregunta($respuesta);
                        }
                        
                        return $pregunta;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }

        /**
         * Funcion que muestra una coleccion de respuesas por cada preguta
         */
        public function mostrarRespuestasEncuestas($idPregunta)
        {
            $isntruccionSQL =   "select * from respuesta where id_pregunta = ? ";
            try 
            {
                $sentencia = $this->getConexion()->prepare($isntruccionSQL);
                if($sentencia->execute(array($idPregunta) ))
                {
                    if($sentencia->rowCount() > 0)
                    {
                        while($respuesta = $sentencia->fetch() )
                        {
                            $listaRespuesta[] = new Respuesta($respuesta);
                        }
                        
                        return $listaRespuesta;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }

        /**
         * Metodos que devuelve las respuestas almacenadas del
         * detalle de la encuesta
         */
        public function getEncuestasAlmacenadas($idCabecera)
        {
            $isntruccionSQL =   "select * from encuesta_detalles where id_encuesta_cabecera = ? ";
            try 
            {
                $sentencia = $this->getConexion()->prepare($isntruccionSQL);
                if($sentencia->execute(array($idCabecera) ))
                {
                    if($sentencia->rowCount() > 0)
                    {
                        while($respuesta = $sentencia->fetch() )
                        {
                            $listaRespuesta[] = new Respuesta($respuesta);
                        }
                        
                        return $listaRespuesta;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }



        /**
         * Metodo para mostrar los resultados de las encuestas en una tabla
         * Devuelve una colecionn de encuestas, con detalles y usuarios
         */
        public function getEncuestas($id) //ok
        {
            Api::getApi("http://localhost/proyectoUnoBE/controllers/report.php?id=".$id);
        
            $data = json_decode(Api::$data,true);


            return $data;
           
        }

        
    }
}