<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form
 *
 * @author o.zgolich
 */
class form {
    //put your code here
    
    public static function select($select_name, $select_data)
    {
        $select = '<select name="'.$select_name.'">';

        foreach($select_data as $value => $name)
        {
            $select .= '<option value="'.$value.'">'.$name.'</option>';
        }
        
        $select .= '</select>';
        
        return $select;
    }
}

?>
