#!/usr/local/bin/perl
## COMANDO PARA RODAR EM HIDE
## use: nohup perl send.pl emails.txt "cetelem@service.info" "Cetelem - El prestamo personal que necesitas." Cetelem.html >> oks &
## use: nohup perl send.pl emails.txt "email@email.com" "You have an outstanding payment." usa.html >> oks &
## COMANDO PARA VERIFICAR A QUANTIDADE DE ENVIADOS
## wc -l oks

$ARGC=@ARGV;



if ($ARGC !=4) {

 printf "$0 <mailist> <remetente> <assunto> <engenharia.html>\n";

 printf "x";

 exit(1);

}



$mailtype = "content-type: text/html";



$sendmail = '/usr/sbin/sendmail';



$sender = $ARGV[1];

$subject = $ARGV[2];



$efile = $ARGV[0];

$emar = $ARGV[0];



open(FOO, $ARGV[3]);

@foo = <FOO>;

$corpo = join("\n", @foo);



open (BANDFIT, "$emar") || die "Can't Open $emar";



while(<BANDFIT>)        {



($ID,

 $options) = split(/\|/,$_);

chop($options);

  foreach ($ID) {





$recipient = $ID;



open (SENDMAIL, "| $sendmail -t");

print SENDMAIL "$mailtype\n";

print SENDMAIL "Subject: $subject\n";

print SENDMAIL "From: $recipient\n";

print SENDMAIL "To: $recipient\n\n";

print SENDMAIL "$corpo\n\n";

close (SENDMAIL);

printf "Enviado para $recipient ok";









}



}

close(BANDFIT);


