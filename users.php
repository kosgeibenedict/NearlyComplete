<?php
	function user_exists($username){
		$username=sanitize($username);
		$query=mysqli_query($con,"SELECT COUNT(`user_id`) FROM users WHERE `username`='$username'");
		return(mysqli_result($query,0)===1)? true: false;

	}

	function sanitize($data){
		return mysqli_real_escape_string($con,$data);
	}
?>