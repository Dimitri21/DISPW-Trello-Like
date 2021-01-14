<?php
namespace Core\Table;

use Core\Database\Database;

class Table
{

    protected $table;
    protected $db;

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if($this->table === null )
        {
            $parts=explode('\\',get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table','',$class_name)).'s';
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
    public function query($statement, $attributes =null,$one=false)
    {
        $class=get_class($this);

        if($attributes) {

            return $this->db->prepare($statement,
                $attributes,
                str_replace('Table', 'Entity',$class ),
                $one);
        }else
        {
            return $this->db->query($statement,
                str_replace('Table', 'Entity', $class),
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
     */
    public function findAll($id)
    {
        return $this->query("SELECT * FROM {$this->table} t inner  join etoiles e on t.idtutoriel = e.idEtoile. ",[$id],true);
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
     * @param $id
     * @param $fieds
     * @return mixed
     * @resume spécialement pour certaine table dont le id est différent
     */
    public function updateTutoriels($id,$fieds)
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
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id_tuto = ? ",$attributes,true);

    }

    /**
     * @resum fonction qui fait actualisation de Module
     * @param $id
     * @param $fieds
     * @return mixed
     */
    public function updateModules($id,$fieds)
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
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id_module = ? ",$attributes,true);
    }


    /**
     * @param $fieds
     * @return mixed
     */
    public function insert($fieds)
    {
        //preparations aux champs de ma requette sql
        $sql_parts = [];
        $attributes = [];
        foreach ($fieds as $k => $v)
        {
            $sql_parts[] = "$k = ?";
            $attributes [] = $v;
        }



        $sql_part = implode(',',$sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part ",$attributes,true);

    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function list_extract($key,$value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v)
        {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    public function delete($id)
    {

        return $this->query("DELETE FROM {$this->table} WHERE id = ? ",[$id],true);

    }

    public function deleteTutoriels($id)
    {

        return $this->query("DELETE FROM {$this->table} WHERE id_tuto = ? ",[$id],true);

    }

}

?>