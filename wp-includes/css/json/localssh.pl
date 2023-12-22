#!/usr/bin/perl
#
# A local SSH 3.0.0 vulnerability scanner for the
# SSH Short Password Login Vulnerability
#
# Note: You must have superuser access on the system to scan it.
#
# usage: ./ssh3.pl <host>
# Optional: -e turn off error
# -h specify a different /etc/shadow file
# (Options must come before host name)
#
# Written by hypoclear hypoclear@jungle.net - http://hypoclear.cjb.net
#
# This and all of my programs fall under my disclaimer, which
# can be found at: http://hypoclear.cjb.net/hypodisclaim.txt


use IO::Socket; use Getopt::Std;
getopts('h:e');

die "\nusage: $0 <host>\n\tOptional: -e turn off error\n\t\t -h specify a different /etc/shadow file\n\n" unless @ARGV > 0;
if (!defined $opt_h)
 { $opt_h = "/etc/shadow";
 }

$out = &bannerGrab($ARGV[0],22);
sysread $out, $message,100;
close $out;

if (($message =~ /3.0.0/) || (defined $opt_e))
 { print "Running SSH 3.0.0, checking for vulnerabilities...\n\n";
   open(SHADOW, "<$opt_h") || die "Cannot open $opt_h!\nNote: You must have superuser access to run this script.\n\n";
   while(<SHADOW>)
     { $name = $_;
       $name =~ s/:.*$//;
       $_ =~ s/^.*?\://;
       $_ =~ s/:.*$//;
       $name =~ s/\s//g; $_=~s/\s//g;
       push(@name,$name);
       push(@hash,$_);
       push(@lnnum,$cnt++); $cnt++;
     }
   close(SHADOW);

   foreach $hash (@hash)
     { @chars = split(//,$hash);
       foreach $char (@chars)
         { $count++;
         }
       if ($count <= 2)
        { print "$name[$line]\t(line $lnnum[$line]) may be vulnerable!\n";
          $vulnFlag = 1;
        }
       $count=0; $line++;
     }
   if ($vulnFlag != 1)
    { print "No accounts appear to be vulnerable.\n";
    }
 }
else
 { if (!defined $opt_e)
    { print "You are not running SSH 3.0.0.\n";
      die "If you feel that this is an error run with the -e option.\n";
    }
 }
print "\n";


sub bannerGrab
{ $host = gethostbyname($_[0]) || warn "cannot connect to $ARGV[0]\n";
  $port = getservbyport($_[1], 'tcp');
  $haddr = sockaddr_in($_[1], $host);
  socket(OUT, PF_INET, SOCK_STREAM, getprotobyname('tcp')) || warn "$!\n";
  connect(OUT, $haddr) ;
  return OUT;
} 