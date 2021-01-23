<?php 
$title = "Home page";
$metadescription = "Home page";
$user = (object) ["name" =>"DOE","lastname"=>"John", "avatar"=>"https://lien_de_photos"];
$content = "page à afficher";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <meta name="description" content="<?=$metadescription?>">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <header class="header">
        <nav class="header-nav">
            <div class="header-nav-logo">
                <img src="" alt="Logo Sparto">  
            </div>
            <div class="header-nav-list">
                <ul>
                    <li><a>Accueil</a></li>
                    <!--USER CONNECTED-->
                    <?php if (isset($user)): ?>
                        <li>
                            <span><?=$user->name?></span>

                            <div class="user-avatar">
                                <img src="" alt="user avatar">
                            </div>

                            <div class="dropdown">
                                <ul>
                                    <li><a href="?">Mes tableaux</a></li>
                                    <li><a href="?">Mon profil</a></li>
                                    <li><a href="?">Se déconnecter</a></li>
                                </ul>
                            </div>

                        </li>
                    <?php else : ?>
                    <!--USER DISCONNECTED-->
                        <li><a>Connexion</a></li>
                        <li class="btn btn-CTA"><a>Inscription</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <?php 
            if (isset($content)) {
                echo $content;
            }
        ?>
    </main>
    
    <footer class="footer">
        <nav class="footer-nav">
            <ul>
                <li><a href="">Politique de confidentialité</a></li>
                <li><a href="">Mentions légales</a></li>
                <li><a href="">Conditions générales d'utilisation</a></li>
            </ul>
        </nav>
    </footer>

</body>
</html>