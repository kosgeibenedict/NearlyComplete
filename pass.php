<?php
	include 'init.php';
	require 'login.php';
	if (isset($_POST['submit'])) {
		$current=trim(mysqli_escape_string($con,$_POST['currentpass']));
		echo $current;
       	$username=$_SESSION['user'];
	}
		$collect=mysqli_query($con,"SELECT password from users WHERE username='".$username."'");
		foreach ($collect as $row) {
		  $news= $row['password'];
		}
	}
?>