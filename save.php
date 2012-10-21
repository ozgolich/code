<?php
if(isset($_POST['save']))
{
    require_once './mysql.php';
    require_once './config.php';
    
    if(mysql::insert($_POST))
    {
        header('location: /');
    }
}
else
{
    die('Access denied');
}
?>
