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
<form method="POST" action="/list">
				{{csrf_field()}}
				<fieldset class="border p-2">
   				<legend  class="w-auto">Table!</legend>
   				<h3>Please select what you need:</h3>
<table class="table table-striped ">
    <thead>
      <tr style="text-align: center">
      	<?php
      	for ($i = 1; $i <= $model->col; $i++){
      		$k1=$tab[$i-1]->image;
			print "<th><input style='text-align: center' type='text' class='form-control ' name='$i' placeholder='Titre $i' value='$k1'/></th>";
		}
		
		?>
      </tr>
    </thead>
<tbody>
	<?php
	$nb=$i;
	$case=6;
	$etat=10;
      	for ($i = 1; $i <= $model->ligne-1; $i++){
      		print"<tr>";
      	for ($j = 1; $j <= $model->col; $j++){
      		
				$k=$tab[$nb-1]->image;
			if($case-$nb==0){
				$case=$case+5;
				print"<td><select name='$nb' class='custom-select custom-select-sm'>
				  <option selected>Open this select menu</option>
				  <option value='gb'>English</option>
				  <option value='fr'>Frencha</option>
				  <option value='es'>Spanish </option>
				  <option value='it'>Italian </option>
				  <option value='de'>GERMAN</option>
				  <option value='ru'>Russian</option>
				  <option value='tn'>Arabic</option>
			  	  <option value='cn'>Chinese</option>
					</select></td>";
			}elseif($etat-$nb==0){
				$etat=$etat+5;
				print"<td><select name='$nb' class='custom-select custom-select-sm'>
				  <option selected>Open this select menu</option>
				  <option value='Confirmé'>Confirmé</option>
				  <option value='Reporté'>Reporté</option>
				 <option value='Annulé'>Annulé</option>
					</select></td>";
			}
			else{
			print"<td><input style='text-align: center' type='text' class='form-control ' name='$nb' placeholder='remplir case num [$nb]' value='$k'/></td>";
		}$nb++;}
		print"</tr>";      		
		
		}
      ?>
</tbody>
</table>

<div class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label><h3>Color</h3></label> 							
						<input  type="color" id="color" class="form-control " name="color" placeholder="Couleur" value="{{ old('color')}}"/>
					</div>
<div class="form-group">
						<button type="submit" class="btn btn-primary">Ajouter</button>
						 
					</div>	
</fieldset>
</form>
</body>
</html>