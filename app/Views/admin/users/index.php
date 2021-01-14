<?php
    namespace App;
    session_start();
    require '../../app/Autoloader.php';
    //use app;
    Autoloader::register();

//Utilité de require c'est: juste pour permettre qu'on utilise une fonction Error() que s'y trouve.
require ('../../db/database.php');
require '../functionPHP.php';


/*---------------------------- attributs pour le login---------------------------------------*/
    $ErreurLog = $emailLog = $password = $Retour = $ClassLogin = "";
    $nom = $prenom  = $backindex = $reponse = $password1 = $password2 =$codesecret=$messageReturn= "";
/*------------------------------- attributs pour Sing-up -------------------------------------------*/

    $nom = $prenom = $email = $password1 = $password2=$codesecret = $reponse = $sexe = "";
    $_SESSION['ErrorSingup'] = $_SESSION['backindex'] =$_SESSION['classSing'] = $_SESSION['$classReturn'] = "";
    $testCompar =false;

/*-----------------------------------------------------------------------------------------*/

    $souvenir = false;
    //Verification de ckeckbox pour éviter le debug lors de soumission de données.
    if(isset($_POST['remember']))
    {
        $souvenir = true;
    }

/*-----------------------------------------------------------------------------------------*/
                                        //BOUTTON SE CONNECTER
/*-----------------------------------------------------------------------------------------*/

/* Verification de l'existe de POST(isset) et s'il n'est pas vide (!empty)sur la page
Pour la deuxième entrée, soit lorsqu'on clique sur Se Connecter (POST) entre en service*/
    if(isset($_POST) && !empty($_POST) && isset($_POST['connecte']) )
    {
        $DataOfUserToVerify = new utilisateur();
        $DataOfUserToVerify->setEmail($_POST['email']);
        $emailLog = $_POST['email'];
        $password = $_POST['password'];
        /* -----------Session ouvert tant que l'utilisateur est encore en ligne --------------*/
        $_SESSION['user'] =$_POST['email'];
        $_SESSION['password'] = md5($_POST['password']);

        //Deuxième entrée soit en cliquant sur valider(submit - POST)
        //Dexième verification par partie
      if(empty($emailLog ))
      {
        $ErreurLog = "Vérifier la case e-mail !!!";
        $ClassLogin = "alert alert-warning";
      }
      else if (empty($password)) 
      {
        $ErreurLog = "Vérifier la case password!!!";
        $ClassLogin = "alert alert-warning";
      }
      else 
      {
        //Cas que les deux champs sont remplies alors :
        //Renvoi sur une autre page.php pour faire les restes du travail

        // au cas où l'utilisateur valide le checkbox remember, on l'envoie en GET
        if($souvenir)
        {
          header('Location:ControlCMD.php?remember=true');
        }
        else 
        {
          header('Location:ControlCMD.php');
        }
      }

  }
  else 
  {
      //Plage des erreurs pour les coordonnées erronées
    
    if(isset($_SESSION['classSESSION']))
    {
        if(isset($_GET["userGET"]))
        {
            $emailLog = $_GET["userGET"];
        }
        $ClassLogin = "alert alert-danger";
        
        $classReturn = $_SESSION['classSESSION'];
        $messageReturn = $_SESSION['messageReturn'];
    }

}

/*------------------------------------------------------------------------------------------------*/
                                          /*ENREGISTRER*/
