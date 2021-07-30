@extends('Layout')
<html lang="en">
<head>
	<style>
        html {
  height: 100%;
}
body {
  min-height: 100%;
}

		.my-custom-scrollbar {
position: relative;
height: 490px;
overflow: auto;
}
.column {
  float: left;
  width: 24%;height: auto;}
.table-responsive{
            overflow-y: auto;
            border:2px solid #444;
          }
          
.table-wrapper-scroll-y {
display: block;
}
.table{
 background: #212529 !important;
  color: white !important;
}
	</style>
  <title>Bootstrap Example</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head>
<body>

@section('name')
<div class="container">
    <div class="column" style="border-style: solid;"><h1> <b style="color: black;text-transform: capitalize">  {{$day}}   </b></h1></div>
    <div class="col-sm-1"></div>
    <div class="column" style="border-style: solid;"><h1> <b >{{$date}}</b></h1></div>
    <div class="col-sm-1"></div> 
    <div class="column "  style="border-style: solid;"><h1><b id="heure"></b></h1> </div>
    
    <div class="col-sm-1/2" style="text-align: right" >
    	<img src="{{$model->name}}" width="100xp" height="75xp" ></div>
@endsection

	
@section('content0')
@if($table)
<h1 style="background-color: {{$model->table}}; text-align: center; color: white;font-weight: bold;">Emploi du Temps</h1>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
   </script>
   @if($model->ligne>7)
<div  class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
	@endif
	 <table class="table  table-bordered">
    <thead>
      <tr style="background-color: {{$model->table}}">
      	
      	@for ($i = 0; $i < $model->col; $i++)
			<th style="text-align: center">{{$table[$i]->image}}</th></th>
		@endfor
		
      </tr>
    </thead>
<tbody>
	<?php
      	$nb=$i;$case=5;$etat=9  ?>
      	@for ($i = 1; $i <= $model->ligne-1; $i++)
      		<tr>
      	@for ($j = 1; $j <= $model->col; $j++)
      	@if($case-$nb==0)
      	<td style="text-align: center"><img  height="55xp" src="https://www.countryflags.io/{{$table[$nb]->image}}/shiny/64.png"></td>
      	<?php $case=$case+5; ?>
      	@elseif($etat-$nb==0)
      		@if($table[$nb]->image=="Confirmé")
      		<td style="text-align: center;background-color: #8EC760;vertical-align: middle">{{$table[$nb]->image}}</td>
      		@endif
      		@if($table[$nb]->image=="Reporté")
      		<td style="text-align: center;background-color: #ffa31a;vertical-align: middle">{{$table[$nb]->image}}</td>
      		@endif
      		@if($table[$nb]->image=="Annulé")
      		<td style="text-align: center;background-color: #ff1c1c;vertical-align: middle">{{$table[$nb]->image}}</td>
      		@endif
      		      	<?php $etat=$etat+5; ?>

      	@else
			<td style="text-align: center;vertical-align: middle;">{{$table[$nb]->image}}</td>
		@endif
		<?php $nb++; ?>
		@endfor
		</tr>      		
		
		@endfor
    
</tbody>
</table>
</div>
<script> var $el = $(".table-responsive");
        function anim() {
          var st = $el.scrollTop();
          var sb = $el.prop("scrollHeight")-$el.innerHeight();
          $el.animate({scrollTop: st<sb/2 ? sb : 0}, 4000, anim);
        }
        function stop(){
          $el.stop();
        }
        anim();
</script>    
@endif
@endsection


@section('content')
<?php
if($model->video!="j"){
	echo strip_tags($model->video,"<iframe>");
}
?>
@if($model->image!=0)
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   		@for($i = 1; $i < $model->image; $i++)		
      <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
      @endfor
	</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{$image[0]->image}}" style="width:100%;height: 548">
      </div>
   		@for($i = 1; $i < $model->image; $i++)		
      <div class="item">
        <img src="{{$image[$i]->image}}" height="460xp" style="width:100%;height: 548">
      </div>
    @endfor
      
    </div>

    <!-- Left and right controls -->
    
  </div>
@endif


@endsection



@section('footer')

    <script>

    setInterval(function(){
    var heure    = new Date();
    var uminute = heure.getMinutes();
    var useconde = heure.getSeconds();
    var uheure = heure.getHours(); 
    document.getElementById('heure').innerHTML=uheure + "H:" + uminute + "min:" + useconde +"s";}, 1);
  
    </script>
<marquee height="20xp" width="100%" direction="left">

    <P><FONT face="Verdana" style="color: white" size="3">{{$model->texte}}</FONT>

</marquee>
@endsection
</body>

</html>