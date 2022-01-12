<?php 

$conn =new mysqli('localhost','root','','productform');
    $query = " select * from product ";
    $result = mysqli_query($conn,$query);
 
    
      
      

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
    </head> 
        
<body>
<div class="form-group">
    <!-- <label>Product ID</label> -->
    <input type="hidden" class="form-control" id="ProductID" placeholder="Enter Product Name" name="ProductID"value="<?php echo  $ProductID; ?>" >
</div>
<button class="btn btn-primary my-5"><a href="Index.php" class= "text-light" >ADD User</a>

</button>
<table class="table caption-top">

  <caption><p style="font-weight: bold;"> List View</caption>
  <form action="update.php?ID=<?php echo $ProductID ?>"method ="POST">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ProductName</th>
      <th scope="col">ProductPrice</th>
      <th scope="col">ProductBrand</th>
      <th scope="col">ProductCategory</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <?php 
       while($row=mysqli_fetch_assoc($result))
       {
           $ProductID = $row['ID'];
           $ProductName= $row['Name'];
           $ProductPrice= $row['Price'];
           $ProductBrand= $row['Brand'];
           $ProductCategory= $row['Category'];                              
     
  ?>

          <tr>
                                        <td><?php echo $ProductID ?></td>
                                        <td><?php echo $ProductName ?></td>
                                        <td><?php echo $ProductPrice?></td>
                                        <td><?php echo $ProductBrand?></td>
                                        <td><?php echo $ProductCategory?></td>
                                        <td><button type="button"id="Edit" class="btn btn-primary my-5"><a href="update.php?GetId=<?php echo $ProductID ?>"class= "text-light" >Edit</a></td>
                                        <td><button type="button"id="Delete" class="btn btn-primary my-5"><a href="view.php?Del=<?php echo $ProductID?>"class= "text-light" >Delete</a></td>
                                    </tr>  
                                    <?php
                                       }
                                       ?>
</table>
</div>
                                      </form>



                 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
	$.ajax({
		url: "view.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
	}
  });
	$(document).on("click", ".Delete", function() { 
		var $ele = $(this).parent().parent();
		$.ajax({
			url: "DeleteQuery.php",
			type: "POST",
			cache: false,
			data:{
				ProductID: $(this).attr("data-ProductID")
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
	});
});
</script>
</body>
</html>