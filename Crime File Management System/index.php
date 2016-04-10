<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crime File Management System</title>
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
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/others.js"></script>
    <script type="text/javascript" src="js/dropdown.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript">
        jQuery('#slider').cycle({
            timeout: 8000,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:     'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            prev:   '#slideprev', // selector for element to use as click trigger for next slide  
            next:   '#slidenext', // selector for element to use as click trigger for previous slide
            pause:   true,	  // true to enable "pause on hover"
            cleartypeNoBg: true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });

    </script>
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
  <td align="center" valign="middle" width="150px" class="menu" id="current"><a href="../CFMS"><div>HOME PAGE</div></a></td>
  <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Register"><div>REGISTER</div></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Admin/Admin-login"><div>ADMIN</div></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Users/User-login"><div>USERS</div></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Most Wanted"><div>MOST WANTED</div></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="Missing Persons"><div>MISSING PERSONS</div></a></td>
    <td align="center" valign="middle" width="5px">&nbsp;</td>
    <td align="center" valign="middle" width="150px" class="menu"><a href="contact.php"><div>CONTACT</div></a></td>
  </tr>
    </table>
    </center>
   </div>
   <div id="separator">
   
   </div>
  </div>
  <div id="spacer"></div>
  <div id="slider-container">
    <ul id="slider">
        <li><img src="images/slide1.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide2.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide3.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide4.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide5.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide6.jpg" alt="" width="770" height="276" /></li>
        <li><img src="images/slide7.jpg" alt="" width="770" height="276" /></li>
    </ul>
    </div><!-- #slider-container -->
  <div id="spacer"></div>
  <div id="body">
   <table width="741" border="0">
  <tr>
    <td id="pcHolder" width="324" valign="top"><img src="images/ChiefPaulKeenan.jpg" width="322" height="225" /></td>
    <td width="6">&nbsp;</td>
    <td width="397" align="left"><font color="#5f870e" size="+3">Chief of Police</font><br />
      <br /><br />
      P<b>aul Keenan</b><br />
      1 Sea Street<br />       
      Quincy, MA 02169<br />       
      <b>Phone:</b> (617) 479-1212<br />       
      <b>Fax:</b> (617) 745-5749<br />      
      <b>Email:</b> <a href="mailto:paul_keenan@gmail.com">paul_keenan@gmail.com</a><br /><br />      
      Call <font color="#5f870e" size="+1">911</font> For All Emergencies!</td>
  </tr>
</table>
  </div>
  <table width="748">
  <tr>
    <td width="740" align="left">
    <font color="#5f870e" size="+2">Our Mission:</font><br />
  To create a proactive partnership with the citizens<br /> 
  of quincy that best serves the needs of the community,<br />
  and to attain a high quality of life for all citizens of<br />
  Quincy.
    </td>
  </tr>
</table>
<div id="spacer"></div>
  <table width="100%" id="footer">
  <tr>
    <td align="center" valign="middle">Copyright &copy; <?php echo date('Y'); ?> Group 8. All rights reserved</td>
  </tr>
</table>
 </center>
</body>
</html>