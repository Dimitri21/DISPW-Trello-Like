<?php
    session_start();
    require ('../../../db/database.php');

    $nom = $prenom = $email = $password1 = $password2 = $reponse = $sexe = "";
    $_SESSION['ErrorSingup'] = $_SESSION['backindex'] =$_SESSION['classSing'] = "";
    $testCompar =false;

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

            Database::desconnect();
            $_SESSION['classSing'] = "alert alert-success";
            $_SESSION['ErrorSingup'] = '<span><strong>INFOS:</strong></span>'." Félicitations pour votre registre!";
            $nom = $prenom = $email = $password1 = $password2 = $reponse = "";
            var_dump("Sauvergdé");

        }
    }

var_dump("Je suis encore hors service");
function Compare($var1,$var2)
{
    if($var1 === $var2)
        return true;
    else
        return false;
}

session_close();

?>
