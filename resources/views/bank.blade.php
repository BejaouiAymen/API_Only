<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 50%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 50%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: rgba(170, 170, 170, 0);
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
  resize: both;
  overflow: auto;

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body onload="startTime()">

<div class="header">
  <h1>My Website</h1>
  <p>Resize the browser window to see the effect.</p>
</div>

<div class="topnav">
  <a href="#" style="float:right" id="txt"></a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
     <!-- <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p style="color: transparent;">Some text..</p>
      <p style="color: transparent;">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    -->
    <img src="https://img1.bonnesimages.com/bi/bonjour/bonjour_135.jpg" width="100%" height="100%" /></div>
    
  </div>
  <div class="rightcolumn">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Image URL</th>
        <th>Modifier</th>
        <th>Supprimer</th>

      </tr>
    </thead>
@foreach ($bank as $us)
 
    <tbody>
      <tr>
        <td><center>{{$us->titre}}</center></td>
        <td><center>{{$us->description}}</center></td>
        <td><center>${{$us->prix}}</center></td>
 		<td><center><img class="zoom img-fluid" src="{{ $us->URL}}" alt="Alternate Text" /></center></td>
        <td><center> <a href="hotel/{{$us->id}}/edit">Update</a></center></td>
        <td><center> <a href="hotel/{{$us->id}}">delete</a></center></td>

      </tr>
	</tbody>

@endforeach

</table> 
      
  </div>
  </div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script>
  
  var x=0;
  var y=0;
  var k=0;
  

function myFunctionA() {
  x++;
  if (x>100) {
    x=1;
  }
  document.getElementById("demo").innerHTML = x;
}function myFunctionB() {
  y++;
  if (y>100) {
    y=1;
  }
  document.getElementById("demo2").innerHTML = y;
}function myFunctionC() {
  k++;
  if (k>100) {
    k=1;
  }
  document.getElementById("demo3").innerHTML = k;
}
</script>
<script type="text/javascript">
  function startTime()
  {
  var today=new Date();
  var h=today.getHours();
  var m=today.getMinutes();
  var s=today.getSeconds();
  // add a zero in front of numbers<10
  m=checkTime(m);
  s=checkTime(s);
  document.getElementById('txt').innerHTML=h+":"+m+":"+s;
  t=setTimeout('startTime()',500);
  }
  function checkTime(i)
  {
  if (i<10)
  {
  i="0" + i;
  }
  return i;
  }
  </script>

</body>
</html>
