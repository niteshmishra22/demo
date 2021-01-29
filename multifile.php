<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="upload[]" id="fileToUpload" multiple="multiple"><br><br>

  <input type="submit" value="submit" name="submit">
</form>

</body>
</html>


<?php
include_once 'connection.php';
if(isset($_POST['submit']))
{    

  foreach($_FILES['upload']['name'] as $key=>$name){
     // store each file and write data to DB for each file
     //for example to get the name of file
     //$name = $_FILES['filename']['name'][$key];

     $file = rand(1000,100000)."-".$_FILES['upload']['name'][$key];
      $file_loc = $_FILES['upload']['tmp_name'][$key];
      $file_size = $_FILES['upload']['size'][$key];
      $file_type = $_FILES['upload']['type'][$key];
      $folder="uploadFiles/";

      // new file size in KB
      $new_size = $file_size/1024;  
      // new file size in KB

      // make file name in lower case
      $new_file_name = strtolower($file);
      // make file name in lower case

      $final_file=str_replace(' ','-',$new_file_name);

      if(move_uploaded_file($file_loc,$folder.$final_file))
      {
         
         $sql="INSERT INTO multiimage(multiimage) VALUES('$final_file')";
          $result = mysqli_query($con,$sql);
          if($result)
         {
          echo "upload successfull";
         }
         else{
          echo "something is wrong".mysqli_error($con);
         }
         
      }
 }
}

?>