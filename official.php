<html>
<head><title>creating login table & inseting data</title></head>
<body><form action="#" method="post">
	<input type="text" name="group" placeholder="enter gtroup name"/>
	<input type="text" name="passw" placeholder="enter password" />
	<input type="submit" name="submit"/>
</form></body>
<?php
try{
require("php_database.php");

	
		$connection=mysql_connect ($host, $username, $password);
		if (!$connection) {
 		 	die('Not connected : ' . mysql_error());
		}
		$db_selected = mysql_select_db($database, $connection);
		if (!$db_selected) {
  			echo'Can\'t use db : ' . mysql_error();
		}

		$create="CREATE TABLE  `corp_login` (groups VARCHAR( 80 ) PRIMARY KEY NOT NULL ,password VARCHAR( 30 ))";
$sql=mysql_query($create);

if (isset($_POST['submit'])) {
	$group=$_POST['group'];
	$passw=$_POST['passw'];
	$insert_data="INSERT INTO `corp_login`(`groups`,`password`) VALUES ('$group','$passw')";
			$insert_data_query=mysql_query($insert_data);
			if (!$insert_data_query) {
				echo " can't be inserted because:  ".mysql_error();
				# code...
			}else{
				
				echo "data inserted.";
			}
	# code...
}
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>