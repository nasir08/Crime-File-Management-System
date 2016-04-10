<?php 
$rec= $_POST['rec'];
    $text = $_POST['text']; 
    $fp = fopen("chat/".$rec."_log.html", 'a');  
    fwrite($fp, "<span class=sender>".stripslashes(htmlspecialchars($text))."</span><br /><br />");   
    fclose($fp); 
	
	
	$fp = fopen("../Users/chat/".$rec."_log.html", 'a');  
    fwrite($fp, "<span class=reciever>".stripslashes(htmlspecialchars($text))."</span><br /><br />");   
    fclose($fp); 
?>  
