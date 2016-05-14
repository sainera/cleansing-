<!doctype html>
<html lang="en">
 <head>
  <title>Waste Manager</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
  body{
  	margin: 0;
  	padding: 0;
  	background-image: url("body.jpg");
  	background-repeat: no-repeat;
  	background-size: cover;

  }
  #header{
  	margin-top: -20px;
  	height: 170px;
  	background-image: url("background.jfif");
  	background-repeat: no-repeat;
  	background-size: cover;
  }
 
   #header h2{
    padding-top: 35px;
    text-align: center;
    font-family: sans-serif;
    font-weight: bold;
    font-size: 3.7em;
    color: #0A2A1B;
  }
  #main{
  	margin: auto;
  	height: 450px;
  	width: 50%;
  	background-image: url("body.jpg");
  	background-repeat: no-repeat;
  	background-size: cover;
  }
  .myButton{
  	background:linear-gradient(to bottom, #000000 50%, #000000 100%);
  	background-color:#000000;
  	border-radius:7px;
	border:1px solid #566963;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:21px;
	font-weight:bold;
	padding: 15px 25px;   
	
	text-decoration:none;
	text-shadow:0px -1px 0px #2b665e;
  }
  .myButton:active {
	
	position: center;
      top: 100px;
      width: 100px;
}
.myButton:hover {
	
	background:linear-gradient(to bottom, #6c7c7c 5%, #768d87 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6c7c7c', endColorstr='#768d87',GradientType=0);
	background-color:#E3F6CE;
}
.myButton2{
    background:linear-gradient(to bottom, #000000 50%, #000000 100%);
    background-color:#000000;
    border-radius:7px;
  border:1px solid #566963;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:2.2em;
  font-weight:bold;
  padding: 15px 25px;   
  
  text-decoration:none;
  text-shadow:0px -1px 0px #2b665e;
  }

input{
  border: none;
  padding: 8px;
  font-family: arial;
  color:#122A0A;
  font-weight: bold;
  font-size: 1.4em;
  margin-right: 10px;

}
  </style>
</head>
<body>
  <div id="header">
   
    <h2> REFORMATION MANAGER</h2>
  </div>
  <div id="main">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
  <form method="post" action="#"><br><br><br>
    <select name="type" class="myButton2">
      <option value="bad road"> Bad Road</option>
      <option value="waste bin"> Waste Bin</option>
    </select><br><br><br>
    <input type="text" name="street" placeholder="enter street"/>
        <input type="text" name="area" placeholder="enter area" /><br><br><br>
    <input type="text" name="city" placeholder="enter city" /><br><br><br><br>
    <input type="submit" class="myButton"name="submit" value="SUBMIT COMPLAIN" />

  </form>
</div>
</div>
</div>
  <div id="A"> </div>
  <?php
  
    if (isset($_POST['submit'])) {
      $type=$_POST['type'];
      $street=$_POST['street'];
      $area=$_POST['area'];
      $city=$_POST['city'];
      $address=$street.", ".$area.", ".$city.", Telengana,IND";
      echo $address;

      /*$insert_data="INSERT INTO `map`(`address`,`type`) VALUES ('$address','$type')";
      $insert_data_query=mysql_query($insert_data);
      if (!$insert_data_query) {
        echo "no can't be inserted because:  ".mysql_error();
        # code...
      }else{
        echo "data inserted";
      }*/


      # code...
    }


  ?>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script type="text/javascript" >


var geocoder = new google.maps.Geocoder();
var address = "new york";
  var addres='<?php echo $address; ?>';
  var type='<?php echo $type; ?>';
  var latitude;
  var longitude;

geocoder.geocode( { 'address': addres}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
   // document.getElementById("A").innerHTML=longitude;
   $("#a").html(latitude);

    $.post("test.php", {var_lat: latitude,var_lng:longitude,var_address:addres,var_type:type}, function(latitude){
    alert("data sent and received: "+latitude);
});
    
  
  } 
}); 


</script>

  

</body>
</html>
