<html>
<head><title>Create Login Table</title></head>
<body>
	<form method="post" action="#">
		<input type="text" name="group" placeholder="enter group name"/><br>
		<input type="text" name="password" placholder="password"/><br>
		<input type="submit" name="submit"/><br>
	</form>
	<?php
	require("php_database.php");
	
		$connection=mysql_connect ($host, $username, $password);
		if (!$connection) {
 		 	echo 'Not connected : ' . mysql_error();
		}

		// Set the active MySQL database
		$db_selected = mysql_select_db($database, $connection);
		if (!$db_selected) {
  			echo'Can\'t use db : ' . mysql_error();
		}
		$sql="CREATE TABLE `login_table` (sno INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,corp_group VARCHAR(40) NOT NULL, password VARCHAR(8) NOT NULL)";
		$query=mysql_query($sql);
		if (!$query) {
			echo'table not created <br>: '.mysql_error();
			# code...
		}else
		{
			echo "table created <br>";
		}

		//entering data in the table
		if (isset($_POST['submit'])) {
			$group=$_POST['group'];
			$password=$_POST['password'];
			$insert_data="INSERT INTO `login_table`(`corp_group`,`password`) VALUES ('$group','$password')";
			$insert_data_query=mysql_query($insert_data);
			if (!$insert_data_query) {
				echo "no can't be inserted because:  ".mysql_error();
				# code...
			}else{
				echo "data inserted";
			}

			# code...
		}

?>

</body></html>