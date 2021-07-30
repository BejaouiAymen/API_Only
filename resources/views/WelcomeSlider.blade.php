<html lang="en">
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
  <title>Screen_Manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<form method="POST" action="/view" enctype="multipart/form-data">
				{{csrf_field()}}
				<fieldset class="border p-2">
   				<legend  class="w-auto">Settings:</legend>
   				<div style="border: 1 solid lightgray;padding: 1%">
   				<h3>Please select what you need:</h3>
   				<div style="padding: 1%">
   				<select id="mySelect" onchange="myFunction()" class="custom-select custom-select-sm">
				  <option selected>Open this select menu</option>
				  <option value="1">Video</option>
				  <option value="2">Image</option>
				  <option value="3">File</option>
				</select>
					<div id="titre1" style="display: none" class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label>Video</label>
						<p>Please select your Youtube Video's ID:</p>
  							
						<input  type="text" id="video" onchange="myFunction(mytitre)" class="form-control " name="video" placeholder="URL du votre Video" value="j"/>
					</div>
					
					<div style="display: none" id="image1" class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label>Image</label>
						
						<input  type="text"  onchange="myFunction(mytitre)" class="form-control " name="image" placeholder="Nombre des Images" value="0"/>
					</div>
					<div style="display: none" id="customFile" class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label>File</label>
							<div id="customFile" class="custom-file mb-3">
		      						<input type="file" class="custom-file-input" name="filename">
		      						<label class="custom-file-label" for="customFile">Choose a file from your system</label>
		    				</div>	
	    			</div>
				</div>
				</div>
					<div class="form-group {{$errors->has('logo')? 'has-error has-feedback' : ''}}">
						<label><h4>Logo</h4></label>
				<div id="customFile" class="custom-file mb-3">
		    	<input type="file" class="custom-file-input" name="logo">
		    	<label class="custom-file-label" for="customFile">Choose a file from your system</label>
		    	</div></div>
					
					<div class="form-group {{$errors->has('color')? 'has-error has-feedback' : ''}}">
						<label><h4>Color of the Header</h4></label> 							
						<input  type="color" id="color" class="form-control " name="color" placeholder="Couleur" value="{{ $model->colortop}}"/>
					</div>
					<div class="form-group {{$errors->has('texte')? 'has-error has-feedback' : ''}}">
						<label><h3>Texte Defillant</h3></label>
  							
						<input  type="text" id="texte" class="form-control " name="texte" placeholder="Please Type your own text:" value="{{ $model->texte}}"/>
					</div>
					<div class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label><h4>Taille en %</h4></label>
  							
						<input  type="text" id="taille" class="form-control " name="taille" placeholder="Left Size" value="{{ $model->taille}}"/>
					</div>
					<div style="border: 1 solid lightgray;padding: 1%">
					<h4>Parametre du Tableau:</h4>
					
					<div style="margin-left: 15px" id="tab" style="display: block" class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label><h4>Column</h4></label>						
						<input  type="text" class="form-control " name="col" placeholder="Nbre column" value="{{$model->col}}"/>
					<label><h4>Ligne</h4></label>						
						<input  type="text" class="form-control " name="ligne" placeholder="Nbre ligne" value="{{$model->ligne}}"/>
					
					</div>	
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Ajouter</button>
						 
					</div>			
				</fieldset>
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>
							{{$error}}
						</li>
						@endforeach
					</ul>	
				</div>
				@endif
			</form>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
    document.getElementById("titre1").style.display="none";
  document.getElementById("image1").style.display="none";
  document.getElementById("customFile").style.display="none";

  if(x==1){
  document.getElementById("titre1").disabled = false;
  document.getElementById("titre1").style.display="block";
	}if(x==2){
  document.getElementById("image1").disabled = false;
  document.getElementById("image1").style.display="block";
	}if(x==3){
  document.getElementById("customFile").disabled = false;
  document.getElementById("customFile").style.display="block";
	}
}
function choiceFunction1(){
  document.getElementById("customFile").style.display="block";
  document.getElementById("titre").disabled = true;


}	function choiceFunction2(){
  document.getElementById("customFile").style.display="none";
  document.getElementById("titre").disabled = false;


}	
	
</script>

</body>

</html>