<?php
 session_start();
 if(isset($_SESSION['uName']))
 {
 $uName=$_SESSION['uName'];
 $name=$_SESSION['name'];
 $userID=$_SESSION['id'];
 }
 else
 {
    header('Location:User-login');
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report Missing Person</title>
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
<br /><table width="100%">
  <tr class="menu">
    <td align="left">Current User: <?php echo $name; ?></td>
    <td align="right"><a href=chatroom.php?name=<?php echo $name ?>>[ Chat Room ]</a> <a href="../users">[ Report Crime ]</a> <a href=../logout.php?id=<?php echo $userID ?> >[ Log Out ]</a></td>
  </tr>
</table>
<br />
<table width="100%" height="441">
  <tr>
    <td align="center" valign="middle">
    <form action="" method="post" enctype="multipart/form-data" name="frm1">
      <table width="70%" border="0" id="regBox">
  <tr>
    <th height="44" colspan="2" align="center" id="regHeading" scope="col">Report Missing Person</th>
  </tr>
  <?php
  if(isset($_POST['btnSubmit']))
  {
    $msg="";
    require_once "../functions.php";
  $fname=sanitizeMySQL(ucfirst(strtolower($_POST['txtFname'])));
  $lname=sanitizeMySQL(ucfirst(strtolower($_POST['txtLname'])));
  $pName=$lname." ".$fname;
  $age=sanitizeMySQL($_POST['age']);
  $sex=$_POST['sex'];
  $race=$_POST['race'];
  $date=$_POST['date'];
  $location_spotted=sanitizeMySQL($_POST['location_spotted']);
  $attributes=sanitizeMySQL($_POST['attributes']);
  $address=sanitizeMySQL($_POST['address']);
  if(trim($fname)=="")
  {$msg="Please Enter The First Name";}
  if(trim($lname)=="")
  {$msg="Please Enter The Last Name";}
  elseif(trim($age)=="")
  {$msg="Please Enter The Age";}
  elseif(!is_numeric($age))
  {$msg="The Age Must Be a Number";}
  elseif($sex=="--SELECT--")
  {$msg="Please Select The Sex";}
  elseif($race=="--SELECT--")
  {$msg="Please Select The Race";}
  elseif(trim($date)=="")
  {$msg="Please Enter The Date";}
  elseif(trim($location_spotted)=="")
  {$msg="Please Enter The Location Last Seen";}
  elseif(trim($attributes)=="")
  {$msg="Please Enter Some Physical Attributes";}
  
  
  else
  {
if ($_FILES)
{ 
$picTypes=array("image/jpg","image/jpeg","image/gif","image/png");
$file_name=$_FILES['picture']['name'];
$type=$_FILES['picture']['type'];
$size=$_FILES['picture']['size'];
$tmp_name=$_FILES['picture']['tmp_name'];
$target_path="../uploads/missing-persons/";
$target_path=$target_path.basename($file_name);
  if(($type=="$picTypes[0]") || ($type=="$picTypes[1]") || ($type=="$picTypes[2]") || ($type=="$picTypes[3]"))
  {
    move_uploaded_file($_FILES['picture']['tmp_name'],$target_path);
    $query="INSERT INTO missing_persons (name,age,sex,race,last_seen,last_spotted,attributes,address,picture,reported_By_userID,status) VALUES('$pName','$age','$sex','$race','$date','$location_spotted','$attributes','$address','$file_name','$userID','Missing')";
    mysql_query($query);
    $msg="Report Successful";
  }
  else
  {$msg="File Format Not Supported"; }
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
?>
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td width="36%" align="right">First Name:&nbsp;</td>
    <td width="64%" align="left"><input name="txtFname" type="text" class="txt" value="<?php echo $fname ?>" /></td>
  </tr>
  <tr>
    <td width="36%" align="right">Last Name:&nbsp;</td>
    <td align="left"><input name="txtLname" type="text" class="txt" value="<?php echo $lname ?>" /></td>
  </tr>
  <tr>
    <td width="36%" align="right">Age:&nbsp;</td>
    <td align="left"><input name="age" type="text" class="txt" value="<?php echo $age ?>" /></td>
  </tr>
  <tr>
    <td width="36%" align="right">Sex:&nbsp;</td>
    <td align="left"><select name="sex" class="txt">
      <option value="--SELECT--">--SELECT--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select></td>
  </tr>
  <tr>
    <td width="36%" align="right">Race:&nbsp;</td>
    <td align="left"><select name="race" class="txt" id="race">
      <option value="--SELECT--" selected="selected">--SELECT--</option>
      <option value="African">African</option>
      <option value="African-American">African-American</option>
      <option value="Arab">Arab</option>
      <option value="Asian">Asian</option>
      <option value="Caucasian">Caucasian</option>
      <option value="East-Asian">East-Asian</option>
      <option value="Latino">Latino</option>
      <option value="South-Asian">South-Asian</option>
      <option value="White">White</option>
    </select></td>
  </tr>
  <tr>
    <td width="36%" align="right">Date Last Seen:&nbsp;</td>
    <td align="left"><input name="date" type="date" class="txt" value="<?php echo $date ?>" ></td>
  </tr>
  <tr>
    <td width="36%" align="right" valign="top">Location Last Spotted:&nbsp;</td>
    <td align="left"><textarea name="location_spotted" cols="45" rows="5" class="txt" id="location_spotted"><?php echo $location_spotted ?></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="top">Physical Attributes:&nbsp;</td>
    <td align="left"><textarea name="attributes" cols="45" rows="5" class="txt" id="attributes"><?php echo $attributes ?></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="top">Address:&nbsp;</td>
    <td align="left"><textarea name="address" cols="45" rows="5" class="txt" id="address"><?php echo $address ?></textarea></td>
  </tr>
  <tr>
    <td align="right">Picture:&nbsp;</td>
    <td align="left"><input type="file" name="picture" class="txt" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="btnSubmit" type="submit" class="btn" value="Submit" id="btnSubmit" />&nbsp;&nbsp;
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