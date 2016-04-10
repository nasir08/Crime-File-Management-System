<?php
require_once "functions.php";
if(isset($_REQUEST[id]))
{
    $query="UPDATE users SET mode='offline' WHERE id='$_REQUEST[id]'";
    mysql_query($query);
}

destroySession();
header('Location:../CFMS');
?>