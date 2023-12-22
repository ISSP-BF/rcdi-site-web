<?php
/*///////////////////////////////////////////////////////
///
///             Script Uploaded By Shem3a               
///                          
///      https://www.facebook.com/shem3a.scripts 
///           
///      https://web.facebook.com/groups/325894651243734            
///                          
///      http://www.shem3a.com                    
///                          
///////////////////////////////////////////////////////*/ 
error_reporting(E_ALL);
ini_set('display_errors','On');

  function getDirectoryList ($directory) 
  {

    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // open directory and walk through the filenames
    while ($file = readdir($handler)) {

      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != "..") {
	$ext = substr($file, strlen($file)-3, strlen($file));
	if($ext == 'zip')
        	$results[] = $file;
      }

    }

    // tidy up: close the handler
    closedir($handler);

    // done!
    return $results;

  }

$list = getDirectoryList(dirname(__FILE__));


if(isset($_GET['file_name']) && !empty($_GET['file_name']) && file_exists($_GET['file_name']))
{
	  $zip = new ZipArchive;

	//$zipFilename = substr($_GET['file_name'], 0, -4);
	  $zipped = $zip->open($_GET['file_name']);

	  if ( $zipped == TRUE) {

	  if(!$zip->extractTo(dirname(__FILE__))){
			echo "Unzip failed";
		}
	  $zip->close();
	
	  echo "File ".$_GET['file_name'].' unzip successfully.';
	}else{
		echo "Unable to unzip: failed.";
	}
}
?>
<br/>
<br/>
<br/>
<br/>
<?php

if(count($list) == 0 )
	echo "[<b>Www.shem3a.com</b>]==> Sorry,No Zip files available in the directory ".dirname(__FILE__);
else
{
	echo "[<b>Www.shem3a.com</b>]==> Zip files of directory: ".dirname(__FILE__).'<br/>';
	echo "Select a zip file & click StartUnzip button to unzip the file.<br/><br/><br/>";
?>
<html>
<head>
<title>Unzip Script</title>
</head>
<body>
	<form method="get" action="unzip.php">

		<select name="file_name">
			
			<?php
			foreach($list as $item):
				echo "<option>".$item."</option>";
			endforeach;
			?>
		</select>
		
		<input type="submit" value="StartUnzip">
	</form>
</body>
</html>

<?php
}
?>