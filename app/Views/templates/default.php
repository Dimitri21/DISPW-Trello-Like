
<!doctype html>
    <html lang="fr">
    <head>
        <style>

        </style>
        <meta charset="utf-8">

        <!--CDN -->
        <!-- TODO remove this link or correct it -->

        <!--JQuery_Bootstrap-->

        <!--CSS_Bootstrap-->

        <!--Javascript_Bootstrap-->

        <!-- FIN DE CDN -->

        <!--Font -->
        
        <!--STYLES-->
        <link rel="stylesheet" href="css/app.css">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="trello like">
        <meta name="author" content="">

        <title><?= App::getInstance()->titre; ?></title>

    </head>

    <body>
        <main class="main">
            
            <!--NAVBAR AREA-->
            <nav class="my-navbar">
                <div class="my-container">
                    <div class="my-navbar-inner">

                        <!--NAVBAR LOGO-->
                        <div class="my-navbar-inner-logo">
                            <img src="images/logo/sprinto.svg" alt="Logo de sprinto">
                        </div>
                        
                        <!--NAVBAR LIST ITEMS-->
                        <ul class="my-navbar-inner-list">
                            <li class="my-navbar-inner-list-item">
                                <a href="#">ACCUEIL</a>
                            </li>
                            <li class="my-navbar-inner-list-item">
                                <a href="#">Log in</a>
                            </li>
                            <li class="my-navbar-inner-list-item">
                                <a href="#">sing up</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            
            <!--CONTENT AREA-->
            <section role="main" class="container">
                <!-- L'ensemble de contenu envoyé par le serveur PHP -->
                <?= $content; ?>
            </section>
            
        </main>
        
        <!--FOOTER AREA-->
        <footer class="footer">
            <h5>COPYRIGHT 2020 </h5>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <!-- Script pour l'animation de la page -->
        <script src="js/main_script.js"></script>

    </body>
</html>
