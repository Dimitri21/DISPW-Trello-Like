<?php
    session_start();
    require ('../../../db/database.php');

    $nom = $prenom = $email = $password1 = $password2 = $reponse = $sexe = "";
    $_SESSION['ErrorSingup'] = $_SESSION['backindex'] =$_SESSION['classSing'] = "";
    $testCompar =false;
    //var_dump($_POST['sexe']);

    if(isset($_POST) && !empty($_POST))
    {
            $nom = verifyInput($_POST['firstname']);
            $prenom = verifyInput($_POST['lastname']);
            $email = verifyInput($_POST['email']);
            $pass1 = verifyInput($_POST['password1']);
            $reponse = verifyInput($_POST['securityA']);
            $sexe = verifyInput($_POST['sexe']);

        $verificateur = true;


        if(empty($_POST['firstname']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
             $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Nom est vide";
            $verificateur = false;

        }else if(empty($_POST['lastname']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
            $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Prénom est vide";
            $verificateur = false;

        }else if(empty($_POST['email']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
             $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case email est vide";
            $verificateur = false;

        }else if(empty($_POST['password1']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
             $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Password1 est vide";
            $verificateur = false;

        }else if(empty($_POST['password2']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
             $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Password de confirmation est vide";
            $verificateur = false;

        }else if(empty($_POST['securityA']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
             $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Reponse de sécurité est vide";
            $verificateur = false;

        }else if(!(Compare($_POST['password1'],$_POST['password2'])))
        {
            $_SESSION['classSing'] = "alert alert-warning";
            $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." Mots de passe sont différents";
            $verificateur = false;
        }else if(empty($_POST['sexe']))
        {
            $_SESSION['classSing'] = "alert alert-warning";
            $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." Choisissez votre sexe";
            $verificateur = false;
        }

        if($verificateur)
        {
            $nom = verifyInput($_POST['firstname']);
            $prenom = verifyInput($_POST['lastname']);
            $email = verifyInput($_POST['email']);
            $pass1 = verifyInput($_POST['password1']);
            $reponse = verifyInput($_POST['securityA']);
            $sexe = verifyInput($_POST['sexe']);

            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO users (nom,prenom,email,motdepass,reponse,Sexe) VALUES(?,?,?,?,?,?); ");
            $statement->execute(array($nom,$prenom,$email,$pass1,$reponse,$sexe));

            $_SESSION['classSing'] = "alert alert-success";
            $_SESSION['ErrorSingup'] = '<span><strong>INFOS:</strong></span>'." Félicitations pour votre registre!";
            $nom = $prenom = $email = $password1 = $password2 = $reponse = "";

        }
    }

function Compare($var1,$var2)
{
    if($var1 === $var2)
        return true;
    else
        return false;
}



?>
<!DOCTYPE html>
<html>

<head>
    <!--JQuery_Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <!--CSS_Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Javascript_Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script type="text/javascript" src="script/script.js">

    </script>
    <link rel="stylesheet" href="style/style_user.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
</head>

<body>
    <div class="container">
        <div class="row " id="admin">

            <div style="border-left:2px solid lightblue;width:450px;" class="<?php echo $_SESSION['classSing'];?>" id="erreur">
                <p class="warning">
                    <?php echo  $_SESSION['ErrorSingup'].$_SESSION['backindex']; ?>
                </p>
            </div>

            <div class="col-lg-12 " id="admin3">
                <form class="form " action="singup.php" method="post">
                    <div class="form-group">
                        <label>Nom</label><input class="form-control" type="text" name="firstname" placeholder="Nom" value="<?php echo $nom; ?>">

                        <label>Prénom</label><input class="form-control" type="text" name="lastname" placeholder="Prénom" value="<?php echo $prenom; ?>">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label><input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label><input class="form-control" type="password" name="password1" placeholder="Mot de passe" value="<?php echo $password1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label><input class="form-control" type="password" name="password2" placeholder="Mot de passe" value="<?php echo $password2; ?>">
                    </div>
                    <div class="form-group">
                        <label>Réponse de sécurité</label><input class="form-control" type="text" name="securityA" placeholder="Reponse" id="reponse" value="<?php echo $reponse; ?>">
                    </div>
                    <div class="">
                      <div class="">
                        <p style="font-weight:bold";>Vous êtes :</p>
                      </div>
                      <select class="form-control" name="sexe" id ="genre" style="width:150px;">
                        <option value="1"> Femme</option>
                        <option value="2"> Homme</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <button type="submit" name="Enregistrer" class="btn btn-info" id="sumettre">Enregistrer</button>
                        </div>
                        <div class="form">
                            <a href="../index.php"><span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</body>

</html>
