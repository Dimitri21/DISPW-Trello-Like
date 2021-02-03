<?php


namespace app;

use app\Database\SprintoDatabase;

class Repository
{

    protected $table;

    protected $db;

    /**
     * Repository constructor.
     * @param SprintoDatabase $db
     */
    public function __construct(SprintoDatabase $db)
    {
        $this->db = $db;
        if($this->table === null )
        {
            $parts = explode('\\',get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Repository','',$class_name));
        }
    }

    /**
     * @return mixed
     */
    public  function  all()
    {
        return $this->query('SELECT * FROM '.$this->table);
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one : false = more and true = one
     * @return mixed
     */
    public function query($statement, $attributes = null,$one = false)
    {
        $class = get_class($this);

        if($attributes) {

            return $this->db->prepare($statement,
                $attributes,
                str_replace('Repository', 'Entity',$class ),
                $one);
        }else
        {
            return $this->db->query($statement,
                str_replace('Repository', 'Entity', $class),
                $one);
        }
    }

    /**
     * @param $id
     */
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ? ",[$id],true);
    }

    /**
     * @param $id
     * @param $fieds
     * @return mixed
     */
    public function update($id,$fieds)
    {
        //preparations aux champs de ma requette sql
        $sql_parts = [];
        $attributes = [];
        foreach ($fieds as $k => $v)
        {
            $sql_parts[] = "$k = ?";
            $attributes [] = $v;
        }

        $attributes [] = $id;

        $sql_part = implode(',',$sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ? ",$attributes,true);

    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function list_extractBy($modules,$key,$value)
    {
        $return = [];

        foreach ($modules as $v)
        {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function list_extract($key,$value)
    {
        $records = $this->fiall();
        $return = [];

        foreach ($records as $v)
        {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

}