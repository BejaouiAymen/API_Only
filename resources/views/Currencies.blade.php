@extends('Layout')
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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	@section('content')

<div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Country</th>
        <th>Symbol</th>    
        <th>Name</th>
        <th>Currencie</th>
        <th>Money</th>

      </tr>
    </thead>
    <tbody>
    	<?php $i=0; ?>
    	@foreach($k as $key => $value)
      <tr>
      	<td><img src="https://www.countryflags.io/{{$key[0]}}{{$key[1]}}/shiny/64.png">
</td>
<td>{{$key}}</td>
        
<td>
	<?php
	echo $k1[$i][0]['name'];?>
	</td>
     
<td>
	<?php
	echo $k1[$i][0]['symbol'];$i++ ;?>
</td>
        <td>{{$value}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>  @endsection



@section('footer')
<div style="float: right" id="heure">
    </div>      
    <script>
   
    setInterval(function(){
    var heure    = new Date();
    var uminute = heure.getMinutes();
    var useconde = heure.getSeconds();
    var uheure = heure.getHours(); 
    document.getElementById('heure').innerHTML=uheure + "h:" + uminute + "min:" + useconde +"sec";}, 1);
  
    </script>
<marquee height="20xp" width="100%" direction="left">

    <P><FONT face="Verdana" style="color: black" size="3">Bienvenue Chez Kamel_Baccouri</FONT>

</marquee>
@endsection
</body>

</html>