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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    
    </head> 
        
<body>
<div class="container">

<button class="btn btn-primary my-5"><a href="Index.php" class= "text-light" >ADD User</a></button>
<table class="table caption-top table-bordered">

  <caption><p style="font-weight: bold;"> List View</caption>

 
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

                        <tr ID="<?php echo $ProductID; ?>">
                         <td><?php echo $ProductID ?></td>
                     <td><?php echo $ProductName ?></td>
                      <td><?php echo $ProductPrice?></td>
                     <td><?php echo $ProductBrand?></td>
                     <td><?php echo $ProductCategory?></td>
                   <td><button type="button"id="Edit" class="btn btn-primary "><a href="update.php?GetId=<?php echo $ProductID ?>"class= "text-light" >Edit</a></td></button>
                  <td><button type="submit" class="btn btn-danger remove"> Delete</button></td>
                </tr>  
                                    <?php
                                       }
                                       ?>
</table>
</div>
                                 


<script type="text/javascript">  
  $(".remove").click(function(){
   
   var PID = $(this).parents("tr").attr("ID");
   console.log( PID);
   swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: " Delete it!",
        cancelButtonClass: "btn-warning",
        cancelButtonText: "cancel !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: 'DeleteQuery.php',
             type: 'POST',
             data:{
         
             ProductID: PID
            },
            cache: false,
             error: function() {
                alert(' Something is wrong');
             },
             success: function(data) {
                  $("#"+PID).remove();
                  swal("Deleted!", "Your Data has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your Data is safe :)", "error");
        }
      });
     
    });
 
    
</script>
</body>
</html>