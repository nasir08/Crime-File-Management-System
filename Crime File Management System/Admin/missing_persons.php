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
<title>Missing Persons</title>
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
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="missing_persons.php">MISSING PERSONS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="crime.php"> CRIME</a></td>
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
  <table width="100%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><table width="639" align="center" id="missing">
      <tr>
    <th colspan="3" scope="col">&nbsp;</th>
  </tr>
      <tr>
        <th colspan="3" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="3" scope="col" height="44" id="mHeader">MISSING PERSONS</th>
      </tr>
      <tr>
        <th colspan="3" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="3" scope="col">&nbsp;</th>
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
$from=(($page*5)-5);
 $query="SELECT * FROM missing_persons ORDER BY id DESC LIMIT $from,5";
 $result=mysql_query($query);
 while($row=mysql_fetch_row($result))
 {
    $picture=$row[9];
    $name=$row[1];
    $age=$row[2];
    $sex=$row[3];
    $race=$row[4];
    $last_spotted=$row[6];
    $attributes=$row[7];
      echo"
    <tr>
    <td width=255 height=255 rowspan=8 align=left valign=top class=holder scope=col><img src=../uploads/missing-persons/$picture width=255 height=290 /></td>
    <td width=133 height=31 align=right scope=col>Name:&nbsp;</td>
    <td width=235 height=31 scope=col>$name</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Age:&nbsp;</td>
    <td height=31 scope=col>$age</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Sex:&nbsp;</td>
    <td height=31 scope=col>$sex</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Race:&nbsp;</td>
    <td height=31 cope=col>$race</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Last Seen At:&nbsp;</td>
    <td height=31 scope=col>$last_spotted</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Physical Attributes:&nbsp;</td>
    <td height=31 scope=col>$attributes</td>
  </tr>
  <tr>
    <td height=31 colspan=2 align=center scope=col><a href=#>Update</a>&nbsp;&nbsp;&nbsp;<a href=#>Delete</a></td>
    </tr>
  <tr>
    <td height=31 colspan=2 align=center scope=col>&nbsp;</td>
    </tr>
  <tr>
    <td colspan=3>&nbsp;</td>
  </tr>";
 }
  ?>
</table></td>
  </tr>
</table>
<?php
echo"<center>";
         $query="SELECT COUNT(name) FROM missing_persons";
         $rs=mysql_query($query);
         $row=mysql_fetch_row($rs);
         $totalRecords=$row[0];
         $total_pages=ceil($totalRecords/5);
         
         if($total_pages>1)
         {
         echo "<a>Pages:</a>";
         for($i=1;$i<=$total_pages;$i++)
         {
           echo"&nbsp;<a href=missing_persons.php?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
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

