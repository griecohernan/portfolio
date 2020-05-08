<nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ml-5 ml-sm-0 mt-5 mt-sm-0">
                    <a class="nav-link text-left text-sm-center <?php echo $pg =="index"? "active" :""; ?>" href="index.php">Inicio</a>
                </li>
                <li class="nav-item ml-5 ml-sm-0">
                    <a class="nav-link text-left text-sm-center <?php echo $pg =="sobre-mi"? "active" :""; ?>" href="sobre-mi.php">Sobre mí</a>
                </li>
                <li class="nav-item ml-5 ml-sm-0">
                    <a class="nav-link text-left text-sm-center <?php echo $pg =="proyectos"? "active" :""; ?>" href="proyectos.php">Proyectos</a>
                </li>
                <li class="nav-item ml-5 ml-sm-0">
                    <a class="nav-link text-left text-sm-center <?php echo $pg =="contacto"? "active" :""; ?>" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

