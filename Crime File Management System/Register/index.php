<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="loginHeader">
     <table width="100%" height="179px;">
  <tr>
    <td align="center" valign="middle"><img src="../images/banner.png" alt="" name="" width="480" height="51" /></td>
  </tr>
</table>
</div>
<br /><br /><br />
<table width="100%" height="441">
  <tr>
    <td align="center" valign="middle">
    <form action="" method="post" name="frm1">
      <table width="70%" border="0" id="regBox">
  <tr>
    <th colspan="2" align="center" scope="col" id="regHeading" height="44">Register User</th>
  </tr>
  <?php
  if(isset($_POST['btnReg']))
  {
    $msg="";
    $ok="";
    require_once "../functions.php";
  $fname=sanitizeMySQL(ucfirst(strtolower($_POST['txtFname'])));
  $lname=sanitizeMySQL(ucfirst(strtolower($_POST['txtLname'])));
  $uName=sanitizeMySQL($_POST['txtUname']);
  $name=$lname." ".$fname;
  $sex=$_POST['sex'];
  $add=sanitizeMySQL($_POST['add']);
  $occu=sanitizeMySQL(ucfirst(strtolower($_POST['occu'])));
  $phone=$_POST['phone'];
  $email=sanitizeMySQL($_POST['email']);
  $pass=sha1($_POST['txtPass']);
  
  if(trim($fname)=="")
  {
    $msg="Please Enter Your First Name";
  }
  elseif(trim($lname)=="")
  {
    $msg="Please Enter Your Last Name";
  }
  elseif(trim($uName)=="")
  {
    $msg="Please Enter Your Desired Username";
  }
  elseif($sex=="--SELECT--")
  {
    $msg="Please Select Your Sex";
  }
  elseif(trim($add)=="")
  {
    $msg="Please Enter Your Address";
  }
  elseif(trim($occu)=="")
  {
    $msg="Please Enter Your Occupation";
  }
  elseif(trim($phone)=="")
  {
    $msg="Please Enter Your Phone Number";
  }
  elseif(!is_numeric($phone))
  {
    $msg="Invalid Phone Number";
  }
  
  
  else
  {
  $query="SELECT uname FROM users WHERE uname='$uName'";
  $result=mysql_query($query);
  $rows=mysql_num_rows($result);
  if($rows>0)
  {
    $row=mysql_fetch_row($result);
  if($row[0]==$uName)
  {
    $msg="The username ".$uName." belongs to another user";
  }
  }
  
  
  
  else
  {
  $query="INSERT INTO users (name,uname,sex,address,occupation,phone,email,pass,status,mode) VALUES('$name','$uName','$sex','$add','$occu','$phone','$email','$pass','disapproved','offline')";
  mysql_query($query);
  $msg="Registration Successful. Awaiting Approval From Site Administrator";
  }
  }
}
if(isset($_POST['btnCancel']))
  {
    require_once "../functions.php";
    $link="../../CFMS";
    Redirect($link);
}

if($msg!="")
{
echo"
  <tr>
    <th colspan=2 scope=col>&nbsp;</th>
  </tr>
  <tr>
    <td colspan=2 align=center valign=middle class=msg>$msg</td>
  </tr>";  
}
  ?>
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td width="36%" align="right">First Name:&nbsp;</td>
    <td width="64%" align="left"><input name="txtFname" type="text" class="txt" value="<?php echo $fname ?>" /></td>
  </tr>
  <tr>
    <td align="right">Last Name:&nbsp;</td>
    <td align="left"><input name="txtLname" type="text" class="txt" value="<?php echo $lname ?>" /></td>
  </tr>
  <tr>
    <td align="right">Username:&nbsp;</td>
    <td align="left"><input name="txtUname" type="text" class="txt" value="<?php echo $uName ?>" /></td>
  </tr>
  <tr>
    <td align="right">Sex:&nbsp;</td>
    <td align="left"><select name="sex" class="txt">
      <option value="--SELECT--">--SELECT--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select></td>
  </tr>
  <tr>
    <td align="right" valign="top">Address:&nbsp;</td>
    <td align="left"><textarea name="add" cols="45" rows="5" class="txt"><?php echo $add ?></textarea></td>
  </tr>
  <tr>
    <td align="right">Occupation:&nbsp;</td>
    <td align="left"><input name="occu" type="text" class="txt" value="<?php echo $occu ?>" /></td>
  </tr>
  <tr>
    <td align="right">Phone Number:&nbsp;</td>
    <td align="left"><input name="phone" type="text" class="txt" value="<?php echo $phone ?>" /></td>
  </tr>
  <tr>
    <td align="right">eMail Address:&nbsp;</td>
    <td align="left"><input name="email" type="email" class="txt" value="<?php echo $email ?>" /></td>
  </tr>
  <tr>
    <td align="right">Password:&nbsp;</td>
    <td align="left"><input name="txtPass" type="text" class="txt" id="txtPass" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input name="btnReg" type="submit" class="btn" value="Register" />&nbsp;&nbsp;
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