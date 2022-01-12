<?php
$conn =new mysqli('localhost','root','','productform');

// $ProductID = isset($_GET['GetId']) ? $_GET['GetId'] : '';
    $ProductID = $_POST['ProductID'];
     $name = $_POST['Pname'];
     $price= $_POST['Pprice'];
     $brand = $_POST['Pbrand'];
     $category = $_POST['Pcategory'];

	 
 
     $query= "UPDATE product SET Name='".$name."', Price='".$price."',Brand='".$brand."', Category='".$category."' WHERE ID='".$ProductID."'"; 
      
	if (mysqli_query($conn, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
 
     
     ?>