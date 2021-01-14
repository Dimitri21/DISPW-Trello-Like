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
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($email, $password)
    {
        $user = $this->db->prepare("SELECT * FROM users WHERE email = ? ",[$email],null,true);

        if($user)
        {
            if($user->motdepass === md5($password))
            {
                $_SESSION["auth"] = $user->idadmin;
                return true;
            }

        }

        return false;
    }

    /**
     * @return bool
     */
    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    /**
     * @return bool
     */
    public function getUserId()
    {
        if($this->logged())
        {
            return $_SESSION['auth'];
        }
        return false;//null
    }
}