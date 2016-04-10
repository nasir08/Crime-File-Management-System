<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
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
<link href="style/layout.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <center>
  <div id="header">
   <div id="banner">
     <h1><img src="images/banner.png" alt="" name="" width="480" height="51" /></h1>
   </div>
   <div id="nav">
    <center>
     <table width="900" border="0" height="67px">
  <tr>
  <td align="center" valign="middle" width="150px" class="menu"><a href="../CFMS">HOME PAGE</a></td>
  <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Register">REGISTER</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Admin/Admin-login">ADMIN</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Users/User-login">USERS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Most Wanted">MOST WANTED</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Missing Persons">MISSING PERSONS</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="../CFMS/contact.php">CONTACT</a></td>
  </tr>
    </table>
    </center>
   </div>
   <div id="separator">
   
   </div>
  </div>
  <table width="100%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><form id="form1" name="form1" method="post" action="">
      <table width="70%" id="missing">
        <tr>
          <th colspan="3" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th colspan="3" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th scope="col" height="44" id="mHeader" colspan="5">CONTACT FORM</th>
        </tr>
        <tr>
          <th colspan="3" scope="col">&nbsp;</th>
        </tr>
        
        <?php
if(isset($_POST['btnSend']))
{
    require_once "functions.php";
    $msg="";
  if(isset($_REQUEST['subject']))
  {
    $mail_Subject=$_REQUEST['subject'];
  }
  else
  {
    $mail_Subject="";
  } 
  $sender=sanitizeMySQL($_POST['email']);
  $name=sanitizeMySQL($_POST['name']);
  $message=sanitizeMySQL($_POST['message']);
  $today=date('D d M ');
  $today=$today.date('G:i');
  if(trim($name)=="")
  {$msg="Please Enter Your Name";}
  elseif(trim($sender)=="")
  {$msg="Please Enter Your Email Address";}
  elseif(trim($message)=="")
  {$msg="Please Enter Your Message";}
  
  else
  { 
  $reciever="report@cfms.com";
  $mailHeader="From: ".$_POST['email']."\n";
  $mailHeader.="Reply-To: ".$_POST['email']."\n";
  $mailHeader.="Content-type: text/html; charset=iso-8859-1\n";
  $content="Name: ".$_POST['name']."<br />"; 
  $content.="Message: ".nl2br($_POST['message'])."<br />";
  mail($reciever,$mail_Subject,$content,$mailHeader);
  

  
  require_once "functions.php";
  $query="INSERT INTO mail (sender,name,subject,message,date,status) VALUES('$sender','$name','$mail_Subject','$message','$today','Unread')";
  mysql_query($query);
  $msg="Message Sent Successfully";
    
 }
}
 if($msg!="")
 {
    echo"
   <tr>
          <td colspan=3 align=center class=msg>$msg</td>
        </tr>
        <tr>
          <th colspan=3 scope=col>&nbsp;</th>
        </tr>"; 
 }
        ?>
        <tr>
          <td width="76" align="right">Name: &nbsp;</td>
          <td colspan="2" align="left"><input type="text" name="name" class="txt" value="<?php echo $name ?>" /></td>
        </tr>
        <tr>
          <td align="right">Email: &nbsp;</td>
          <td colspan="2" align="left"><input type="email" name="email" class="txt" value="<?php echo $sender ?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="top">Message: &nbsp;</td>
          <td colspan="2" align="left"><textarea name="message" class="txt" cols="45" rows="5"><?php echo $message ?></textarea></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="top">&nbsp;</td>
          </tr>
        <tr>
          <td align="right" valign="top">&nbsp;</td>
          <td width="363" align="center" valign="top"><input name="btnSend" type="submit" class="btn" value="Send" />&nbsp;&nbsp;
            <input type="submit" name="button2" class="btn" value="Cancel" /></td>
          <td width="59" align="right" valign="top">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>

