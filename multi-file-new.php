<!DOCTYPE html>
<html>
<head>
	<title>new multiple file upload</title>
</head>
<body>
	<form method='post' action='#' enctype='multipart/form-data'>
		<div class="form-group">
		 <input type="file" name="file[]" multiple>
		</div> 
		<div class="form-group"> 
		 <input type='submit' name='submit' value='Upload' class="btn btn-primary">
	</div> 
</form>
</body>
</html>

<?php
	if(isset($_POST['submit'])){
	// Count total uploaded files
	$totalfiles = count($_FILES['file']['name']);

	// Looping over all files
	for($i=0;$i<$totalfiles;$i++){
	$filename = $_FILES['file']['name'][$i];
	 
	// Upload files and store in database
	if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'upload/'.$filename)){
	// Image db insert sql
	 $insert = "INSERT into files(file_name,uploaded_on,status) values('$filename',now(),1)";
	 if(mysqli_query($conn, $insert)){
	  echo 'Data inserted successfully';
	 }
	 else{
	  echo 'Error: '.mysqli_error($conn);
	 }
	}else{
	  echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
	} 
	}
	} 

?>