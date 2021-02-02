<?php

class SprintoDatabase
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    //Constructeurs

    /**
     * MysqlDatabase constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->db_name = $config['db_name'];
        $this->db_user = $config['db_user'];
        $this->db_pass = $config['db_pass'];
        $this->db_host = $config['db_host'];
    }

    /*
    *Function :getPDO() String
    * une connexion dans une base de données
    */
    private function getPDO($db_name)
    {
        if($this->pdo === null)
        {

            //$pdo = new PDO('mysql:dbname='.$db_name.';host=localhost;charset=utf8','tutofree_tutofree','Hackerangola1');

            $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$this->db_host,$this->db_user,$this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement,$class_name=null,$one = false)
    {

        $requette = $this->getPDO($this->db_name)->query($statement);


        if(strpos($statement,'UPDATE')=== 0 || strpos($statement,'INSERT')=== 0 || strpos($statement,'DELETE')=== 0)
        {
            return $requette;
        }


        if($class_name === null)
        {
            $requette->setFetchMode(PDO::FETCH_OBJ);
        }else
        {
            $requette->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }

        if($one)
        {
            return $requette->fetch();
        }else
        {

            return $requette->fetchAll();

        }
        // return $data;

    }

    public function prepare($statement,$attributes,$class_name=null,$Isone=false)
    {
        $requette = $this->getPDO($this->db_name)->prepare($statement);
        $resultat = $requette->execute($attributes);

        if(strpos($statement,'UPDATE')=== 0 || strpos($statement,'INSERT')=== 0 || strpos($statement,'DELETE')=== 0)
        {
            return $resultat;
        }

        if($class_name === null)
        {
            $requette->setFetchMode(PDO::FETCH_OBJ);
        }else
        {
            $requette->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }

        if($Isone)
        {
            $data = ($requette->fetch());
        }else
        {
            $data = ($requette->fetchAll());
        }
        return $data;
    }

    public function lastInsertID()
    {
        return $this->getPDO()->lastInsertId();
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->db_name;
    }

}