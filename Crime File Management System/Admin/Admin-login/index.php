<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<style type="text/css">
<!--
#error
{
    color: white;
}
-->
</style>
<link href="../layout.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <center>
  <div id="loginHeader">
     <table width="100%" height="179px;">
  <tr>
    <td align="center" valign="middle"><img src="../../images/banner.png" alt="" name="" width="480" height="51" /></td>
  </tr>
</table>
</div>
   <div id="loginArea">
    <table width="100%" border="0" height="441">
  <tr>
    <td valign="middle" align="center">
     <form action="" method="post" name="form1">
      <table width="40%" border="0" id="loginBox">
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <th colspan="2" scope="col">Admin Log In</th>
  </tr>
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <?php
  if(isset($_POST['btnLogin']))
  {
    $msg="";
    require_once "../../functions.php";
    $uname=sanitizeMySQL($_POST['txtUname']);
    $pass=sha1(sanitizeMySQL($_POST['txtPass']));
    
    $query="SELECT name,uname,pass FROM admin WHERE uname='$uname' and pass='$pass'";
$result=mysql_query($query);
if(!$result)
{
    $msg=mysql_error();
}
else
{
    $row=mysql_fetch_row($result);
    if(($row[1]!=$uname) || ($row[2]!=$pass))
    {
        $msg="Invalid Username or Password";
    }
    else
    {
        session_start();
    $_SESSION['name']=$row[0];
    $_SESSION['uName']=$uname;
    $link="../../Admin";
    Redirect($link);
    }
}

if($msg!="")
{
echo"
<tr>
    <td colspan=2 id=error align=center>$msg</td>
  </tr>
<tr>
    <th colspan=2 scope=col>&nbsp;</th>
  </tr>";
  }

  }
  if(isset($_POST['btnCancel']))
  {
    require_once "../../functions.php";
    $link="../../../CFMS";
    Redirect($link);
}
  ?>
  <tr>
    <td align="right">Username:&nbsp;</td>
    <td><input name="txtUname" type="text" class="txt" id="txtUname" value="<?php echo $uname ?>" /></td>
  </tr>
  <tr>
    <td align="right">Password:&nbsp;</td>
    <td><input name="txtPass" type="password" class="txt" id="txtPass" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input name="btnLogin" type="submit" class="btn" id="btnLogin" value="Log In" />&nbsp;&nbsp;
      <input name="btnCancel" type="submit" class="btn" id="btnCancel" value="Cancel" /></td>
    </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
      </table>
     </form>
    </td>
  </tr>
</table>
   </div>
<table width="100%" id="loginfooter">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 9. All rights reserved</td>
  </tr>
</table>