<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
<body>
<form class="form-horizontal" action="" method="post">
    <div class="control-group">
        <div class="inc">
            <div class="controls">
                <input type="text" class="form-control" name="textbox[]" placeholder="textbox"/> 
                <input type="text" class="form-control" name="text[]" placeholder="text"/>
                <button style="margin-left: 50px" class="btn btn-info" type="submit" id="append" name="append">
                Add Textbox</button>
                <br>
                <br>
                
            </div>
            <input type="submit" name="submit" value="submit">
        </div>
       <!--  <input type="submit" class="btn btn-info" name="submit" value="submit"/> 
        <input type="text" class="form-control" name="textbox" placeholder="texbox"/> 
    <input type="text" class="form-control" name="text" placeholder="text"/> -->
    </div>
    
</form>
</body>
</html>



<?php
include_once 'connection.php';
if(isset($_POST['submit']))
        {
        //     echo $_POST['textbox']."<br>";
        //     echo $_POST['text']."<br>";

       
        // foreach($_POST['textbox'] as $name){
        //       $sql = "INSERT INTO multiplebox(t1) values ('".mysqli_real_escape_string($name)."')";
        //       mysqli_query($con,$sql);
        // }
            echo "hello";

        
        }

?>



<script>
    jQuery(document).ready( function () {
        $("#append").click( function(e) {
          e.preventDefault();
        $(".inc").append('<div class="controls">\
                <input class="form-control" type="text" name="textbox[]" placeholder="textbox">\
                <input class="form-control" type="text" name="text[]" placeholder="text">\
                <a href="#" class="remove_this btn btn-danger">remove</a>\
                <br>\
                <br>\
            </div>');
        return false;
        });

    jQuery(document).on('click', '.remove_this', function() {
        jQuery(this).parent().remove();
        return false;
        });
    $("input[type=submit]").click(function(e) {
      e.preventDefault();
      $(this).next("[name=textbox]")
      .val(
        $.map($(".inc :text"), function(el) {
          return el.value
        }).join(",\n")
      )
    })
  });
</script>