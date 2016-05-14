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
.head{
	color: white;
	font-size: 2.2em;
	font-family: arial;
	font-weight: bold;
}
.table{
	color: #E6E6E6;
	font-size: 1.2em;
	font-family: arial;
	font-weight: bold;
	padding: 10px;

}
  </style>
</head>
<body>
  <div id="header">
   
    <h2> REFORMATION MANAGER</h2>
  </div>
<?php
session_start();
		$group=$_SESSION['corpGroup'];
require("php_database.php");



// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}



$query="SELECT `address` FROM map WHERE type='$group'";
		$result=mysql_query($query);
		
		echo '<div id="main"><form action="#" method="post"><table class="table-responsive table-bordered table-condensed  " ><th class="head">address</th><th class="head">done</th><BR>';
		$i = 0;
	while ($row = mysql_fetch_row($result)) 
	{
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$current_row = current($row);
			
				
			echo '<tr class="table"><td>'. $current_row . '</td> </td><td><input type="checkbox" name="address[]" value="'.$current_row.'"/></td>';

		
			next($row);
			$y = $y + 1;
			
		}
		echo '</tr> <BR>';

		
	}
	echo '</table><input type="submit" name="submit"  class="myButton" value="submit" /></form></div>';
	if (isset($_POST['submit'])) {
		$add=$_POST['address'];
		$c=count($add);
		echo $c;
		for ($i=0; $i <$c ; $i++) { 
			$address=$add[$i];
			$sql="DELETE FROM `map` WHERE address='$address'";
			$query=mysql_query($sql);
			if (!$query) {
				echo mysql_error();
				# code...
			}

			echo "WELL DONE";
			header("Location:copr-view.html");
			# code...
		}


		# code...
	}


?>
</body>
</html>