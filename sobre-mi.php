<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 $pg="sobre-mi";
 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mí</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/cv.ico" type="image/x-icon">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    
<?php include_once("menu.php");?>

    <div class="container">

        <section id="sobre-mi">
            <div class="row mt-5">
                <div class="col-sm-8 col-12">
                    <h1>Sobre mí</h1>
                    <h2 class=" sobremi-h2 mt-4 mb-4">Soy Diseñador Multimedial, he realizado distintos tipos de cursos para especializarme en el diseño & desarrollo web. Estoy en búsqueda de una oportunidad laboral para poder seguir creciendo profesionalmente.</h2>
                    <a href="files/GriecoHernanCV.pdf" target="_blank" class="btn mt-3">Descargar CV</a>
                </div>

                <div class="col-sm-4 mt-4 col-12 text-center">
                    <img src="images/cv.png" class="sobremi-imagen" alt="">
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-sm-6 col-12">
                    <div class="bg-white py-3">
                        <div class="col">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="col pt-2">
                            <h2 class="titulo-cajas">PROGRAMACIÓN</h2>
                        </div>
                        <div class="col">
                            <p class="parrafo-proyecto">HTML5, CSS3, Bootstrap, PHP, POO, MVC, Framework Laravel,Javascript, jQuery, React.js, AJAX, REST API, WSDL, JSON.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mt-sm-0 mt-4">
                    <div class="bg-white py-3">
                        <div class="col">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="col pt-2">
                            <h2 class="titulo-cajas">BASE DE DATOS</h2>
                        </div>
                        <div class="col">
                            <p class="parrafo-proyecto">MySQl, HeidiSql, Workbench, Phpmyadmin.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-6 col-12">
                    <div class="bg-white py-3">
                        <div class="col">
                        <i class="fas fa-window-restore"></i>
                        </div>
                        <div class="col pt-2">
                            <h2 class="titulo-cajas">SOFTWARE</h2>
                        </div>
                        <div class="col">
                            <p class="parrafo-proyecto">Wordpress, Illustrator, Photoshop,<br>
                            Premiere, After effects, Dreamweaver, 3DS max, Sony Vegas, Xampp, Git, Github, Trello, Slack, Visual Code, Sublime, Paquete office.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12 mt-sm-0 mt-4">
                    <div class="bg-white py-3">
                        <div class="col">
                            <i class="fas fa-language"></i>
                        </div>
                        <div class="col pt-2">
                            <h2 class="titulo-cajas">IDIOMAS</h2>
                        </div>
                        <div class="col">
                        <p class="parrafo-proyecto">Inglés - Intermediate B1 <br>
                                Español - Nativo <br>
                                Portugués - básico.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6 col-12">
                    <div class="bg-white py-3">
                        <div class="col">
                        <i class="fas fa-puzzle-piece"></i>
                        </div>
                        <div class="col pt-2">
                            <h2 class="titulo-cajas">HOBBIES</h2>
                        </div>
                        <div class="col">
                            <p class="parrafo-proyecto">Fútbol,Series,Videojuegos.</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </section>

    </div>

   
        <section id="experiencia">
            <div class="container mt-4 mt-sm-5">
            <div class="text-white p-3">
                <div class="row mb-sm-4">
                    <div class="col-12">
                        <h2>Experiencia laboral</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <p>2019 – PRESENTE <br>Buenos Aires</p>
                    </div>
                    <div class="col-sm-3 col-12">
                        <h5>Administrativo Contable</h5>
                        <p>Expofot Group S.A</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p> Manejo del sistema contable BAS (Buenos Aires Software),ingreso de compras, ventas, bancos, mercadería. Manejo de documentación legal. Relación con proveedores y clientes. Manejo de cuentas. Conciliaciones bancarias. Uso del paquete Office.Atención al cliente, Mantenimiento del sitio web. </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <p>2018 – 2019 <br>Buenos Aires</p>
                    </div>
                    <div class="col-sm-3 col-12">
                        <h5>Vendedor</h5>
                        <p>José Horacio Santanocita S.A</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p>Tareas administrativas,cobranzas,ventas y reparto de materia prima para confiterías y panaderías. Relación con proveedores y clientes.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <p>2017 – 2018 <br> Buenos Aires</p>
                    </div>
                    <div class="col-sm-3 col-12">
                        <h5>Diseñador</h5>
                        <p>5ta gráfica Banfield</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p>Diseños de flyers,tarjetas personales,gráficas,volantes e impresiones. Atención al cliente.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <p>2017 – 2017  <br>  Buenos Aires</p>
                    </div>
                    <div class="col-sm-3 col-12">
                        <h5>Data Entry</h5>
                        <p>Expofot Group S.A</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p>Data entry desde el hogar.
                            Indexación de actas oficiales de nacimiento y defunciones.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <p>2013 – 2014 <br> Buenos Aires</p>
                    </div>
                    <div class="col-sm-3 col-12">
                        <h5>Promotor</h5>
                        <p>SV Promociones</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p>Promotor temporal en Sv promociones,promoción del mundial tarjetas visa recargables(Alto avellaneda).Finalización cuando terminó la promoción.</p>
                    </div>
                    <div class="col-12 d-sm-none text-right mb-5 depc-mobile-sobremi">
                    <p>Patrocinado por <br><a href="https://depcsuite.com" target="_blank"><span>DePc Suite</span></a>
                    </p>
                </div>
                </div>
            </div>
        </div>
        
        </section>


        <?php include_once("footer.php");?>


    <footer id="responsive">
        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <a href="https://api.whatsapp.com/send?phone=541164187516&amp;text=Hola
                     " target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
                 <div class="col text-center">
                            <a href="https://www.linkedin.com/in/hernangrieco/" target="_blank"> <i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col text-right" >
                    <a href="https://github.com/griecohernan" target="_blank"><i class="fab fa-github"></i> </a>
                 </div>
                
            </div>
        </div>

    </footer>







</body>

</html>