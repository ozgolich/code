<?php
if(isset($_POST['table_name']))
{
    require_once './includes.php';
    
    $table_name = $_POST['table_name'];

    $table_structure = mysql::get_structure_in_array($table_name);

    echo '<h3>'.$table_name.'</h3>';
    
    echo '<form action="save.php" method="post">';
    echo '<input type="hidden" name="table_name" value="'.$table_name.'"/>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>Поле</td>';
    echo '<td>Тип</td>';
    echo '<td>Значение</td>';
    echo '</tr>';
    
    foreach($table_structure as $field):
        
        $generate = new text();
        $field_value = $generate->generate_value($field['Type'], $field['Key'], $field['Field']);
        
        if($field['Field'] != 'id')
        {
            echo '<tr>';
            echo '<td>'.$field['Field'].'</td>';
            echo '<td>'.$field['Type'].'</td>';
            echo '<td><input name="'.$field['Field'].'" type="hidden" value="'.$field_value.'"/>'.$field_value.'</td>';
            echo '</tr>';
        }
        
    endforeach;
    
    echo '</table>';
    echo '<input type="submit" name="save" value="Сохранить"/>';
    echo '</form>';
    
}
else
{
    die('Access Denied');
}
?>
