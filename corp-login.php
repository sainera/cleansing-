<!DOCTYPE html>
<html>
<style>
body{
  	margin: 0;
  	padding: 0;
  	background-image: url("body.jpg");
  	background-repeat: no-repeat;
  	background-size: cover;

  }
  #header{
  	margin-top: -50px;
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
  #main h1,label{
  	padding: 15px;
  	color:#BCF5A9;
  	text-shadow:0px 3px 0px #0A2A22;
  	font-size: 2.2em;
  	font-weight: bold;

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
	padding: 10px 16px;   
	margin-left:100px;
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
input{
	border: none;
	padding: 8px;
	font-family: arial;
	color:#122A0A;
	font-weight: bold;
	font-size: 0.9em;
}


</style>
<body >
	<div id="header"><h2> WASTE MANAGER</h2></div>
	<div id="main">
	<a href="bck.html"><img src="back.png" width="30" height="30"></a>
		<h1>Enter credentials for official login</h1>
	<br><br>
		<form action="#" method="post">
			<label for="logid">Group Name</label>
			<input type="text" id="logid" name="group"><br><br>
			<label for="pwd">Password</label>
			<input type="password" id="pwd" name="password">
			<br><br>
			
			<input type="submit" class="myButton" value="Login" name="login"/>
		</form>
	</div>



<?php
session_start();
require("php_database.php");
	if (isset($_POST['login'])) {
		$group=$_POST['group'];
		$GroupPassword=$_POST['password'];
		$connection=mysql_connect ($host, $username, $password);
		if (!$connection) {
 		 	die('Not connected : ' . mysql_error());
		}

		// Set the active MySQL database
		$db_selected = mysql_select_db($database, $connection);
		if (!$db_selected) {
  			die ('Can\'t use db : ' . mysql_error());
		}

		//query to get the group name & password from the login-table
		$sq="SELECT `groups`,`password` FROM corp_login WHERE groups='$group' AND password='$GroupPassword'";
				$query=mysql_query($sq);
                $row=mysql_fetch_row($query);
				if (($group==$row[0] AND $GroupPassword==$row[1])) {

                    header("Location:copr-view.html");
                    $_SESSION['corpGroup']=$_POST['group'];
                  
					
					# code...
				}
				else{
                    echo "invalide user name and password";
					
				}
	}
?>
</body>
</html>