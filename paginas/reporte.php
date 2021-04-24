<?php
include_once 'utils/api.php';

/**
 * Este archivo almacena todas las encuests correspondientes a un producto.
 * Luego genera un archivo de excel con esa informacion
 */
$encuestaController = new EncuestaController();
$listaEncuestas = $encuestaController->getEncuestas($_GET['id']);
if($listaEncuestas != null)
{
    ?>
    <section class="pt-5 pb-5">
        <div class="container mb-5 mt-5">
        <h1 class="text-center text-button">Lista de encuestas</h1>

        <div class="container mt-5 mb-5">
            <?php 
                if(!empty($_GET['pagina']) && !empty($_GET['operacion']))
                {
                    if($_GET['operacion'] == 'error')
                    {
                        echo '<p class="alert alert-danger text-center">Se produjo un error.</p>';
                    }
                    if($_GET['operacion'] == 'exito')
                    {
                        echo '<p class="alert alert-success text-center">Operacion exitosa.</p>';
                    }
                }
            ?>
        </div>

        </div>
        <div class="container mb-5 ">
            <a href="index.php" class="btn btn-success colorOutline">Volver</a>
           
            <form action="procesos/crearExcel.php" method="POST" style="display:inline-block">
            <input type="hidden" name="id" value=<?php echo $_GET['id'] ?>>

                <input type="submit" value="Generar Excel" class="btn btn-danger colorPrimary">
            </form>
        </div>
      
        <div class="container">
            <div class="responsive-md">
                <table class="table table-secondary table-hover ">
                    <tr>
                        <td>Pregunta</td>
                        <td>Respuesta</td>
                        <td>Nombre </td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td></td>

                    </tr>
                    <?php
                        foreach($listaEncuestas as $encuesta)
                        {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $encuesta["descripcion_pregunta"]?>
                                    </td>
                             
                                    <td>
                                        
                                        <?php echo $encuesta["descripcion_respuesta"]?>
                                    </td>
                              
                                    <td>
                                    <?php echo $encuesta["nombre"]?>
                                    </td>

                                    
                                    <td>
                                    <?php echo $encuesta["apellido"]?>
                                    </td>
                             
                             
                                    <td>
                                    <?php echo $encuesta["alias"]?>
                                    </td>
                             
                                    <td>
                                   
                                    </td>
                                
                                </tr>

                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <?php
}
else
{
    ?>

<br>
     <div class="container mb-5 ">
            <a href="index.php" class="btn btn-success colorOutline">Volver</a>
           
         
        </div>
        <div class="container mt-5 tb-5">
            <p class="alert alert-danger text-center" style="background:#f5f5f5 !important;  border:solid 1px #f5f5f5 !important; color: black">No hay datos para mostrar</p>
        </div>
    <?php
}





