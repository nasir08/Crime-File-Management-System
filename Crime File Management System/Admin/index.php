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
<title>All Users</title>
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
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="../Admin">VIEW USERS</a><a href="Admin/Admin-login"></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="most_wanted.php">MOST WANTED LIST</a><a href="Admin/Admin-login"></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="missing_persons.php">MISSING PERSONS</a></td>
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
    <td align="center" valign="middle"><table width="950" align="center" id="missing">
      <tr>
    <th colspan="8" scope="col">&nbsp;</th>
  </tr>
      <tr>
        <th colspan="8" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th height="44" colspan="8" id="mHeader" scope="col">REGISTERED USERS</th>
      </tr>
      <tr>
        <th colspan="8" scope="col">&nbsp;</th>
      </tr>
    <tr>
      <td width=112 align=center valign=top  scope=col><a>S/N</a></td>
      <td width=112 align=center valign=top  scope=col><a>Name</a></td>
      <td width=112 align=center valign=top  scope=col><a>Sex</a></td>
      <td width=112 align=center valign=top  scope=col><a>Address</a></td>
      <td width=112 align=center valign=top  scope=col><a>Occupation</a></td>
      <td width=112 align=center valign=top  scope=col><a>Phone Number</a></td>
      <td width=112 align=center valign=top  scope=col><a>Email</a></td>
      <td width=112 align=center valign=top  scope=col><a>Change Status</a></td>
    </tr>
    <tr>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
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
$sn=1;
$from=(($page*10)-10);
 $query="SELECT * FROM users ORDER BY id DESC LIMIT $from,10";
 $result=mysql_query($query);
 while($row=mysql_fetch_row($result))
 {
    $id=$row[0];
    $name=$row[1];
    $sex=$row[3];
    $address=$row[4];
    $occu=$row[5];
    $phone=$row[6];
    $email=$row[7];
    $status=$row[9];
      echo"
  <tr>
    <td align=center valign=middle>$sn</td>
    <td align=center valign=middle>$name</td>
     <td align=center valign=middle>$sex</td>
    <td align=center valign=middle>$address</td>
    <td align=center valign=middle>$occu</td>
    <td align=center valign=middle>$phone</td>
    <td align=center valign=middle>$email</td>";
  
    if($status=="disapproved")
    {
    echo"<td align=center valign=middle><a href=changeStatus.php?id=$id&status=disapproved><img src=../images/approve.gif></a></td>";
    }
    elseif($status=="blocked")
    {
    echo"<td align=center valign=middle><a href=changeStatus.php?id=$id&status=blocked><img src=../images/approve.gif></a></td>";
    }
    elseif($status=="unblocked")
    {
    echo"<td align=center valign=middle><a href=changeStatus.php?id=$id&status=unblocked><img src=../images/block.gif></a></td>";
    }
    
  echo"</tr>";
  $sn++;
 
 echo"
 <tr>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
      <td width=112 align=center valign=top  scope=col>&nbsp;</td>
    </tr>";
 }
  ?>
  
  
  
  <tr>
    <td colspan=8>&nbsp;</td>
  </tr>
    </table></td>
  </tr>
</table>
<?php
echo"<center>";
         $query="SELECT COUNT(name) FROM users";
         $rs=mysql_query($query);
         $row=mysql_fetch_row($rs);
         $totalRecords=$row[0];
         $total_pages=ceil($totalRecords/10);
         
         if($total_pages>1)
         {
         echo "<a>Pages:</a>";
         for($i=1;$i<=$total_pages;$i++)
         {
           echo"&nbsp;<a href=../Admin/?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
         }
         }
        echo"</center>";
        echo"<br>" 
    ?> 
  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
</center>
</body>
</html>

