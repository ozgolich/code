<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mysql
 *
 * @author o.zgolich
 */
class mysql {
   
    public static function get_result_in_array($resource)
    {
        $array = array();
        
        while($value = mysql_fetch_array($resource))
        {
            $array[] = $value;
        }
        
        return $array;
    }
    
    public static function get_structure_in_array($table_name)
    {
        $structure = mysql_query('describe `'.$table_name.'`');
        
        return self::get_result_in_array($structure);
    }
    
    public static function get_rows_and_types_in_array($table_structure)
    {
        $rows_and_types = array();
        
        foreach($table_structure as $table_structure_data)
        {
            $rows_and_types[$table_structure_data['Field']] = $table_structure_data['Type'];
        }
       
        return $rows_and_types;
    }
    
    public static function get_keys_in_array($table_structure)
    {
        $keys_and_types = array();
        
        foreach($table_structure as $table_structure_data)
        {
            if($table_structure_data['Key'])
            {
                $keys_and_types[$table_structure_data['Field']] = $table_structure_data['Key'];
            }
        }
       
        return $keys_and_types;
    }
    
    public static function get_count_rows_in_table($table_name)
    {
        return mysql_num_rows(mysql_query('select * from '.$table_name));
    }
    
    public static function get_table_names_in_array($tables)
    {
        $tables_list = array();
        
        foreach($tables as $table)
        {
            $tables_list[$table[0]] = $table[0];
        }
        
        return $tables_list;
    }
    
    public static function insert($post_data)
    {
        $query = 'insert into '.$post_data['table_name'].' '; 
        
        $fields = '(';
        $values = ' values(';
        
        unset($post_data['save']);
        unset($post_data['table_name']);
        
        $i = 0;
        
        foreach($post_data as $key => $value)
        {
            if ($i < count($post_data )- 1)
            {
                $fields .= '`'.$key.'`, ';
                $values .= '"'.$value.'", ';
                $i++;
            }
            else
            {
                $fields .= '`'.$key.'`';
                $values .= '"'.$value.'"';
            }
        }
        
        $fields .= ')';
        $values .= ')';
        
        $query .= $fields.$values;
       
        if(mysql_query($query))
        {
            return TRUE;
        }
        
        die('Access denied');
    }
}

?>