/* -----------------------------Pour le boutton Enregistre -------------------------------------- */
if(isset($_POST) && !empty($_POST) && isset($_POST['Enregistrer']))
{
    $verificateur = true;
    $nom = verifyInput($_POST['firstname']);
    $prenom = verifyInput($_POST['lastname']);
    $email = verifyInput($_POST['email']);
    $pass1 = md5($_POST['password1']);
    $reponse = verifyInput($_POST['securityA']);
    $sexe = verifyInput($_POST['sexe']);
    $codesecret = verifyInput($_POST['codesecret']);

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
      $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." La case Réponse de sécurité est vide";
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
  }else if(empty($_POST['codesecret']))
  {
      $_SESSION['classSing'] = "alert alert-warning";
      $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." Vous êtes autorisé(e) de vous enregistre mais comme user!";
  }
  //-------------------------------------------------------------------------------------------
  //verification si l'utilisateur a tout rempli puis si le codesecret est non null
  //-------------------------------------------------------------------------------------------

  if($verificateur && $codesecret)
  {
    $db = Database::connect();
    //Requete pour la vérification de l'existance de code secret
    $statement = $db->prepare("SELECT idadmin,id_code_secret,code_secret from administrateur
                                inner JOIN niveau_acess  on codesecret=id_code_secret
                                where code_secret=? and etat is null;");
    $statement->execute(array($codesecret));
    $item = $statement->fetch();
    //-------------------------------------------------------------------------------------------
    $confirmation = $item['code_secret'];
    $id_code_secret = $item['id_code_secret'];
    $idadmin = $item['idadmin'];
    Database::disconnect();
    //-------------------------------------------------------------------------------------------

    if($confirmation && $confirmation == $codesecret)
    {
      $db = Database::connect();
      //Actualisation de table administrateur où l'utilisateur possède un code_secret valide puis...
      $statement = $db->prepare('UPDATE administrateur SET nom=?, prenom=?,email=?,motdepass=?,reponse=?,sexe=?, dateregistre=NOW(),avatar=NULL,emailsend=0
      WHERE idadmin = ? and codesecret=?; ');
      $statement->execute(array($nom,$prenom,$email,$pass1,$reponse,$sexe,$idadmin,$id_code_secret));
      //-------------------------------------------------------------------------------------------
      //(suite) Mise en jour de table niveau_acess pour activer l'état de l'utilisateur qui vient d'activer son compte
      $statement = $db->prepare("UPDATE niveau_acess SET etat='active' WHERE id_code_secret=? ");
      $statement->execute(array($id_code_secret));
      //-------------------------------------------------------------------------------------------
      $_SESSION['classSing'] = "alert alert-success";
      $_SESSION['ErrorSingup'] = '<span><strong>INFOS:</strong></span>'." Félicitations! vous êtes enregistré(e) tant que administrateur(trice)!";
      $nom = $prenom = $email = $password1 = $password2 = $reponse =$codesecret= "";
      Database::disconnect();
    }else {
      //Si le code secret de l'utilisateur
      $_SESSION['classSing'] = "alert alert-warning";
      $_SESSION['ErrorSingup'] = '<span><strong>ERREUR:</strong></span>'." Vous êtes autorisé(e) de vous enregistre comme user, 'Code secret erroné' soit vous êtes déjà actif(ve)!";
    }

  }elseif ($verificateur) {
      //Enregistrement pour tout utilisateur qui ne possède pas un code secret
      $db = Database::connect();
      $statement = $db->prepare("INSERT INTO users (nom,prenom,email,motdepass,reponse,Sexe) VALUES(?,?,?,?,?,?); ");
      $statement->execute(array($nom,$prenom,$email,md5($pass1),$reponse,$sexe));
      //-------------------------------------------------------------------------------------------
      $_SESSION['classSing'] = "alert alert-success";
      $_SESSION['ErrorSingup'] = '<span><strong>INFOS:</strong></span>'." Félicitations pour votre registre! User";
      $nom = $prenom = $email = $password1 = $password2 = $reponse =$codesecret= "";
      Database::disconnect();
  }

}


?>

<!DOCTYPE html>
<html>
  <head>
    <style>
        body{
              background-image: url(images/bouteille..jpg)!important;
              background-repeat: no-repeat;
          }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>projet campus</title>
    <!--JQuery_Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <!--CSS_Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Javascript_Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

  </head>
  <body>
    <div class="container">

      <div class="cont">

        <div class="col-md-5 col-sm-7 col-xs-12">
            <div class="bloc1">
                <h3>Déjà utilisateur</h3>
            </div>

            <div class=" bloc">

                <div class="<?php echo $ClassLogin; ?>" id="erreur">

                <p class="warning">
                    <?php echo  $ErreurLog; ?>
                </p>
                <p class="warning">
                    <?php echo  $messageReturn; ?>
                </p>
            </div>

              <form class="formulaire" action="index.php" method="post">

                <div id="email">
                  <input type="text" class="form-control" name="email" value="<?php echo $emailLog; ?>" placeholder="Email" >
                </div>

                <div id="password">
                  <input type="password" class="form-control" name="password" value="" placeholder="password" >
                </div>

                <div class="">
                    <button type="submit" class="btn btn-default valider" name="connecte">SE CONNECTER</button>
                  </div>

                <div class="souvenir">
                    <input type="checkbox" name="remember">
                    <span  id="remember">
                      <span>Se souvenir de moi</span><br>
                      <a href="#">Mot de passe oublié ?</a>
                    </span>
                    <a href="../../index.php">home</a>
                  </div>

              </form>

            </div>
        </div>

        <div class="col-md-5 col-sm-7 col-xs-12 ">

            <div class=" bloc1">
                <h3>Créez votre compte</h3>
            </div>

            <div class="bloc creercompte" >
                <div class="row " id="admin">
                    <div style="border-left:2px solid lightblue;width:90%;margin:0 auto;" class="<?php echo $_SESSION['classSing'];?>" id="erreur">
                        <p class="warning">
                            <?php echo  $_SESSION['ErrorSingup'].$_SESSION['backindex']; ?>
                        </p>
                    </div>
                    <div class="col-lg-12 " id="admin3">

                        <form class="form" action="index.php" method="post">

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
                                <label>Confirmez votre Mot de passe</label><input class="form-control" type="password" name="password2" placeholder="Confirmation de Mot de passe" value="<?php echo $password2; ?>">
                            </div>

                            <div class="form-group">
                                <label>Répondez à une question inconnue</label><input class="form-control" type="text" name="securityA" placeholder="Reponse" id="reponse" value="<?php echo $reponse; ?>">
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
                                <label>Code secret</label><input class="form-control" type="text" name="codesecret" placeholder="Tapez votre code reçu" value="<?php echo $codesecret; ?>">
                            </div>
                            <div class="">
                                <button type="submit" name="Enregistrer" class="btn btn-default valider" id="sumettre">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      </div>
  </body>
</html>
