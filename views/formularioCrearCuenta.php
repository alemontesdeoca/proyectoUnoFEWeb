<section class="">
    <div class="mt-5 mb-5">
        <h1 class="text-center text-button">Crear una cuenta</h1>
    </div>
    <div class="container">
        <form action="procesos/crearMiCuenta.php" method="post" class="form col-md-6 m-auto">
            <div>
                <?php 
                    if(!empty($_GET['operacion']))
                    {
                        $operacion = htmlentities(addslashes($_GET['operacion']));
                        echo mostrarAlerts($operacion);
                    }
                ?>
            </div>
            <input type="text" name="usuario" placeholder="Usuario" id="usuario" class="form-control mb-3">

            <input type="password" name="pass_word" id="pass_word" placeholder="Contraseña" class="form-control mb-3">

            <input type="password" name="pass_word2" id="pass_word2" placeholder="Repetir contraseña" class="form-control mb-3">

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control mb-3">

            <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control mb-3">

            <input type="text" name="direccion" id="direccion" placeholder="Direccion" class="form-control mb-3">

            <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control mb-3">


            <div class="text-center">      
            <Button type="submit"  class="btn btn-lo borderRoundButton  colorPrimary">REGISTRARSE</Button>
            </div> 

            <div class="text-center textButton">            <a href="index.php?pagina=ingresarAMiCuenta" class="textButton">¿Ya tienes cuenta?</a></div>

    </div>
</section>