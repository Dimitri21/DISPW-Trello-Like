<?php
namespace Core\Auth;
use Core\Database\Database;

class DatabaseAuth
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */

    public function loginUser($email, $password)
    {
        /*$user = $this->db->prepare("SELECT * FROM utilisateur WHERE email = ? ",[$email],null,true);

        if($user)
        {
            if($user->password ===md5($password))
            {
                $_SESSION["user"] = $user->idUtilisateur;
                $_SESSION["nom"] = $user->nom;
                return true;
            }
        }

        return false;*/

    }

    /**
     * @return bool
     */
    public function logged()
    {
        /*return isset($_SESSION['user']) ||isset($_SESSION['formateur']) || isset($_SESSION['admin']);*/
    }

}