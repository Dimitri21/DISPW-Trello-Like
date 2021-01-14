
<!doctype html>
    <html lang="fr">
    <head>
        <style>

        </style>

        <meta charset="utf-8">

        <!--CDN -->
        <link href="css/fontawesome/css/all.css" rel="stylesheet">

        <!--JQuery_Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <!--CSS_Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--Javascript_Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
               

        <!-- FIN DE CDN -->

        <!--Font -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="css/notfound.css">
        <script src="/js/main_script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= App::getInstance()->titre; ?></title>

    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <main role="main" class="container-fluid">

            <div class="contenu" style="margin-top:50px;"></div>

            <div class="container" style="width:800px;">
                <p>Create a controller : </p>
                <pre class="">      
                    <span class="">tft </span><span class="pln">-c </span><span class="lit">controllerName</span>
                </pre>
                <p>In your browser url tape : </p>
                <pre class="">      
                    <span class="">localhost/yourProjetctName/index.php?p=yourNewController.index</span>
                </pre>
            </div>

            <?= $content; ?>

        </main>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
       
        <script src="js/main_script.js"></script>

    </body>
</html>
