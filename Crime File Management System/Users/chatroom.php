<?php
  session_start();
 if(isset($_SESSION['uName']))
 {
 $uName=$_SESSION['uName'];
 
 $name=$_SESSION['name'];
 $chat_client= $_REQUEST['name'];
 
 $userID=$_SESSION['id'];
 }
 else
 {
    header('Location:User-login');
 }
?>
<form name="frm" method="post"><input id="name" name="name" type="hidden" value=<?php echo $name ?>></form>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chatroom</title>
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
    <td align="right"><a href="../users">[ Report Crime ]</a> <a href="report-missing-person.php"> [ Report Missing Person ]</a> <a href=../logout.php?id=<?php echo $userID ?> >[ Log Out ]</a></td>
  </tr>
</table>
<br /><br /><br />



<table width="100%" border="0" height="441">
  <tr>
    <td align="center" valign="middle"><table width="506" border="0">
      <tr>
        <td width="500" align="center" valign="middle">
          
          <div id=wrapper>  
          <div id=menu>  
            <table width=500 border=0>
              <tr>
                <th height=44 id="mHeader">CHAT ROOM</th>
                </tr>
  </table>
            <form  method=post name=frm id=frm><input name=reciever id=reciever type=hidden value=<?php echo $chat_client ?> ></form>
            </div>      
          <div id=chatbox>
            
            
            <?php if(file_exists("chat/".$chat_client."_log.html") && filesize("chat/".$chat_client."_log.html") > 0)
            {  
            $handle = fopen("chat/".$chat_client."_log.html", "r");  
            $contents = fread($handle, filesize("chat/".$chat_client."_log.html"));  
            fclose($handle); 
            echo $contents;  
            } ?>
            
  </div>
          <form id="message" name="message" method="post">  
            <input name="usermsg" type="text" id="usermsg" size="63" />   
            <input type="submit" name="submitmsg" id="submitmsg" value="Send" />
            </form>
          
   </div>       
  <script type="text/javascript" src="js/jquery.min.js"></script>  
<script type="text/javascript">  
// jQuery Document  
$(document).ready(function(){  
  
  
  
//If user submits the form  
$("#submitmsg").click(function(){     
    var clientmsg = $("#usermsg").val();
    var client_name = $("#reciever").val();  
    $.post("postC.php", {text: clientmsg, sen:client_name});                
    $("#usermsg").attr("value", "");  
    return false;  
});  



//If user submits the form  
$('#usermsg').keypress(function(event) {
	var keycode=(event.keyCode ? event.keyCode : event.which);
	if(keycode=='13')
	{    
    var clientmsg = $("#usermsg").val();
	var client_name = $("#reciever").val();  
    $.post("postC.php", {text: clientmsg, sen:client_name});                
    $("#usermsg").attr("value", "");
	return false;  
	}
         
});
  



function loadLog(){ 
var client_name = $("#reciever").val();       
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request  
    $.ajax({  
        url: "chat/"+client_name+"_log.html",  
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
  <table width="100%" id="loginfooter">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>