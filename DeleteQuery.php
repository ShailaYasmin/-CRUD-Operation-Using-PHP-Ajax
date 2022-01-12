<?php
$conn =new mysqli('localhost','root','','productform');


$ProductID = $_POST['ProductID'];
  
  $query= "DELETE FROM product WHERE ID='".$ProductID."' "; 
  if (mysqli_query($conn, $query)) {
    echo json_encode(array("statusCode"=>200));
  
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);



?>                     