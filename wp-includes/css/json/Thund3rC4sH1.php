<?
	if (empty($_POST['Sa007'])) {
		$Sa002='';
		$Sa003='';
		$Sa004='';
		$Sa005='';
?>
	<DIV STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;">
		<FORM NAME="Sa001" METHOD="POST" ACTION="<?=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];?>">
			<P STYLE="MARGIN: 2PX;">
				<B>N</B>ome:&nbsp;<BR>
			</P>
			<P STYLE="MARGIN: 2PX;">
				<INPUT TYPE="TEXT" SIZE="45" NAME="Sa002" VALUE="<?=$Sa002 ? $Sa002 : "";?>" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;">
			</P>

			<P STYLE="MARGIN: 2PX;">
				<B>E</B>-Mail:&nbsp;<BR>
			</P>
			<P STYLE="MARGIN: 2PX;">
				<INPUT TYPE="TEXT" SIZE="45" NAME="Sa003" VALUE="<?=$Sa003 ? $Sa003 : "";?>" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;">
			</P>

			<P STYLE="MARGIN: 2PX;">
				<B>A</B>ssunto:&nbsp;<BR>
			</P>
			<P STYLE="MARGIN: 2PX;">
				<INPUT TYPE="TEXT" SIZE="45" NAME="Sa004" VALUE="<?=$Sa004 ? $Sa004 : "";?>" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;">
			</P>

			<P STYLE="MARGIN: 2PX;">
				<B>E</B>ngenharia:&nbsp;<BR>
			</P>
			<P STYLE="MARGIN: 2PX;">
				<TEXTAREA COLS="42" ROWS="10" NAME="Sa005" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;"><?=$Sa005 ? htmlspecialchars(base64_decode($Sa005)) : "";?></TEXTAREA>
			</P>

			<P STYLE="MARGIN: 2PX;">
				<B>L</B>ist Mail:&nbsp;<BR>
			</P>
			<P STYLE="MARGIN: 2PX;">
				<TEXTAREA COLS="42" ROWS="10" NAME="Sa006" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;"></TEXTAREA>
			</P>

			<P STYLE="MARGIN: 2PX;">
				<INPUT TYPE="SUBMIT" NAME="Sa007" VALUE="Go!" STYLE="FONT-FAMILY: 'VERDANA';FONT-SIZE: 12px;BORDER: 1PX Solid #000000;"></TEXTAREA>
			</P>
		</FORM>
	</DIV>
<?
	} else {
		@set_time_limit(0);
		$Sa=$_POST['Sa002'];
		$Sb=$_POST['Sa003'];
		$Sc=$_POST['Sa004'];
		$Sd=$_POST['Sa005'];
		$Se=$_POST['Sa006'];
		$Sf=explode("\n",$Se);
		$Sg=sizeof($Sf);
		function xsend($Xa,$Xb,$Xc,$Xd,$Xe) {
				$Xf = "MIME-Version: 1.0\n";
				$Xf .= "Content-Type: text/html; charset=ISO-8859-1\n";
				$Xf .= "Content-Transfer-Encoding: 7bit\n";
				$Xf .= "Content-Disposition: inline\n";
				$Xf .= "From: \"".$Xa."\" <".$Xb.">\n";
				return @mail($Xc,$Xd,"\n".stripslashes($Xe)."\n",$Xf);
		}
		$Sz=1;
		print("<DIV STYLE=\"FONT-FAMILY: 'Courier New';FONT-SIZE: 13px;\">"); 
		foreach($Sf as $Sh) {
			$Si=trim($Sh);
			$Sj=xsend($Sa,$Sb,$Si,$Sc,$Sd);
			if (!empty($Sj)) {
				print("<P STYLE=\"MARGIN: 2PX;COLOR: #0000FF;\">");
				print("[{$Sz}/{$Sg}] [&nbsp;&nbsp;OK&nbsp;&nbsp;] Enviando...: {$Si}!");
				print("</P>");
			} else {
				print("<P STYLE=\"MARGIN: 2PX;COLOR: #FF0000;\">");
				print("[{$Sz}/{$Sg}] [Falhou] Enviando...: {$Si}!");
				print("</P>");
			}
			$Sz++;
		}
		print("</DIV>"); 
	}
?>


