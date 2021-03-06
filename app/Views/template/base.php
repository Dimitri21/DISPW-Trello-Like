<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">

    <!--CDN AREA-->

    <!--STYLES-->
    <link rel="stylesheet" href="build/css/app.css">

    <!--META AREA-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="trello like">
    <meta name="authors" content="CECILE E., DIMITRI H. ET DURAMANA K.">

    <!--SCRIPT FOR LLOTTIES-->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!--FONT AWESOME PRO -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title><?= \app\App::getInstance()->titre ?></title>

</head>

<body>
    <main class="main">

        <!--NAVBAR AREA-->
        <nav class="my-navbar">
            <div class="my-container">

                <div class="my-navbar-inner">

                    <!--NAVBAR LOGO-->
                    <div class="my-navbar-inner-logo">
                        <a href="?path=home">
                            <img src="images/logo/sprinto_white.png" alt="Logo de sprinto">
                        </a>
                    </div>

                    <!--NAVBAR LIST ITEMS-->

                    <ul class="my-navbar-inner-list">

                        <li class="my-navbar-inner-list-item">
                            <a href="?path=home">ACCUEIL</a>
                        </li>

                        <?php if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) : ?>
                            <!--PROFILE INFOS-->
                            <ul class="my-navbar-inner-list-profile">

                                <!--TODO to delete-->
                                <?php if (isset($project)) : ?>
                                    <li class="my-navbar-inner-list-profile-item">
                                        <a href="#"><i class="fal fa-envelope"></i></a>
                                        <span class="badge success">3</span>
                                    </li>

                                    <li class="my-navbar-inner-list-profile-item">
                                        <a href="#"><i class="fal fa-flag"></i></a>
                                        <span class="badge danger">1</span>
                                    </li>

                                    <li class="my-navbar-inner-list-profile-item">
                                        <a href="#"><i class="fal fa-bell"></i></a>
                                        <span class="badge warning">2</span>
                                    </li>
                                <?php endif; ?>

                                <li class="my-navbar-inner-list-profile-item profil">
                                    <!--USER PICTURE-->
                                    <div href="#" class="profile-image" id="dropdown_js">
                                        <img src="images/profile/<?= \app\App::getInstance()->picture ?? '/default/man.jpg' ?>" alt="profile picture">
                                    </div>

                                </li>

                            </ul>
                        <?php else : ?>
                            <li class="my-navbar-inner-list-item">
                                <a href="?path=connexion">Connexion</a>
                            </li>

                            <li class="my-navbar-inner-list-item">
                                <a href="?path=inscription">Inscription</a>
                            </li>
                        <?php endif; ?>

                    </ul>

                    <!--HUMBURGER-->
                    <div class="my-navbar-inner-humburger nav-humburger-js">
                        <span></span>
                    </div>

                </div>

            </div>
        </nav>

        <!--DROPDOWN-->
        <?php if (isset($_SESSION['auth'])) : ?>
            <div class="my-container">
                <div class="main-dropdown" id="profile_dropdown_js">
                    <ul>
                        <li><a href="?path=admin-projects-index">Dashboard</a></li>
                        <li><a href="?path=admin-users-profile">Profil</a></li>
                        <li><a href="?path=auth-logout">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <!--CONTENT AREA-->
        <section role="main" class="container">
            <!-- L'ensemble de contenu envoyé par le serveur PHP -->
            <?= $content ?? '' ?>
        </section>

        <!--LIST ITEM BY HUMBURGER BTN CLICK-->
        <div class="main-humburger">
            <ul class="main-humburger-list ">

                <li class="main-humburger-list-item">
                    <a href="?path=home">ACCUEIL</a>
                </li>

                <?php if (isset($_SESSION['auth'])) : ?>
                    <li class="main-humburger-list-item">
                        <a href="?path=admin-projects-index">Dashboard</a>
                    </li>
                    <li class="main-humburger-list-item">
                        <a href="?path=auth-logout">Deconnexion</a>
                    </li>
                <?php else : ?>
                    <li class="main-humburger-list-item">
                        <a href="?path=connexion">Connexion</a>
                    </li>

                    <li class="main-humburger-list-item">
                        <a href="?path=inscription">Inscription</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

    </main>

    <!--FOOTER AREA-->
    <footer class="footer">
        <div class="my-container">
            <ul class="footer-inner">
                <li><a href="?path=politique_de_confidentialite">Politique de confidentialité</a></li>
                <li><a href="?path=mentions_legales">Mentions légales</a></li>
                <li><a href="?path=conditions_generales_utilisation">Conditions générales d'utilisation</a></li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>