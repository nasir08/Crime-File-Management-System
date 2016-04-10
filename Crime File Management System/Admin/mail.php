<?php
session_start();
if(isset($_SESSION['name']))
{}
else
{
    header('Location:Admin-login');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Message Viewer</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.msgBox
{
    background-color: #000000;
    border:1px groove #CCC;
    color: #ffffff;
}
-->
</style>
</head>
<body>
 <center>
  <div id="header">
   <div id="banner">
     <h1><img src="../images/banner.png" alt="" name="" width="480" height="51" /></h1>
   </div>
   <div id="nav">
    <center>
     <table width="900" border="0" height="67px">
      <?php  
       require_once "../functions.php";
       $query="SELECT COUNT(status) FROM mail WHERE status='Unread'";
       $result=mysql_query($query);
       $row=mysql_fetch_row($result);
     ?>
  <tr>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../Admin">VIEW USERS</a><a href="Admin/Admin-login"></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="most_wanted.php">MOST WANTED LIST</a><a href="Admin/Admin-login"></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="missing_persons.php">MISSING PERSONS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="crime.php">CRIME</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="chatroom.php"> CHAT ROOM</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="inbox.php">INBOX <?php echo "<sup>(".$row[0].")</sup>"; ?></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../logout.php"> LOG OUT</a></td>
  </tr>
    </table>
    </center>
   </div>
   <div id="separator">
   
   </div>
  </div>
  <br /><br />
  <table width="101%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><table width="60%" border="0" align="center" id="inbox">
      <tr>
        <th height="44" id="mHeader" scope="col">MESSAGE</th>
      </tr>
      <tr>
        <th scope="col">&nbsp;</th>
      </tr>
      
     <?php
     require_once "../functions.php";
     if(isset($_REQUEST['id']))
     {
        $messageId=$_REQUEST['id'];
     }
     else
     {
        $link="inbox.php";
        Redirect($link);
     }
     
     $query="SELECT * FROM mail WHERE id='$messageId'";
     $result=mysql_query($query);
     $row=mysql_fetch_row($result);
     $subject=$row[3];
     $name=$row[2];
     $email=$row[1];
     $message=$row[4];
     $date=$row[5];
     
     echo"
      <tr>
        <th scope=col>&nbsp;</th>
      </tr>
      <tr>
    <td height=30 align=center valign=middle scope=col><b>Date:</b> &nbsp;$date</td>
        </tr>
    <tr>
    <td height=30 align=center valign=middle scope=col><b>Subject:</b> &nbsp;$subject</td>
        </tr>
    <tr>
      <td height=30 align=center valign=middle scope=col><b>From:</b> &nbsp;$name &nbsp;<a>&lt;$email&gt;</a></td>
    </tr>
    <tr>
      <td align=center valign=top scope=col>&nbsp;</td>
    </tr>
    <tr>
      <td align=center valign=top scope=col><textarea disabled name=textarea class=msgBox cols=55 rows=15>$message</textarea></td>
    </tr>
    <tr>
      <td align=center valign=top scope=col>&nbsp;</td>
      </tr>";
    ?>
    
    </table></td>
  </tr>
</table>
<br /><br />

  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>