<section>
    <div class="mt-5 mb-5">
        <h1 class="text-center textButton">Ingresar a mi cuenta</h1>
    </div>
    <div class="container mt-5">
        <form action="procesos/iniciarSesion.php" method="post" class="form col-md-6 m-auto bordered">
            <div class="">
                <?php 
                    if(!empty($_GET['operacion']))
                    {
                        $operacion = htmlentities(addslashes($_GET['operacion']));
                        echo mostrarAlerts($operacion);
                    }
                ?>
            </div>
            
            <input type="text" name="usuario" placeholder="Usuario" id="usuario" class="form-control mb-3 inputMargin">
                    
            <input type="password" name="pass_word" id="pass_word" placeholder="Password" class="form-control mb-3">
             <div class="text-center">      
            <Button type="submit"  class="btn btn-lo borderRoundButton  colorPrimary">INGRESAR</Button>
            </div> 

            <div class="text-center textButton">            <a href="index.php?pagina=crearMiCuenta" class="textButton">¿No tienes cuenta?</a></div>

                </form>
    </div>
</section>