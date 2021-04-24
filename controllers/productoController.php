<?php 
if(!class_exists('ProductoController'))
{
    class ProductoController 
    {
        //methods

        //return the conexionObject
        public function getConexion()
        {   
            return Conexion::getConexion();
        }

        /**
         * Metodo que devuelve toda la iformacion de un producto
         * Devuelve una coleccion de productos y sus marcas
         */
        public function mostrarListaDeProductos()
        {
            $instruccionSQL =   "select * from producto 
                                join marca 
                                on marca.id_marca = producto.id_marca ";
            $listaDeProductos = array();
            try
            {
                $sentencia = $this->getConexion()->prepare($instruccionSQL);
                if($sentencia->execute())
                {
                    if($sentencia->rowCount() > 0)
                    {
                        while($respuesta = $sentencia->fetch())
                        {
                            $listaDeProductos[] = new Producto($respuesta);
                        }
                        return $listaDeProductos;
                    }
                }
            }
            catch(Exception $e)
            {

            }
            return false;
        }
    }
}