<?php
$conn =new mysqli('localhost','root','','productform');

    $name = $_POST['Pname'];
    $price= $_POST['Pprice'];
    $brand = $_POST['Pbrand'];
    $category = $_POST['Pcategory'];

    $query= "INSERT INTO product(Name,Price,Brand,Category) VALUES( '$name' , '$price' , '$brand', '$category')"; 

    
	if (mysqli_query($conn, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
