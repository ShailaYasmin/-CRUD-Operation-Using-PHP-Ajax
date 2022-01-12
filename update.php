 <?php 

$conn =new mysqli('localhost','root','','productform');
   $ProductID = isset($_GET['GetId']) ? $_GET['GetId'] : '';
   $query = " SELECT * from product where ID='".$ProductID."'";
   $result = mysqli_query($conn,$query);


while($row=mysqli_fetch_assoc($result))
{
$ProductID = $row['ID'];
$name = $row['Name'];
$price = $row['Price'];
$brand = $row['Brand'];
$category =$row['Category'];


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Product Update Form</title>
  </head>
  <body>
    <div class="container my-5">

    <form method ="POST">
      
    <div class="form-group">
    <!-- <label>Product ID</label> -->
    <input type="hidden" class="form-control" id="ProductID" placeholder="Enter Product Name" name="ProductID"value="<?php echo  $ProductID; ?>" >
</div>

   
  <div class="form-group">
    <label>Product Name</label>
    <input type="Text" class="form-control" id="Pname" placeholder="Enter Product Name" name="Pname"value="<?php echo  $name ; ?>" >
</div>

<div class="form-group">
    <label>Product Price</label>
    <input type="Number" class="form-control" id="Pprice" placeholder="Enter Product Price" name="Pprice"value="<?php echo  $price ; ?>">
</div>
<div class="form-group">
    <label>Product Brand</label>
    <input type="Text" class="form-control" id="Pbrand" placeholder="Enter Product Brand" name="Pbrand"value="<?php echo  $brand ; ?>">
</div>

<div class="form-group">
    <label>Product Category</label>
    <input type="Text" class="form-control" id="Pcategory" placeholder="Enter Product Category" name="Pcategory"value="<?php echo  $category ; ?>">
</div>
 
  <button type="button"id="update" class="btn btn-primary">Update</button>
</form>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
	$('#update').on('click', function() {
    var ProductID = $('#ProductID').val();            
		var Pname = $('#Pname').val();
		var Pprice = $('#Pprice').val();
		var Pbrand = $('#Pbrand').val();
		var Pcategory = $('#Pcategory').val();
    

		if(Pname!="" && Pprice!="" && Pbrand!="" && Pcategory!="" && ProductID!=""){
			$.ajax({
				url: "updateQuery.php",
				type: "POST",
       
				data:{
         
          ProductID: ProductID,
					Pname: Pname,
          Pprice: Pprice,
          Pbrand: Pbrand,
          Pcategory: Pcategory
          

        },
         
        
				cache: false,
				success: function(dataResult){
          
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200){
          swal({
            title: "Updated!",
            text: "Update The Data!",
            icon: "success",
            type: "success"}).then(okay => {
              if (okay) {
                window.location.assign("view.php")
              }
            });
                      

        }
					
				}
      
			});
      
		 }
		else{
      swal({
            title: "Empty Fields!",
            text: "Please Fill It Up!",
            icon: "warning",
            type: "warning"})
			// alert('Please fill all the field !');
		}
	});
});
</script>
<?php  } ?>
  </body>
</html>
