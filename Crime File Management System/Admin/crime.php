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
<title>Crime</title>
    <style type="text/css">
#current
{
	border-top-left-radius:10px;
	 border-top-right-radius:10px;
	background-color:#5f870e;
}
</style>
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">  
<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/cufon-replace.js" type="text/javascript"></script>
		<script src="js/Vegur_700.font.js" type="text/javascript"></script>
		<script src="js/Vegur_400.font.js" type="text/javascript"></script> 
		<script src="js/FF-cash.js" type="text/javascript"></script> 
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
		<script src="js/hover-image.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/easyTooltip.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
				$("a[data-gal^='prettyVideo']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_1']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_2']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_3']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_4']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
				$("a[data-gal^='prettyVideo_5']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
			}); 
		</script>		



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
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="crime.php"> CRIME</a></td>
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
        <th colspan="3" scope="col" height="44" id="mHeader">CRIME LIST</th>
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
 $query="SELECT * FROM crime ORDER BY id DESC LIMIT $from,5";
 $result=mysql_query($query);
 while($row=mysql_fetch_row($result))
 {
    $id=$row[0];
    $title=$row[1];
    $item=$row[4];
    $desc=$row[3];
    $date=$row[2];
    $location=$row[5];
    $type=$row[6];
    
    if($type=="NO EVIDENCE")
    {
      echo"
    <tr>
    <td width=255 height=255 rowspan=5 align=left valign=top class=holder scope=col><img src=../uploads/crime/$item width=255 height=290 /></td>";   
    }
    elseif($type=="VIDEO")
    {
        echo"
    <tr>
    <td width=255 height=255 rowspan=5 align=left valign=top class=holder scope=col><a class=lightbox-image href=video_AS3.swf?width=495&amp;height=275&amp;fileVideo=../uploads/crime/$item data-gal=prettyVideo[prettyVideo]><img src=../uploads/crime/placeholder.png height=290 width=255></a></td>";
    }
    elseif($type=="IMAGE")
    {
        echo"
    <tr>
    <td width=255 height=255 rowspan=5 align=left valign=top class=holder scope=col><img src=../uploads/crime/$item width=255 height=290 /></td>";
    }
    echo"
    <td width=101 height=51 align=right scope=col>$type:&nbsp;</td>
    <td width=267 height=51 scope=col>$title</td>
  </tr>
  <tr>
    <td height=51 align=right scope=col>Description:&nbsp;</td>
    <td height=51 scope=col>$desc</td>
  </tr>
  <tr>
    <td height=51 align=right scope=col>Incidence Date:&nbsp;</td>
    <td height=51 scope=col>$date</td>
  </tr>
  <tr>
    <td height=51 align=right scope=col>&nbsp;Location:&nbsp;</td>
    <td height=51 cope=col>$location</td>
  </tr>
  <tr>
    <td height=51 colspan=2 align=center scope=col><a href=#>Update</a>&nbsp;&nbsp;&nbsp;<a href=#>Delete</a></td>
  </tr>
  <tr>
    <td height=31 colspan=3>&nbsp;</td>
  </tr>";
 }
?>
</table></td>
  </tr>
</table>
<?php
echo"<center>";
         $query="SELECT COUNT(title) FROM crime";
         $rs=mysql_query($query);
         $row=mysql_fetch_row($rs);
         $totalRecords=$row[0];
         $total_pages=ceil($totalRecords/5);
         
         if($total_pages>1)
         {
         echo "<a>Pages:</a>";
         for($i=1;$i<=$total_pages;$i++)
         {
           echo"&nbsp;<a href=crime.php?page=$i>$i&nbsp;&nbsp;&nbsp;&nbsp;</a>";  
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