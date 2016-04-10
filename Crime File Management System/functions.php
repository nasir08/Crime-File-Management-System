<?php
$db_hostname='localhost';
$db_database='cfms';
$db_username='root';
$db_password='';
$server=mysql_connect($db_hostname,$db_username,$db_password);
if(!server)
{
  echo "Cannot connect to mysql at the moment";
}
$found=mysql_select_db($db_database);
if(!$found)
{
   echo"Cannot find database at the moment";
}


function Redirect($url) { 
       if(headers_sent()) { 
               echo "<script type='text/javascript'>location.href='$url';</script>"; 
       } else { 
               header("Location: $url"); 
       } 
}  
 
 
function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
}

function sanitizeString($var)
{
 $var = stripslashes($var);
 $var = htmlentities($var);   
 $var = strip_tags($var);
return $var;
}

function sanitizeMySQL($var)
{
$var = mysql_real_escape_string($var);
$var = sanitizeString($var);
return $var;
}
?>