<?php
require_once "../functions.php";
if(isset($_REQUEST['id']))
{
    $messageId=$_REQUEST['id'];
    if($_REQUEST['action']=="changestatus")
    {
      $query="UPDATE mail SET status='Read' WHERE id='$messageId'";
      mysql_query($query);
      header('Location:mail.php?id='.$messageId); 
    }
    elseif($_REQUEST['action']=="delete")
    {
      $query="DELETE FROM mail WHERE id='$messageId'";
      mysql_query($query);
      header('Location:inbox.php'); 
    }
}
?>