<!DOCTYPE html>
<html>
<head>
	<title>dynmic textbox</title>
</head>
<body>
	<DIV class="product-item float-clear" style="clear:both;">
	<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
	<DIV class="float-left"><input type="text" name="item_name[]" /></DIV>
	<DIV class="float-left"><input type="text" name="item_price[]" /></DIV>
	</DIV>
</body>


<?php

if(!empty($_POST["save"])) {
	    $conn = mysqli_connect("localhost","root","test", "blog_samples");
		$itemCount = count($_POST["item_name"]);
		$itemValues=0;
		$query = "INSERT INTO item (item_name,item_price) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_price"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["item_name"][$i] . "', '" . $_POST["item_price"][$i] . "')";
			}
		}
		$sql = $query.$queryValue;
		if($itemValues!=0) {
		    $result = mysqli_query($conn, $sql);
			if(!empty($result)) $message = "Added Successfully.";
		}
	}

?>






<script>
	function addMore() {
   $("<DIV>").load("input.php", function() {
      $("#product").append($(this).html());
   });	
}

function deleteRow() {
   $('DIV.product-item').each(function(index, item){
      jQuery(':checkbox', this).each(function () {
         if ($(this).is(':checked')) {
	    $(item).remove();
         }
      });
   });
}
</script>
</html>