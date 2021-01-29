<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Delete multiple record with checkboxes in PHP Mysqli using Jquery AJAX</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="container" style="margin-top: 50px;">
      <h2 class="text-center"><b>Delete multiple record with checkboxes in PHP Mysqli using Jquery AJAX</b></h2><br>
      <button type="button" class="btn btn-success btn-md" style="float:right;margin-bottom: 10px">Delete Record</button><br>
      <div class="result">
        <!--- Display record here --->
      </div>
    </div>
  </body>
</html>

<!---jQuery ajax live search --->
<script type="text/javascript">
    $(document).ready(function(){
        // fetch data from table without reload/refresh page
        loadData();
        function loadData(query){
          $.ajax({
            url : "display.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }
        // Delete multiple record 
        $(".btn-success").click(function(){
          
          var id = [];
          $(".delete-id:checked").each(function(){
              id.push($(this).val());
              element = this;
          });
          
          if (id.length > 0) {
              if (confirm("Are you sure want to delete this records")) {
                $.ajax({
                    url : "delete.php",
                    type: "POST",
                    cache:false,
                    data:{deleteId:id},
                    success:function(response){
                      if (response==1) {
                          alert("Record delete successfully");
                          loadData();
                      }else{
                          alert("Some thing went wrong try again");
                      }
                    }
                });
              }
          }else{
            alert("Please select atleast one checkbox");
          }
        });
    });
</script>


// display.php

<?php
  // include database connection file

  include "connection.php";

  // fetch data from student table..

  $output = "";
  
  $sql = "SELECT * FROM students ORDER BY id ASC";
  
  $query = mysqli_query($con, $sql);

  if (mysqli_num_rows($query) > 0) {
    $output .= "<table class='table table-hover table-striped'>
    <thead>
         <tr>
        <th>Id</th>
        <th>Firs name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>City name</th>
        <th>Delete</th>
       </tr>
    </thead>";
    while ($row = mysqli_fetch_assoc($query)) {
    $output .= "<tbody>
      <tr>
              <td>{$row['id']}</td>
          <td>{$row['first_name']}</td>
          <td>{$row['last_name']}</td>
          <td>{$row['email']}</td>
          <td>{$row['city_name']}</td>
          <td><input type='checkbox' class='delete-id' value='{$row['id']}'></td>
      </tr>
            </tbody>";
    }
  $output .="</table>";
    echo $output;
  }else{
    echo "<h5>No record found</h5>";
  }
  
?>


// delete.php

<?php
  // include database connection file

  include "connection.php";

  // delete data from student table..

  if (isset($_POST['deleteId'])) {
    
    $deleteId = $_POST['deleteId'];
    // implode function break the array in to string 
    $deleteId = implode(',', $deleteId);
    
    $query  = "DELETE FROM students WHERE id IN($deleteId)";

    $result = mysqli_query($con, $query);

    if ($result === true) {
      echo 1;
    }else{
      echo 0;
    }

  }
  
?>