<?php
	$conn=mysqli_connect("localhost","root","","farmshop") or die(mysqli_error($con));
	if (empty($_POST)===false) {
		$required_fields=array('firstname','lastname','username','status','county','email','password','location');
	}

	//function to check if user exists
	function user_exists(){
		$conn=mysqli_connect("localhost","root","","farmshop") or die(mysqli_error($con));
		$username=trim($_POST['username']);
		$email=trim($_POST['email']);
		$query=mysqli_query($conn,"SELECT * FROM users WHERE username='".$username."'");
		$res=mysqli_num_rows($query);
		if ($res===0) {
			return true;
		}else{
			return false;
		}
		$que=mysqli_query($conn,"SELECT * FROM users WHERE email='".$email."'");
		$re=mysqli_num_rows($que);
		if ($re===0) {
			return true;
		}else{
			return false;
		}
	}

	//check if the new user exists
	if (user_exists($_POST['username'])===false) {
		echo "Sorry the username '".$_POST['username']."' is already In use";
	}
	if (user_exists($_POST['email'])===false) {
		echo "Sorry the username '".$_POST['email']."' is already In use";
	}else{
		$firstname=htmlentities($_POST['firstname']);
		$lastname=htmlentities($_POST['lastname']);
		$username=htmlentities($_POST['username']);
		$status=htmlentities($_POST['status']);
		$county=htmlentities($_POST['county']);
		$location=htmlentities($_POST['location']);
		$firstname=htmlentities($_POST['firstname']);
		$email=htmlentities($_POST['email']);
		$password=htmlentities($_POST['password']);


		$conn=mysqli_connect("localhost","root","","farmshop") or die(mysqli_error($conn));
		$quer=mysqli_query($conn,"INSERT INTO users(`user_id`,`username`,`county`,`password`,`email`,`status`,`location`,`firstname`,`lastname`) VALUES(NULL,'$username','$county','$password','$email','$status','$location','$firstname','$lastname')") or die(mysqli_error($conn));
		echo "success";
	}
?>