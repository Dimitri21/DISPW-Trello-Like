<?php

namespace Core\HTML;

class Form
{

    /**
     * @var array Données utilisées par le formulaire
     */
    private $Data;
    /**
     *@var string Tag pour entourer le les champs
     */
    private $surround = 'p';
    /**
     *@param array $data pour les formulaires
     */
    public function __construct($data=array())
    {
        $this->Data = $data;
    }
    /**
     * @param $html $data pour les formulaires
     * @return string
     */
    public function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     *@param $index de la valeur à recuperer dans le table $data
     *@return
     */
    protected function getValue($index)
    {
        if(is_object($this->Data))
        {
            return $this->Data->$index;
        }
        return isset($this->Data[$index])?$this->Data[$index]:null;
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name,$label,$options = [])
    {
        $type = isset($options['type'])?$options['type']:"text";
        return $this->surround('<input type="'.$type.'" name="'.$name.'" placeholder="Tapez votre '.$name.'" value="'.$this->getValue($name).'">');
    }


    /**
     *@return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" name="valider">Soumettre</button>');
    }
}

?>