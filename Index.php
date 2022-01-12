<!-- Index -->
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
    <title>Product Form</title>
  </head>
  <body>
    <div class="container my-5">

    <form id="fupForm" name="form1" method ="POST">
    <div class="form-group">
    <label>Product Name</label>
    <input type="Text" class="form-control" id="Pname" placeholder="Enter Product Name" name="Pname">
</div>

<div class="form-group">
    <label>Product Price</label>
    <input type="Number" class="form-control"id="Pprice" placeholder="Enter Product Price" name="Pprice">
</div>
<div class="form-group">
    <label>Product Brand</label>
    <input type="Text" class="form-control"id="Pbrand" placeholder="Enter Product Brand" name="Pbrand">
</div>

<div class="form-group">
    <label>Product Category</label>
    <input type="Text" class="form-control"id="Pcategory" placeholder="Enter Product Category" name="Pcategory">
</div>
 
  <button type="button"id="submit" class="btn btn-success">Submit</button>
</form>

</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
	$('#submit').on('click', function() {
		var Pname = $('#Pname').val();
		var Pprice = $('#Pprice').val();
		var Pbrand = $('#Pbrand').val();
		var Pcategory = $('#Pcategory').val();
		if(Pname!="" && Pprice!="" && Pbrand!="" && Pcategory!=""){
			$.ajax({
				url: "Insert.php",
				type: "POST",
				data: {
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
            title: "Submitted!",
            text: "Saved The Data!",
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

  </body>
</html>
