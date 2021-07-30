<html>
	
<head>
<style>
.my-custom-scrollbar {
position: relative;
height: 460px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
	  <title>Bootstrap Example</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<form method="POST" action="/image" enctype="multipart/form-data">
		{{csrf_field()}}
		<fieldset class="border p-2">
   		<legend  class="w-auto">Images!</legend>
   		<h3>Please Type your image's URL:</h3>
   		@for($i = 1; $i <= $model->image; $i++)		
			<label>File</label>
				<div id="customFile" class="custom-file mb-3">
		    	<input type="file" class="custom-file-input" name="{{$i}}">
		    	<label class="custom-file-label" for="customFile">Choose a file from your system</label>
		    	</div>
		@endfor

<div class="form-group">
						<button type="submit" class="btn btn-primary">Ajouter</button>
						 
					</div>	
</fieldset>
</form>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>