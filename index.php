<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
	  Name: <input type="text" name="name"><br><br>
	E-mail: <input type="text" name="email"><br><br>
	Website: <input type="text" name="website"><br><br>
	Comment: <textarea name="comment" rows="5" cols="40"></textarea><br><br>
	<input type="radio" name="gender" value="female">Female
	<input type="radio" name="gender" value="male">Male
	<input type="radio" name="gender" value="other">Other <br><br>

  <input type="submit" value="submit" name="submit">
</form>

</body>
</html>