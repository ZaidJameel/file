<?php 
session_start();
$f="content.txt";
if (isset($_POST['submit'])) {
	$_SESSION['mail']=$_POST['email'];
	$mail=$_SESSION['mail'];
}
	if (isset($_POST['fread'])) {
		if (file_exists($f)) {
			$handle=fopen($f, "r");

			$content=fread($handle, filesize($f));
		}
		else{
				echo "file doesn't exist";
			}

			fclose($handle);

		echo "$content";
		mail($_SESSION['mail'], "fread",$content );
		
	}

	if (isset($_POST['readfile'])) {
		if (file_exists($f)) {
			$content=readfile($f);
		}
		else{
				echo "file doesn't exist";
			}
			mail($_SESSION['mail'], "readfile",$content);
				echo "$content";
		
	}

	if (isset($_POST['file_get_content'])) {
		if (file_exists($f)) {
			$content=file_get_contents($f);
			echo "$content";
		}
		else{
				echo "file doesn't exist";
			}
		mail($_SESSION['mail'], "file_get_contents",$content );
	}

	if (isset($_POST['file'])) {
		if (file_exists($f)) {
			$content=file($f);
			foreach ($content as $key => $value) {
				echo "$value";
			}
		}
		else{
				echo "file doesn't exist";
			}
			mail($_SESSION['mail'], "file",$value );
	}


$d="data.txt";
$data= $_POST['text'];

	if (isset($_POST['fwrite'])) {
		
		$handle=fopen($d, "w");
		fwrite($handle, $data );
		mail($_SESSION['mail'], "writefile",$data );
		echo "$data";
		
	}

	if (isset($_POST['file_put_content'])) {
		
		file_put_contents($d, $data);
		mail($_SESSION['mail'], "file_put_content",$data );
		
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!- Bootstrap CDN -!>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
	
	<form method="POST">
		<input type="email" name="email" placeholder="Enter Email" style="margin-left: 35px; margin-top: 30px;">
		<input type="submit" name="submit">
		<h4 style="margin-left: 160px;margin-top: 50px;">READ FILE</h4><br><br><br>
		<button type="submit" class="btn btn-primary" name="fread" style="margin-left: 35px;">fread</button>
		<button type="submit" class="btn btn-primary" name="readfile" >readfile</button>
		<button type="submit" class="btn btn-primary" name="file_get_content" >file_get_content</button>
		<button type="submit" class="btn btn-primary" name="file" >file</button>

		<h4 style="margin-left: 160px;margin-top: 50px;">WRITE FILE</h4><br><br><br>
		<textarea rows="4" cols="50" name="text" placeholder="Enter content to write here..." style="margin-left: 30px;"></textarea><br><br>
		<button type="submit" class="btn btn-primary" name="fwrite" style="margin-left: 110px;">fwrite</button>
		<button type="submit" class="btn btn-primary" name="file_put_content" >file_put_content</button>
	</form>

</body>


</html>