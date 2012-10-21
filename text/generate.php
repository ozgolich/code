<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generate
 *
 * @author o.zgolich
 */
class text_generate {
    //put your code here
    
    protected function geenrateNum()
    {
        return rand(100, 99999999999);
    }
    
    protected function generateString()
    {
        $length = rand(20, 250);
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ1234567890';
        $numChars = strlen($chars);
        $string = '';
        
        for ($i = 0; $i < $length; $i++) 
        {
          $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }
    
    protected function generateDatetime()
    {
        $day = rand(1, 28);
        $month = rand(1, 12);
        $year = rand(2000, 2012);
        $hour = rand(0, 24);
        $minute = rand(0, 60);
        $second = rand(0, 60);
        
        $datestr = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second;
        
        $time = strtotime($datestr);
        
        return date('Y-m-d H:i:s', $time);
    }
    
    protected function generateConstraintId($field_name)
    {
        $table_name = str_replace('_id', '', $field_name);

        if($this->check_table($table_name))
        {
            return $this->get_ids_array($table_name);   
        }
        else
        {
            if($this->check_table($table_name.'s'))
            {
                return  $this->get_ids_array($table_name.'s');
            }
            return 'NULL';
        }
    }
    
    private function get_ids_array($table_name)
    {
        $ids = mysql::get_result_in_array(mysql_query('select * from `'.$table_name.'`'));
        
        $id_list = array();
        
        foreach($ids as $id)
        {
            $id_list[$id['id']] = $id['id'];
        }
        
        return array_rand($id_list);
    }
    
    private function check_table($table_name)
    {
        $query = mysql_query('select * from `'.$table_name.'` limit 1');
        
        if($query) 
        {
            return TRUE;
        }
        return FALSE;
    }
}

?>
