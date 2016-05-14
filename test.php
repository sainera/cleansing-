
<?php
session_start();
try{
require("php_database.php");

	
		$connection=mysql_connect ($host, $username, $password);
		if (!$connection) {
 		 	die('Not connected : ' . mysql_error());
		}

		// Set the active MySQL database
		$db_selected = mysql_select_db($database, $connection);
		if (!$db_selected) {
  			echo'Can\'t use db : ' . mysql_error();
		}

$latitude=$_POST['var_lat'];
$longitude=$_POST['var_lng'];
$address=$_POST['var_address'];
$type=$_POST['var_type'];
$create="CREATE TABLE  `map` (id INT( 100 ) UNSIGNED AUTO_INCREMENT ,address VARCHAR( 80 ) PRIMARY KEY NOT NULL ,lat FLOAT( 10, 6 ) ,lng FLOAT( 10, 6 ) ,type VARCHAR( 30 ))";
$sql=mysql_query($create);
			
$insert_data="INSERT INTO `map`(`address`,`lat`,`lng`,`type`) VALUES ('$address',$latitude,$longitude,'$type')";
			$insert_data_query=mysql_query($insert_data);
			if (!$insert_data_query) {
				echo "no can't be inserted because:  ".mysql_error();
				# code...
			}else{
				
				echo "complain for ".$type." OF the area  ".$address." has been registered.";
			}
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
