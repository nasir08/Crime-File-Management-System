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
<title>Inbox</title>
<style type="text/css">
#current
{
	border-top-left-radius:10px;
	 border-top-right-radius:10px;
	background-color:#5f870e;
}
</style>
<link href="layout.css" rel="stylesheet" type="text/css" />
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
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="inbox.php">INBOX <?php echo "<sup>(".$row[0].")</sup>"; ?></a></td>
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
  <table width="100%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><table width="80%" border="0" align="center" id="inbox">
      <tr>
        <th height="44" colspan="5" id="mHeader" scope="col">INBOX</th>
      </tr>
      <tr>
        <th colspan="5" scope="col">&nbsp;</th>
      </tr>
      
      <?php
      require_once "../functions.php";
 if(isset($_GET['page']))
{
$page=$_GET['page'];
}
else
{
$page=1;
}
$from=(($page*20)-20);
 $query="SELECT * FROM mail ORDER BY id DESC LIMIT $from,20";
 $result=mysql_query($query);
 while($row=mysql_fetch_row($result))
 {
    $id=$row[0];
    $name=$row[2];
    $subject=$row[3];
    $message=$row[4];
    $message= explode(' ',$message);
    $date=$row[5];
    $status=$row[6];
      echo"
      <tr>
        <th colspan=5 scope=col>&nbsp;</th>
      </tr>
    <tr>
    <td width=12% align=center valign=middle scope=col><font size=3px>$name</font></td>";
     ?>
     <?php
      echo"<td width=22% align=center valign=top scope=col>$subject</td>";
      if($status=="Unread")
      {
      echo"
      <td width=34% align=center valign=top scope=col><a href=mail_action.php?id=$row[0]&action=changestatus><font size=+1>$message[0] $message[1] $message[2] $message[3] $message[4] $message[5]...</font></a></td>";
      }
      elseif($status=="Read")
      {
        echo"<td width=34% align=center valign=top scope=col><a href=mail.php?id=$row[0]>$message[0] $message[1] $message[2] $message[3] $message[4] $message[5]...</a></td>";
      }
      echo"
      <td width=24% align=center valign=top scope=col>$date</td>
      <td width=8% align=center valign=top scope=col><a href=mail_action.php?id=$row[0]&action=delete>Delete</a></td>
      </tr>
    <tr>
      <td colspan=5 align=center valign=top scope=col>&nbsp;</td>
      </tr>
    <tr>
      <td colspan=5 align=center valign=top scope=col><hr /></td>
    </tr>";
    }
    ?>
    </table></td>
  </tr>
</table>
<br /><br />
<?php
echo"<center>";
         $query="SELECT COUNT(name) FROM mail";
         $rs=mysql_query($query);
         $row=mysql_fetch_row($rs);
         $totalRecords=$row[0];
         $total_pages=ceil($totalRecords/20);
         
         if($total_pages>1)
         {
         echo "<a>Pages:</a>";
         for($i=1;$i<=$total_pages;$i++)
         {
           echo"&nbsp;<a href=inbox.php?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
         }
         }
        echo"</center>"; 
    ?> 
  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>