

<nav class="navbar navbar-expand-md navbar-dark bg-dark colorPrimary">

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a  class="nav-link text-light">
               Hola  <?php echo ucfirst(strtolower($miUsuario->getNombre()));?>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php?pagina=cerrarSesion" class="nav-link text-light" style="text-decoration:underline">Salir de mi cuenta</a>
        </li>
        </ul>
    </div>
</nav>