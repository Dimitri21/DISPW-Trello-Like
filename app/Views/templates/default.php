<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparto</title>
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
                    <li><a>Connexion</a></li>
                    <li class="CTA"><a>Inscription</a></li>
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