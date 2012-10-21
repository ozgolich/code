<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of text
 *
 * @author o.zgolich
 */

require_once './text/generate.php';

class text extends text_generate{
    //put your code here
    
    public function generate_value($field_type, $key, $field_name)
    {
        if($key)
        {
            return $this->get_constraint_id($field_name);
        }
        elseif(preg_match('|int|isuU', $field_type))
        {
            return $this->get_int_value();
        }
        elseif(preg_match('|varchar|isuU', $field_type) || preg_match('|text|isuU', $field_type))
        {
            return $this->get_text_string();
        }
        elseif(preg_match('|datetime|isuU', $field_type))
        {
            return $this->get_datetime();
        }
    }
    
    private function get_constraint_id($field_name)
    {
        return $this->generateConstraintId($field_name);
    }
    
    private function get_datetime()
    {
        return $this->generateDatetime();
    }
    
    private function get_text_string()
    {
        return $this->generateString();
    }
    
    private function get_int_value()
    {
        return $this->geenrateNum();
    }
}

?>
