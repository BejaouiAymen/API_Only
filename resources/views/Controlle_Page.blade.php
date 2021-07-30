<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Pub</h2>
  <p>Change The Publicite Section</p>
  <form action="/view" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" name="titre" class="form-control" id="usr">
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" name="description" class="form-control" id="pwd">
    </div>
    <div class="form-group">
      <label for="img">Image/Video:</label>
      <input type="text" name="contenu" class="form-control" id="img">
    </div>
    
    <div class="form-group">
		<button type="submit" class="btn btn-primary">Modifier</button>						 
	</div>		
  </form>
</div>

</body>
</html>