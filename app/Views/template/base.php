<!doctype html>
<html lang="fr">

<head>
    <style>

    </style>
    <meta charset="utf-8">

    <!--CDN AREA-->

    <!--STYLES-->
    <link rel="stylesheet" href="build/css/app.css">

    <!--META AREA-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="trello like">
    <meta name="author" content="">

    <!--ANIMATION FOR PICTURE ON HEADER-->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body>

    <main class="main">

        <!--NAVBAR AREA-->
        <nav class="my-navbar">

            <div class="my-container">

                <div class="my-navbar-inner">

                    <!--NAVBAR LOGO-->
                    <div class="my-navbar-inner-logo">
                        <a href="/">
                            <img src="images/logo/sprinto_white.png" alt="Logo de sprinto">
                        </a>
                    </div>

                    <!--NAVBAR LIST ITEMS-->
                    <ul class="my-navbar-inner-list">

                        <li class="my-navbar-inner-list-item">
                            <a href="/">ACCUEIL</a>
                        </li>

                        <li class="my-navbar-inner-list-item">
                            <a href="/connexion">Connexion</a>
                        </li>

                        <li class="my-navbar-inner-list-item">
                            <a href="/inscription">Inscription</a>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>


        <!--CONTENT AREA-->
        <section role="main" class="container">
            <!-- L'ensemble de contenu envoyé par le serveur PHP -->
            <?= $content?? '' ?>
        </section>

    </main>

    <!--FOOTER AREA-->
    <footer class="footer">
        <div class="my-container">
            <ul class="footer-inner">
                <li><a href="/politique-de-confidentialite">Politique de confidentialité</a></li>
                <li><a href="/mentions-legales">Mentions légales</a></li>
                <li><a href="/conditions-generales-utilisation">Conditions générales d'utilisation</a></li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>