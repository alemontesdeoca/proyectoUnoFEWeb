
<section>
    <div>
        <span>Producto encuestado : </span>
        <span><?php echo ucfirst(strtolower( $cabezeraEncuesta->getProducto()->getNombre()));?></span>
    </div>

    <?php
        foreach($preguntasEncuestas as $pregunta)
        {
            ?>
                <div>
                    <form action="procesos/completarEncuesta" method="post">
                        <label ><?php echo ucfirst(strtolower($pregunta->getDescripcionPregunta())); ?></label>
                        <?php 
                            $respuestasEncuestas = $encuestaController->mostrarRespuestasEncuestas($pregunta->getIdPregunta());
                          
                            if($respuestasEncuestas != null)
                            {
                                foreach($respuestasEncuestas as $respuetas)
                                {
                                    ?>
                                        <div>

                                            <label for=""><?php echo $respuetas->getDescripcionRespuesta(); ?></label>
                                            <input type="radio" name="idRespuesta" id="" value="<?php echo $respuetas->getIdRespuesta();?>">
                                            <input type="hidden" name="idCabecera" value="<?php $cabezeraEncuesta->getIdEncuestaCabecera();?>">
                                            <input type="hidden" name="idPregunta" value="<?php echo $pregunta->getIdPregunta();?>">

                                   
                                            

                                        </div>
                                    <?php
                                }
                            }


                        ?>
                       
                       <input type="submit" value="Enviar">
                    </form>
                </div>
            <?php

        }
    ?>
</section>