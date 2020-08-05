<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


 $pg="proyectos";
 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
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


        <section id="proyectos">
            <div class="row">
                <div class="col-12 mt-4 mt-sm-5 py-3">
                    <h1>Mis Proyectos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 pb-sm-3">
                    <p class="parrafo-titular">Estos son algunos de los trabajos que he realizado:
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/abmclientes.png" alt="ABM Clientes" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2"">
                            <div class="col-12">
                                <h2 class="titulo-cajas">ABM Clientes</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Alta, Baja, modificación de un registro de clientes.
                                    <br>
                                    Proyecto realizado con los lenguajes: <br> HTML5, CSS3, PHP,
                                    Bootstrap y Json.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="sistema/abmclientes.php" target="_Blank" class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/abmventas.png" alt="ABM Ventas" class="img-fluid">
                            </div>
                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Sistema de gestión de ventas</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Gestión de clientes, productos y ventas. <br> Realizado en
                                    HTML5, CSS3, PHP, MVC, Bootstrap,
                                    Js, Ajax, jQuery y
                                    MySQL de base de datos.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="login/login.php" target="_Blank" class="btn btn-proyecto">Ver online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mt-sm-4 mt-4">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/sistema-admin.png" alt="proyecto integrador" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Proyecto integrador</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto Full Stack desarrollado en PHP, Laravel,
                                    Javascript, jQuery, AJAX, HTML5, CSS3, con panel administrador, gestor de usuarios,
                                    módulo de permisos y funcionalidades a fines.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="#" class="btn btn-proyecto">En proceso</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 mt-sm-4 mt-4">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/netflixpag.png" alt="Página similar a Netflix" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Netflix</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto de práctica. Página similar a Netflix. <br> Fue realizada con HTML5,CSS3,Javascript,Responsive.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="https://griecohernan.github.io/Netflix/" target="_blank" class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/griecohernan/Netflix" target="_blank"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
            <div class="col-12 col-sm-6 mt-sm-4 mt-4">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/gimnasio.png" alt="Gimnasio" class="img-fluid">
                            </div>
                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Gimnasio</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto de práctica. Página realizada para un Gimnasio. <br> Fue realizada con los lenguajes:HTML5,CSS3,Jquery,Responsive.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="https://griecohernan.github.io/Gimnasio/" target="_blank"
                                    class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/griecohernan/Gimnasio" target="_blank"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt-sm-4 mt-4">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/yoga.png" alt="Página de Yoga" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Yoga</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto de práctica. <br> Fue realizada con HTML5,CSS3,Jquery,Responsive.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="https://griecohernan.github.io/Yoga/" target="_blank" class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/griecohernan/Yoga" target="_blank"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mt-sm-4 mt-4 mb-sm-5">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/pizzeria.png" alt="Página de Pizzería" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Pizzería</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto de práctica. Página realizada para una Pizzería.Fue realizada con HTML5,CSS3,Jquery,Responsive.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="https://griecohernan.github.io/Pizzeria/" target="_blank" class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/griecohernan/Pizzeria" target="_blank"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt-sm-4 mt-4 mb-sm-5">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/delivery.png" alt="Página de Delivery" class="img-fluid">
                            </div>

                        </div>
                        <div class="row pt-3 pl-2">
                            <div class="col-12">
                                <h2 class="titulo-cajas">Delivery</h2>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="parrafo-proyecto">Proyecto de práctica. Página realizada para un lugar de comidas rápidas.Fue realizada con HTML5,CSS3,Jquery,Responsive.</p>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 text-left">
                                <a href="https://griecohernan.github.io/Delivery/" target="_blank" class="btn btn-proyecto">Ver Online</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://github.com/griecohernan/Delivery" target="_blank"> Código fuente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
             <div class="col-12 d-sm-none text-right pt-2 depc-mobile">
                    <p>Patrocinado por <br><a href="https://depcsuite.com" target="_blank"><span>DePc Suite</span></a>
                    </p>
                </div>

        </section>
    </div>


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