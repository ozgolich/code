<?php

require_once './includes.php';

$dbinfo = mysql_query('show tables');

$tables = mysql::get_result_in_array($dbinfo);

$tables_structure = array();

foreach($tables as $table_name)
{
    $tables_structure[$table_name[0]][] = mysql::get_structure_in_array($table_name[0]);
}

?>
<html>
    <head>
        <title>Информация о базе</title>
        <style>
            table tr td{
                padding: 6px;
            }
        </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
    <body>
        <h1>Структура базы</h1>
        <table border="1">
            <tr>
                <td>Имя</td>
                <td>Поле/тип</td>
                <td>Ключи</td>
                <td>Количество <br/>записей <br/>в таблице</td>
            </tr>
            <?php foreach($tables_structure as $table_name => $table_structure):?>
            <tr>
                <td><?php echo $table_name;?></td>
                <td>
                    <?php foreach(mysql::get_rows_and_types_in_array($table_structure[0]) as $field_name => $field_type):?>
                        <?php echo $field_name;?> / <?php echo $field_type;?><br/>
                    <?php endforeach;?>
                </td>
                <td>
                    <?php foreach(mysql::get_keys_in_array($table_structure[0]) as $key_name => $key_type):?>
                        <?php echo $key_name;?> / <?php echo $key_type;?><br/>
                    <?php endforeach;?></td>
                <td>
                    <?php echo mysql::get_count_rows_in_table($table_name);?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <h3>Генерация записи</h3>
        <?php echo form::select('table', mysql::get_table_names_in_array($tables));?>
        <button onClick="generateTable()">Сгенерировать</button>
        <span class="before_generate"></span>
    </body>
</html>

<script>
    function generateTable()
    {
        var table_name = $('select[name=table]').val();
        
        $.post(
            "/generate.php",
            {table_name : table_name},
            function(data){
                
                $('.generate').remove();
               
                $('.before_generate').after('<div class="generate">' + data + '</div>');
            }
        );
    }
</script>