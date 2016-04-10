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
<title>Report Crime</title>
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
    <td align="left">Current User: <?php echo $name;?></td>
    <td align="right"><a href=chatroom.php?name=<?php echo $name ?>>[ Chat Room ]</a> <a href="report-missing-person.php">[ Report Missing Person ]</a> <a href=../logout.php?id=<?php echo $userID ?> >[ Log Out ]</a></td>
  </tr>
</table>
<br />
<table width="100%" height="441">
  <tr>
    <td align="center" valign="middle">
    <form action="" method="post" enctype="multipart/form-data" name="frm1">
      <table width="70%" border="0" id="regBox">
  <tr>
    <th height="44" colspan="2" align="center" id="regHeading" scope="col">Report Crime</th>
  </tr>
  <?php
  if(isset($_POST['btnSubmit']))
  {
    require_once "../functions.php";
  $title=$_POST['txtTitle'];
  $date=$_POST['txtCDate'];
  $desc=$_POST['desc'];
  $add=$_POST['add'];
  if(trim($title)=="")
  {$msg="Please Enter a Title";}
  elseif(trim($date)=="")
  {$msg="Please Enter a Date";}
  elseif(trim($desc)=="")
  {$msg="Please Enter a Description";}
  elseif(trim($add)=="")
  {$msg="Please Enter an Address";}
  
  
  else
  {
if ($_FILES)
{ 
$evidence="yes";
$videoTypes=array("video/mp4","video/flv","video/x-flv","video/avi");
$picTypes=array("image/jpg","image/jpeg","image/gif","image/png");
$name=$_FILES['evidence']['name'];
$type=$_FILES['evidence']['type'];
$size=$_FILES['evidence']['size'];
$tmp_name=$_FILES['evidence']['tmp_name'];
$target_path="../uploads/crime/";
$target_path=$target_path.basename($name);
move_uploaded_file($_FILES['evidence']['tmp_name'],$target_path);
  if(($type=="$videoTypes[0]") || ($type=="$videoTypes[1]") || ($type=="$videoTypes[2]") || ($type=="$videoTypes[3]"))
  {$evidenceType="VIDEO";}
  elseif(($type=="$picTypes[0]") || ($type=="$picTypes[1]") || ($type=="$picTypes[2]") || ($type=="$picTypes[3]"))
  {$evidenceType="IMAGE";}
  else
  {
    $evidence="no";
  }
}

$query1="INSERT INTO crime (title,incident_dat,description,evidence,location,evidenceType) VALUES('$title','$date','$desc','$name','$add','$evidenceType')";
$query2="INSERT INTO crime (title,incident_dat,description,evidence,location,evidenceType) VALUES('$title','$date','$desc','placeholder.png','$add','NO EVIDENCE')";

if($evidence=="yes")
{
    mysql_query($query1);
}
elseif($evidence=="no")
{
    mysql_query($query2);
}
$msg="Crime Report Successful";
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
?>
  <tr>
    <th colspan="2" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td width="36%" align="right">Title:&nbsp;</td>
    <td width="64%" align="left"><input name="txtTitle" type="text" class="txt" value="<?php echo $title ?>" /></td>
  </tr>
  <tr>
    <td width="36%" align="right">Incidence Date:&nbsp;</td>
    <td align="left"><input name="txtCDate" type="date" class="txt" value="<?php echo $date ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">Crime Description:&nbsp;</td>
    <td align="left"><textarea name="desc" cols="45" rows="5" class="txt" id="desc"><?php echo $desc ?></textarea></td>
  </tr>
  <tr>
    <td align="right">Attachment/Evidence:&nbsp;</td>
    <td align="left"><input type="file" name="evidence" class="txt" id="evidence" /> 
      &nbsp;&nbsp;(Optional)</td>
  </tr>
  <tr>
    <td align="right" valign="top">Address:&nbsp;</td>
    <td align="left"><textarea name="add" cols="45" rows="5" class="txt"><?php echo $add ?></textarea></td>
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