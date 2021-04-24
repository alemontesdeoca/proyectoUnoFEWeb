<div class="mt-5  mb-5">
        <h1 class="text-center text-button">Producto encuestado</h1>
    </div>

<div class="container">

<section class="cards">

<?php
               
               /**
                * Esta pagina muestra la lista de prodcutos que van a ser encuestrados
                * 
                */
           
               
               $productoController = new ProductoController();
               $listaDeProductos = $productoController->mostrarListaDeProductos();
            
               
           
                        foreach($listaDeProductos as $lista)
                                       {
                                           ?>

  <article class="card">    <br>
    <picture class="thumbnail">
         <img class="card-img-top"src=<?php  echo $lista->getImagen()?> alt="" />
    </picture>
    <br>
    <div class="card-content">
      <h2>   <?php echo ucfirst(strtolower($lista->getNombre()));?></h2>
      <p><?php echo ucfirst(strtolower($lista->getDescripcion()));?></p>
   </div>
   
    <footer>
      <div class="post-meta text-center">
      <a href="index.php?pagina=reporte&id=<?php echo $lista->getIdProducto().'"'?> class=" aTable">Ver encuestas</a>

        </div>
    </footer>
  </article>
 
  <?php
    }
    ?>
</section>
<br>
<br>

<br>

</div>



