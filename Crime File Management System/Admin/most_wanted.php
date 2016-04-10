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
<title>Most Wanted List</title>
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
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="most_wanted.php">MOST WANTED LIST</a><a href="Admin/Admin-login"></a></td>
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
    <td align="center" valign="middle">
     <?php
 require_once "../functions.php";
 if($_REQUEST['action']=="add")
 {
    if(isset($_POST['btnSubmit']))
    {
      $mname=sanitizeMySQL($_POST['txtName']);
      $mage=sanitizeMySQL($_POST['txtAge']);
      $msex=$_POST['sex'];
      $moffence=sanitizeMySQL($_POST['txtOffence']);
      $mreward=sanitizeMySQL($_POST['txtReward']); 
      
      if(trim($mname)=="")
      {$msg="Please Enter The Name";}
      elseif(trim($mage)=="")
      {$msg="Please Enter The Age";}
      elseif(!is_numeric($mage))
      {$msg="Age Must Be a Number";}
      elseif($msex=="--SELECT--")
      {$msg="Please Select The Sex";}
      elseif(trim($moffence)=="")
      {$msg="Olease Enter The Offence";}
      elseif(trim($mreward)=="")
      {$msg="Please Enter The Reward";}
      elseif(!is_numeric($mreward))
      {$msg="Reward Must Be a Number";}
      
      else{
$picTypes=array("image/jpg","image/jpeg","image/gif","image/png");
$file_name=$_FILES['picture']['name'];
$type=$_FILES['picture']['type'];
$size=$_FILES['picture']['size'];
$tmp_name=$_FILES['picture']['tmp_name'];
$target_path="../uploads/most_wanted/";
$target_path=$target_path.basename($file_name);

if(($type=="$picTypes[0]") || ($type=="$picTypes[1]") || ($type=="$picTypes[2]") || ($type=="$picTypes[3]"))
  {
    move_uploaded_file($_FILES['picture']['tmp_name'],$target_path);
    $query="INSERT INTO most_wanted_list (picture,name,age,sex,offence,reward) VALUES('$file_name','$mname','$mage','$msex','$moffence','$mreward')";
    mysql_query($query);
    $link="most_wanted.php";
    Redirect($link);
  }
  else
  {$msg="File Format Not Supported"; }
}

}

if(isset($_POST['btnCancel']))
{
    $link="most_wanted.php";
    Redirect($link);
}

	 echo"
	 <link href=css/layout.css rel=stylesheet type=text/css />
    <form method=post enctype=multipart/form-data name=form1>
      <table width=639 align=center>
        <tr>
          <th colspan=2 scope=col>&nbsp;</th>
        </tr>
        <tr>
          <th colspan=2 scope=col>&nbsp;</th>
        </tr>
        <tr>
          <th height=44 colspan=2 id=mHeader scope=col>REGISTER MOST WANTED PERSON</th>
        </tr>
        <tr>
          <th colspan=2 scope=col>&nbsp;</th>
        </tr>";
        if($msg!="")
{
echo"
    <th colspan=2 scope=col class=msg>$msg</th>
  </tr>";
  }
       echo"
        <tr>
          <th colspan=2 scope=col>&nbsp;</th>
        </tr>
        <tr>
          <td width=233 align=right valign=middle  scope=col>Name:&nbsp;</td>
          <td width=394 align=left valign=middle  scope=col><input type=text name=txtName class=text value=$mname ></td></tr>
        <tr>
          <td align=right valign=middle  scope=col>Age:&nbsp;</td>
          <td align=left valign=middle  scope=col><input type=text name=txtAge class=text value=$mage ></td>
        </tr>
        <tr>
          <td align=right valign=middle  scope=col>Sex:&nbsp;</td>
          <td align=left valign=middle  scope=col>
            <select name=sex class=text>
              <option>--SELECT--</option>
              <option>Male</option>
              <option>Female</option>
            </select></td>
        </tr>
        <tr>
          <td align=right valign=middle  scope=col>Offence:&nbsp;</td>
          <td align=left valign=middle  scope=col><input type=text name=txtOffence class=text value=$moffence ></td>
        </tr>
        <tr>
          <td align=right valign=middle  scope=col>Reward:&nbsp;</td>
          <td align=left valign=middle  scope=col><input type=text name=txtReward class=text value=$mreward ></td>
        </tr>
        <tr>
          <td align=right valign=middle  scope=col>Picture:&nbsp;</td>
          <td align=left valign=middle  scope=col><input type=file name=picture class=text /></td>
        </tr>
        <tr>
        <td colspan=2 align=right valign=middle  scope=col>&nbsp;</td>
          </tr>
        <tr>
          <td colspan=2 align=center valign=middle  scope=col>
            <input type=submit name=btnSubmit class=btn value=Submit />&nbsp;&nbsp;
            <input type=submit name=btnCancel class=btn value=Cancel /></td>
          </tr>
        <tr>
          <td colspan=2>&nbsp;</td>
        </tr>
      </table>
    </form>";
}
     
 
 
	else
	{
		echo"
    <table width=639 align=center id=missing>
      <tr>
    <th colspan=3 scope=col>&nbsp;</th>
  </tr>
      <tr>
        <th colspan=3 scope=col>&nbsp;</th>
      </tr>
      <tr>
        <th colspan=3 scope=col height=44 id=mHeader>MOST WANTED LIST</th>
      </tr>
      <tr>
        <th colspan=3 scope=col>&nbsp;</th>
      </tr>
      <tr>
        <th colspan=3 scope=col><a href=most_wanted.php?action=add>Add to List</a></th>
      </tr>
       <tr>
        <th colspan=3 scope=col>&nbsp;</th>
      </tr>";
     
 
 
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
    <td width=255 height=255 rowspan=8 align=left valign=top class=holder scope=col><img src=../uploads/most_wanted/$picture width=255 height=290 /></td>
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
    <td height=31 colspan=2 align=center scope=col><a href=#>Update</a>&nbsp;&nbsp;&nbsp;<a href=#>Delete</a></td>
    </tr>
  <tr>
    <td height=31 colspan=2 align=center scope=col>&nbsp;</td>
    </tr>
  <tr>
    <td colspan=3>&nbsp;</td>
  </tr>";
 }
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
           echo"&nbsp;<a href=most_wanted.php?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
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

