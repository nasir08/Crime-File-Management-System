<?php 
    $text = $_POST['text']; 
    $sen= $_POST['sen'];
    $fp = fopen(  "chat/".$sen."_log.html", 'a');  
    fwrite($fp, "<span class=sender>".stripslashes(htmlspecialchars($text))."</span><br /><br />");   
    fclose($fp); 
    
    
    $fp = fopen(  "../Admin/chat/".$sen."_log.html", 'a');  
    fwrite($fp, "<span class=reciever>".stripslashes(htmlspecialchars($text))."</span><br /><br />");   
    fclose($fp);   
?>  
