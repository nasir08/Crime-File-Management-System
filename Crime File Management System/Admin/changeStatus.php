<?php
require_once "../functions.php";
session_start();
if(isset($_SESSION['name']))
{}
else
{
    header('Location:Admin-login');
}

if(isset($_REQUEST['id']))
{
  $userId=$_REQUEST['id'];
  $status=$_REQUEST['status'];
  if($status=="disapproved")
  {
    $query="UPDATE users SET status='unblocked' WHERE id='$userId'";
    mysql_query($query);
    header('Location:../Admin');
  }
  elseif($status=="blocked")
  {
    $query="UPDATE users SET status='unblocked' WHERE id='$userId'";
    mysql_query($query);
    header('Location:../Admin');
  } 
  elseif($status=="unblocked")
  {
    $query="UPDATE users SET status='blocked' WHERE id='$userId'";
    mysql_query($query);
    header('Location:../Admin');
  }  
}
?>