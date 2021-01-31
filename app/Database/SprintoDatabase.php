<?php


namespace app\Database;


class SprintoDatabase
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct(array $dbInfos)
    {
        $this->db_name = $dbInfos['db_name'];
        $this->db_user = $dbInfos['db_user'];
        $this->db_pass = $dbInfos['db_pass'];
        $this->db_host = $dbInfos['db_host'];
    }

    /**
     * @param string $db_name
     * @return PDO instance PHP PDO
     */
    private  function getPDO(string $db_name) {

        if (is_null($this->pdo)) {
            $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$this->db_host,$this->db_user,$this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query(string $statement, string $class_name = null, bool $one = false)
    {

        $requete = $this->getPDO($this->db_name)->query($statement);

        //Used for simple statement and to get response as array
        if(strpos($statement,'UPDATE') === 0 ||
            strpos($statement,'INSERT')=== 0 ||
            strpos($statement,'DELETE') === 0)
        {
            return $requete;
        }

        if($class_name === null)
        {
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else
        {
            $requete->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }

        //Used to get response like classe instance
        if($one)
        {
            //for one element
            return $requete->fetch();
        }else
        {
            //Fetch all
            return $requete->fetchAll();
        }
    }

    public function getDBName()
    {
        return $this->db_name;
    }
}