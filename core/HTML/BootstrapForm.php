<?php
namespace Core\HTML;
/**
 * We don't haver to use bootstrap
 */

class BootstrapForm extends Form
{

    /**
     * @param $html $data pour les formulaires
     * @return string
     */
    public function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div}>";
    }

    /**
     * @param pour $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name,$label,$options = [])
    {
        $type = isset($options['type'])?$options['type']:"text";
        $label = '<label>'.ucfirst($label).'</label>';
        $input = '<p><input type='.$type.' name="'.$name.'" class="form-control" placeholder="Tapez votre '.$name.'" value="'.$this->getValue($name).'"></p>';

        if($type === "textarea")
        {
            $input = '<p><textarea name="'.$name.'" class="form-control">'.$this->getValue($name).'</textarea></p>';
        }

        return $this->surround($label.$input);
    }

    /**
     *@return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" name="valider" class="btn btn-primary">Soumettre</button>');
    }

    /**
     * @param $name
     * @param $label
     * @param $option
     */
    public function  select($name, $label, $option)
    {
        $label = '<label>'.ucfirst($label).'</label>';
        $input = "<select class='form-control' name='$name'>";


        foreach ($option as $k => $v)
        {
            $attributes ='';
            if($k == $this->getValue($name))
            {
                $attributes = 'selected';
            }
            $input .="<option value='$k' $attributes>$v</option> ";
        }
        $input .='</select>';

        return $this->surround($label.$input);
    }
}

 ?>