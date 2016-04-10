<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login</title>
<link href="../layout.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="loginHeader">
     <table width="100%" height="179px;">
  <tr>
    <td align="center" valign="middle"><img src="../../images/banner.png" alt="" name="" width="480" height="51" /></td>
  </tr>
</table>
</div>
<br /><table width="100%">
</table>
<br />
<table width="100%" height="410">
  <tr>
    <td align="center" valign="middle">
    <form action="" method="post" name="frm1">
      <table width="50%" border="0" id="regBox">
  <tr>
    <th height="44" colspan="2" align="center" id="regHeading" scope="col">User Login</th>
  </tr>
  <?php
  if(isset($_POST['btnLogin']))
  {
    require_once "../../functions.php";
  $uname=sanitizeMySQL($_POST['txtUname']);
  $pass=sha1(sanitizeMySQL($_POST['txtPass']));

$query="SELECT id,name,uname,pass,status FROM users WHERE uname='$uname' and pass='$pass'";
$result=mysql_query($query);
if(!$result)
{
    $msg=mysql_error();
}
else
{
    $row=mysql_fetch_row($result);
    if(($row[2]!=$uname) || ($row[3]!=$pass))
    {
        $msg="Invalid Username or Password";
    }
    elseif($row[4]=="disapproved")
    {
        $msg="Account Awaiting Approval From Site Administrator";
    }
    elseif($row[4]=="blocked")
    {
        $msg="Account Blocked. Please contact Site Administrator";
    }
    elseif($row[4]=="unblocked")
    {
        session_start();
    $_SESSION['name']=$row[1];
    $_SESSION['uName']=$uname;
    $_SESSION['id']=$row[0];
    $query="UPDATE users SET mode='online' WHERE id='$row[0]'";
    mysql_query($query);
    $link="../../Users";
    Redirect($link);
    }
}

if($msg!="")
{
echo"
<tr>
    <th colspan=2 scope=col>&nbsp;</th>
  </tr>
<tr>
    <th colspan=2 scope=col class=msg>$msg</th>
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
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td width="36%" align="right">Username:&nbsp;</td>
    <td width="64%" align="left"><input name="txtUname" type="text" class="txt" id="txtTitle" value="<?php echo $uname ?>" /></td>
  </tr>
  <tr>
    <td width="36%" align="right">Password:&nbsp;</td>
    <td align="left"><input name="txtPass" type="password" class="txt" id="txtPass" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="btnLogin" type="submit" class="btn" value="Log In" id="btnLogin" />&nbsp;&nbsp;
      <input name="btnCancel" type="submit" class="btn" value="Cancel" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
<br /><br /><br />
<table width="100%" id="loginfooter">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>