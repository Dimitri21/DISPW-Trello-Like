<?php  
    session_start();
    require ('../connect/database.php');

    $email = $reponse = "";
    $_SESSION['ErrorForgot'] = $_SESSION['ClassForgot'] = "";
    $verificateur =false;
    $tableau = array("email"=>"","reponse"=>"","IsSended"=>"");
    $emailTo ="duramana.kalumvuati@laposte.net";

    if(isset($_POST) && !empty($_POST))
    {
        $email   = verifyInput($_POST['email']);
        $reponse = verifyInput($_POST['securityA']);
        $_SESSION['ClassForgot'] = "alert alert-danger";
        $verificateur = true;
        
        if(empty($email))
        {
             $_SESSION['ErrorForgot'] = '<span><strong>ERREUR:</strong></span>'." La case email est vide";
            $verificateur = false;
        }else if(empty($reponse))
        {
             $_SESSION['ErrorForgot'] = '<span><strong>ERREUR:</strong></span>'." La case réponse secrete est vide";
            $verificateur = false;
        }else
        {
           $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM users WHERE email='$email' AND reponse='$reponse'; ");
            $statement->execute(); 
            $item = $statement->fetch();

            if(!empty($item['email']) && !empty($item['reponse']))
            {
                $emailText  = $item['nom']." ".$item['prenom']."\nE-mail: ".$item['email']."\nVotre mot de passe:".$item['motdepass']."\n\n\nVeillez ne pas repondre à cet e-mail, car c'est une réponse automatique\n\nCordialement.";
                
                //Entête d'e-mail envoyé
                $headers = "From: {$item['nom']} {$item['prenom']} <{$item['email']}>\r\nReplay-To: {$emailTo}";
                
        mail($item['email'], "Demande de mot de passe oublie",$emailText,$headers);
                
                $_SESSION['ClassForgot'] = "alert alert-success";
                $_SESSION['ErrorForgot'] = '<span><strong>INFOS:</strong></span>'." Veuillez vérifiez votre e-mail, dans lesquel se trouve votre mot de passe"."<b> Félicitations!";
                
            }
            else
                {
                     $_SESSION['ErrorForgot'] = '<span><strong>ERREUR:</strong></span>'." Dommage, vos coordonnées me semblent incorrectes!!!";
                }
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
    <link rel="stylesheet" href="style/style_user.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
</head>

<body>
    <div class="container">
        <div class="row " id="admin">

            <div style="border-left:2px solid lightblue;width:450px;" class="<?php echo $_SESSION['ClassForgot'];?>" id="erreur">
                <p class="warning">
                    <?php echo  $_SESSION['ErrorForgot']; 
                    ?>
                </p>
            </div>

            <div class="col-lg-12 " id="admin3">
                <form class="form " action="passwordForgot.php" method="post">
                    <div>
                        <label>E-mail</label>
                        <div class="input-group form-group">
                            <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Réponse de sécurité</label><input class="form-control" type="text" name="securityA" placeholder="Reponse" value="<?php echo $reponse; ?>">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <button type="submit" name="Enregistrer" class="btn btn-info">Demander</button>
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
