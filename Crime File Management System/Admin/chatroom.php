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
<title>Chat Room</title>
<style type="text/css">
#current
{
	border-top-left-radius:10px;
	 border-top-right-radius:10px;
	background-color:#5f870e;
}
</style>
<link href="layout.css" rel="stylesheet" type="text/css" />
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
    <td align="center" valign="middle" width="150px" class="menu"><a href="crime.php"> CRIME</a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="chatroom.php">CHAT ROOM</a></td>
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
  <br /><br /><br />
  <table width="100%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><table width="700" border="0">
      <tr>
        <td width="150" align="center" valign="middle"><table width="150" height="455" border="0
        " class="online_users">
          <tr>
            <?php
            $query="SELECT count(name) FROM users WHERE mode='online'";
            $result=mysql_query($query);
            $row=mysql_fetch_row($result);
            echo"<th height=44 id=mHeader scope=col>ONLINE USERS ($row[0])</th>";
            ?>
          </tr>
          <tr>
            <td align="center" valign="top">
            <table width="150" border="0">
            
   <?php 
   $query="SELECT name FROM users WHERE mode='online'"; 
   $result=mysql_query($query);
            while($row=mysql_fetch_row($result))
			{      
  echo"<tr id=user_name>
    <td align=center valign=middle><a href=chatroom.php?chat_client=$row[0]>$row[0]</a></td>
  </tr>"; 
			}
  ?>
  
  
</table>
        </td>
          </tr>
        </table></td>
        <td width="50" align="center" valign="middle">&nbsp;</td>
        <td width="500" align="center" valign="middle">
        
        <?php
        if(isset($_REQUEST['chat_client']))
        {
	     $chat_client=$_REQUEST['chat_client'];
        echo"<div id=wrapper>  
    <div id=menu>  
        <table width=500 border=0>
  <tr>
    <td height=44 align=left><b>&nbsp;$chat_client</b></td><td height=44 align=right>End Chat&nbsp;</td>
  </tr>
</table>
  <form  method=post name=frm><input name=reciever type=hidden value=$chat_client /></form>
    </div>      
    <div id=chatbox>";
    
     
if(file_exists("chat/".$chat_client."_log.html") && filesize("chat/".$chat_client."_log.html") > 0)
{  
    $handle = fopen("chat/".$chat_client."_log.html", "r");  
    $contents = fread($handle, filesize("chat/".$chat_client."_log.html"));  
    fclose($handle); 
    echo $contents;  
}

echo"</div>
    <form name=message action=>  
        <input name=usermsg type=text id=usermsg size=63 />   
        <input type=submit name=submitmsg id=submitmsg value=Submit />
    </form>";
}
?>
       
<script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript"> 
// jQuery Document  
$(document).ready(function(){   
    
    
	
	//If user submits the form  
$("#submitmsg").click(function(){     
    var clientmsg = $("#usermsg").val();
	var reciever= document.frm.reciever.value;
    $.post("post.php", {text: clientmsg, rec:reciever});                
    $("#usermsg").attr("value", "");  
    return false;  
});  

	
	
    //If user submits the form  
$('#usermsg').keypress(function(event) {
	var keycode=(event.keyCode ? event.keyCode : event.which);
	if(keycode=='13')
	{    
    var clientmsg = document.message.usermsg.value;
	var reciever= document.frm.reciever.value;  
    $.post("post.php", {text: clientmsg,rec:reciever});                
    $("#usermsg").attr("value", "");
	return false;  
	}
         
});
 


//Load the file containing the chat log  
function loadLog(){ 
var reciever= document.frm.reciever.value;      
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request  
    $.ajax({  
        url: "chat/"+reciever+"_log.html",  
        cache: false,  
        success: function(html){          
            $("#chatbox").html(html); //Insert chat log into the #chatbox div     
              
            //Auto-scroll             
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request  
            if(newscrollHeight > oldscrollHeight){  
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div  
            }                 
        },  
    });  
}  

setInterval (loadLog, 500);
    
     
}); 

 
</script>  
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
</table>
<br /><br /><br />
  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>