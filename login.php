<?php
	include 'init.php';
	//my way of doing things*/
	if (isset($_POST['username'])) {
		$username=trim(mysqli_real_escape_string($con,$_POST['username']));
		$password=trim(mysqli_real_escape_string($con,$_POST['password']));

		$qry="SELECT user_id,username FROM users WHERE `username`='".$username."' AND `password`='".$password."'";
		$res=mysqli_query($con,$qry);
		$num_rows=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);
		
		if ($num_rows===1) {
			$_SESSION['user']=$row['username'];
			
			echo "success";
			
			
		}else{
			echo "Could not connect check your username and password combination";
			}
		}

	
?>