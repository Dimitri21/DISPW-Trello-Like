<?php
    namespace App;
    
    session_start();
    require '../../app/Autoloader.php';
    require '../functionPHP.php';
    
    // use app;
    Autoloader::register();
    
//declaration de la session_start() pour activer la Super variable global
    $_SESSION['classSESSION'] = "";

//Incusion de pages utiles pour Hériter les fonctions qui s'y trouvent


//Vérification de GET pour entre sur de son existance
$cookie =false;
if(isset($_GET['remember']))
{
  $cookie =true;
}


/* ----------------------------CHECK $_SESSION  et La Connection Normale  ---------------------
        VERIFICATION DES COORDONNEES FOURNIES PAR L'UTILISATEUR SOUHAITANT SE CONNECTER
----------------------------------------------------------------------------------------------*/
if(isset($_SESSION['DataOfUserToCheck']) && !empty($_SESSION['DataOfUserToCheck']))
{
  /*--------affectation des variables, elle est optionnale------------------*/
  
    $DataOfUserToCheck = fixObject($_SESSION['DataOfUserToCheck']);
    
    /*suppresion temporaire de session enfin d'oublier 
    toutes les coordonn�es qui s'y trouvent
    */
    session_unset();
    
  /*-------------------------------------------------------------------------------------------
                                 1. VERIFICATION D'UN UTILISATEUR SIMPLE
  -------------------------------------------------------------------------------------------*/
      $db = Database::connect();
      $statement = $db->prepare('SELECT prenom,email , motdepass , Sexe FROM users  WHERE email= ? and motdepass=?; ');
      $statement->execute(array($DataOfUserToCheck->getEmail(),$DataOfUserToCheck->getPassword()));
      $item = $statement->fetch();
      
      
      //Vérification si la requette est incorrecte
      if(!empty($item))
      {
          $DataOfUserToCheck->setPrenom($item['prenom']);
          $DataOfUserToCheck->setSexe($item['Sexe']);
          $DataOfUserToCheck->setNiveauAcces("user");
          
          if ($cookie) {
              setcookie('email',$email,time() + 365*24+3600, null, null, false, true);
              setcookie('password',md5($password),time() + 365*24+3600, null, null, false, true);
          }
          $_SESSION['Online'] = $DataOfUserToCheck;
          header('Location:../Utilisateur/index.php?prenom='.$item['prenom'].'');
      }else
      {
        /*-------------------------------------------------------------------------------------------
          2. VERIFICATION DE COORDONNEES DE SUPER - USER
        -------------------------------------------------------------------------------------------*/
        $statement = $db->prepare('SELECT a.idadmin,a.nom,a.prenom,a.email,a.motdepass,a.sexe,a.dateregistre,a.avatar,a.active,n.etat
                                  from administrateur a
                                  inner JOIN niveau_acess n
                                  on a.codesecret=n.id_code_secret
                                  WHERE a.email=? and motdepass=?; ');
        
        $statement->execute(array($DataOfUserToCheck->getEmail(),$DataOfUserToCheck->getPassword()));
        $item = $statement->fetch();
        
          //V�rification de validit�
          
          if(!empty($item))
          {
            //Infos personnels sur le super utilisateur
               
              $DataOfUserToCheck->setId($item['idadmin']);
              $DataOfUserToCheck->setNom($item['nom']);
              $DataOfUserToCheck->setEmail($item['email']);
              $DataOfUserToCheck->setSexe($item['sexe']);
              $DataOfUserToCheck->setPrenom($item['prenom']);
              $DataOfUserToCheck->setPassword($item['motdepass']);
              $DataOfUserToCheck->setSexe($item['sexe']);
              $DataOfUserToCheck->setDateregistre($item['dateregistre']);
              $DataOfUserToCheck->setAvatar($item['avatar']);
              $DataOfUserToCheck->setActive($item['active']);
              $DataOfUserToCheck->setEtat($item['etat']);

           

                //Formations Academiques--------------------------------------------
                $statement = $db->prepare('SELECT user_id, date_debut,date_fin,formation,Lieu_de_formation
                                          from formatio_acam
                                          inner JOIN administrateur
                                          on idadmin=user_id WHERE idadmin=?; ');
                $statement->execute(array($DataOfUserToCheck->getId()));
                $item = $statement->fetch();
                
                $DataOfUserToCheck->setDate_debut($item['date_debut']);
                $DataOfUserToCheck->setDate_fin($item['date_fin']);
                $DataOfUserToCheck->setFormation($item['formation']);
                $DataOfUserToCheck->setLieuDeFormation($item['Lieu_de_formation']);
    
                //-----------------------------------------------------------------------------
                                              //profile_user
                //-----------------------------------------------------------------------------
                $statement = $db->prepare('SELECT p.date_naiss,p.etat_civil,p.etat_id,py.pays,p.email,p.tel_portable,p.website,p.profission
                                            FROM profile_user p
                                            inner join administrateur a on a.idadmin=p.user_id
                                            INNER JOIN pays py on py.code_etat=p.pays_id
                                            WHERE p.user_id=1; ');
                $statement->execute(array($DataOfUserToCheck->getId()));
                $item = $statement->fetch();
    
                $DataOfUserToCheck->setDateNaiss($item['date_naiss']);
                $DataOfUserToCheck->setEtatCivil($item['etat_civil']);
                $DataOfUserToCheck->setPays($item['pays']);
                $DataOfUserToCheck->setPhone($item['tel_portable']);
                $DataOfUserToCheck->setWebSite($item['website']);
                $DataOfUserToCheck->setProfession($item['profission']);
                $DataOfUserToCheck->setEtat('connected');
                $_SESSION['Online'] = $DataOfUserToCheck;
        
                echo "DataOfUserTOCHeck";
                
                if ($cookie)
                {
                    setcookie('email',$DataOfUserToCheck->getEmail(),time() + 365*24+3600, null, null, false, true);
                    setcookie('password',$DataOfUserToCheck->getPassword(),time() + 365*24+3600, null, null, false, true);
                }
            
               header('Location:../profile.php');
              //Renvoie le nom de l'user et son e-mail à la page suivante (Count)
              

            }else if(!empty($DataOfUserToCheck->getEmail()) || !empty($DataOfUserToCheck->getPassword()))
              {
                $_SESSION['classSESSION'] = "alert alert-danger";
                $_SESSION['messageReturn'] = "Une de vos coordonnées est incorrecte";
              //Renvoi mes informations par le super global (GET)
                header('Location:index.php?userGET='.$DataOfUserToCheck->getEmail().'');
                
              }else if(!empty($DataOfUserToCheck->getEmail()) || empty($DataOfUserToCheck->getPassword()))
              {
                  header('Location:index.php?userGET='.$DataOfUserToCheck->getEmail().'');
              }
        }
        
}else 
{
    /*
     * AUCUN UTILISATEUR CONNECTE DONC ON RETOUR LOGIN OU SOIT HOME
     * */
    session_destroy();
    header('Location:index.php');
    //var_dump($_SESSION);
}





    //Database::disconnect();
?>
