<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Most Wanted List</title>
<style type="text/css">
<!--
#current
{
    border-top-left-radius:10px;
	 border-top-right-radius:10px;
	background-color:#5f870e;
} 
-->
</style>
<link href="../style/layout.css" rel="stylesheet" type="text/css" />
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
  <tr>
  <td align="center" valign="middle" width="150px" class="menu"><a href="../CFMS">HOME PAGE</a></td>
  <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../Register">REGISTER</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../Admin/Admin-login">ADMIN</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../Users/User-login">USERS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="../Most Wanted">MOST WANTED</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../Missing Persons">MISSING PERSONS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="../contact.php">CONTACT</a></td>
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
    <th scope="col">&nbsp;</th>
  </tr>
      <tr>
        <th scope="col">&nbsp;</th>
      </tr>
      <tr>
        <th scope="col" height="44" id="mHeader" colspan="3">MOST WANTED LIST</th>
      </tr>
      <tr>
        <th scope="col">&nbsp;</th>
      </tr>
       <tr>
         <th scope="col">&nbsp;</th>
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
 $query="SELECT * FROM most_wanted_list ORDER BY reward DESC LIMIT $from,5";
 $result=mysql_query($query);
 $sn=0;
 while($row=mysql_fetch_row($result))
 {
    $id=$row[0];
    $picture=$row[1];
    $name=$row[2];
    $age=$row[3];
    $sex=$row[4];
    $offence=$row[5];
    $reward=$row[6];
    $sn++;
    
    echo"
    <tr>
    <td width=255 height=160 rowspan=8 align=left valign=top class=holder scope=col><img src=../uploads/most_wanted/$picture width=255 height=255 /></td>
    <td width=80 height=31 align=right scope=col>S/N:&nbsp;</td>
    <td width=290 height=31 scope=col>$sn</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Name:&nbsp;</td>
    <td height=31 scope=col>$name</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Age:&nbsp;</td>
    <td height=31 scope=col>$age</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Sex:&nbsp;</td>
    <td height=31 cope=col>$sex</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Offence:&nbsp;</td>
    <td height=31 scope=col>$offence</td>
  </tr>
  <tr>
    <td height=31 align=right scope=col>Reward:&nbsp;</td>
    <td height=31 scope=col>$reward</td>
  </tr>
  <tr>
    <td height=31 colspan=2 align=center scope=col>If found, please <a href=../contact.php?subject=Criminal%20Spotted>click here</a> to contact us.</td>
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
         $query="SELECT COUNT(name) FROM most_wanted_list";
         $rs=mysql_query($query);
         $row=mysql_fetch_row($rs);
         $totalRecords=$row[0];
         $total_pages=ceil($totalRecords/5);
         
         if($total_pages>1)
         {
         echo "<a>Pages:</a>";
         for($i=1;$i<=$total_pages;$i++)
         {
           echo"&nbsp;<a href=../Most%20Wanted/?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
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

