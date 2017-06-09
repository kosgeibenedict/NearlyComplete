
<!DOCTYPE html>
<!DOCTYPE html>
<!--
    Copyright (c) 2012-2016 Adobe Systems Incorporated. All rights reserved.

    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<script type="text/javascript" src="..boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="..boots/js/bootstrap.min.js"></script>
</head>
<body>
<?php
 	include 'init.php';

 	if (isset($_POST['admin_sub'])) {
 		//clean the data
 		$user=trim(htmlspecialchars($_POST["admin_user"]));
 		$pass=trim(htmlspecialchars($_POST["admin_pass"]));
 		
 		//convert password to md5
 		$newpass=md5($pass);

 		$query=mysqli_query($con,"SELECT * FROM admin WHERE username='".$user."' AND password='".$newpass."'") or die(mysqli_error($con));
 		
}
?>
</body>
</html>