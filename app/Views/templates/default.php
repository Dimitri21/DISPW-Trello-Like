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
<<<<<<< HEAD
    <link rel="stylesheet" href="css/app.css">
=======
    <link rel="stylesheet" href="build/css/app.css">
>>>>>>> origin/develop

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="trello like">
    <meta name="author" content="">
<<<<<<< HEAD

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
                            <a href="#">Connexion</a>
                        </li>

                        <li class="my-navbar-inner-list-item">
                            <a href="#">Inscription</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <!--HEADER-->
        <header class="header">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner-left">
                        <h1>Collaborer activement avec vos équipes</h1>
                        <h3>Augmentez la performance de vos équipes grâce à notre outil collaboratif de gestion
                            de projet permettant une gestion de projet agile, avec un tableau Kanban</h3>
                        <a href="#">Inscrivez-vous, c'est gratuit</a>
                    </div>
                    <div class="header-inner-right">

                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_nnctxuql.json" background="transparent" speed="1" style="width: 500px; height: 600px;" loop controls autoplay></lottie-player>
=======

    <!--ANIMATION FOR PICTURE ON HEADER-->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

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
>>>>>>> origin/develop
                    </div>

                    <!--NAVBAR LIST ITEMS-->
                    <ul class="my-navbar-inner-list">

                        <li class="my-navbar-inner-list-item">
                            <a href="#">ACCUEIL</a>
                        </li>

                        <li class="my-navbar-inner-list-item">
                            <a href="#">Connexion</a>
                        </li>

                        <li class="my-navbar-inner-list-item">
                            <a href="#">Inscription</a>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>

        <!--HEADER-->
        <header class="header">
            <div class="my-container">

                <div class="header-inner">
                    <!--TEXTS-->
                    <div class="header-inner-left">
                        <h1>Collaborer activement avec vos équipes</h1>
                        <h3>Augmentez la performance de vos équipes grâce à notre outil collaboratif de gestion
                            de projet permettant une gestion de projet agile, avec un tableau Kanban</h3>
                        <a href="#" class="btn">Inscrivez-vous, c'est gratuit</a>
                    </div>

                    <!--ANIMATION - IMAGE-->
                    <div class="header-inner-right">
                        <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_nnctxuql.json" background="transparent" speed="1" style="width: 600px; height: 500px;" loop autoplay></lottie-player>
                    </div>

                </div>
<<<<<<< HEAD
=======

>>>>>>> origin/develop
            </div>
        </header>

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
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <!-- Script pour l'animation de la page -->
    <script src="js/main_script.js"></script>

</body>

</html>