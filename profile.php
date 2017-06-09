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
    <!-- Good default declaration:
    * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of eval() and inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
        * Enable inline JS: add 'unsafe-inline' to default-src
        * Enable eval(): add 'unsafe-eval' to default-src
    * Create your own at http://cspisawesome.com
    -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: 'unsafe-inline' https://ssl.gstatic.com; style-src 'self' 'unsafe-inline'; media-src *" /> -->
    <script type="text/javascript" src="../boots/jquery/newjquery.js"></script>
    <script type="text/javascript" src="../boots/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
    <!--<script type="text/javascript" src="../boots/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="../boots/js/bootstrap.js"></script>
    <script type="text/javascript">
      $(document).ready
    </script>
    <style type="text/css">
      #photo{
        width: 100px;
        height: 100px;
        border-radius: 50px;
        border:2px solid black;
      }
      .choose:hover{
        background-color: #333;
      }
    </style>
    <title>Hello World</title>
</head>

<body>
    <div id="head">
        <div class="navbar navbar-inverse">
            <h1><img src="../img/login2.png" class="blink">Market App</h1>

        </div>
    </div>
    <br><br><br><br>
    <hr>
    <a href="index.php"><img src="../img/home-black.png"></a> <span>"       "   </span> <span></span><span></span>  <img src="../img/back-black.png">
    <hr>
    <div class="container">
       <?php
       include 'login.php';
       //get the session name
       if (isset($_SESSION['user'])) {
       	$username=$_SESSION['user'];
       	$query="SELECT * FROM users WHERE username='".$username."'";
       	$execute=mysqli_query($con,$query);
       	$numrows=mysqli_num_rows($execute);


       	foreach ($execute as $item) {

          //$profile=$item['profile'];
          if ($item['profile']==="") {
            $profile= "<img src='../img/profile/adm.png' id='photo'";
          }else{
            $profile= '<img src="../img/profile/'.$item['profile'].'" alt="'.$item['username'].'" id="photo"';
          }

       		$username=$item['username'];
       		$county=$item['county'];
       		$email=$item['email'];
       		$status=$item['status'];
       		$location=$item['location'];
       		$firstname=$item['firstname'];
       		$lastname=$item['lastname'];


       		

       		
          }
        }
       		?>
       		<div class="container">
       		<table class="table">
       		<?php
       		echo "
            $profile
       			<tr><td>Firstname: <td><td>$firstname</td><tr>
       			<tr><td>Lastname: <td><td>$lastname</td><tr>
       			<tr><td>Username: <td><td>$username</td><tr>
       			<tr><td>Email: <td><td>$email</td><tr>
       			<tr><td>County: <td><td>$county</td><tr>
       			<tr><td>Status: <td><td>$status</td><tr>
       		</table>";

       		?>
       		</div>
       		<div class="container">

           <button class="btn btn-info"  name="edit" data-toggle="modal" data-target="#editmodal">Edit Profile</button>

           <div id="editmodal" class="modal fade In" role="dialog">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Your Profile</h4>
                 </div>
                 
                 <div class="modal-body">
                  <form>
                    <div id="err">
                      
                    </div>
                      <label>Firstname</label>
                      <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname;?>">
                      <label>Lastname</label>
                      <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname;?>">
                      <label>Username</label>
                      <input type="text" name="username" id="username" class="form-control" value="<?php echo $username;?>">
                      <label>Email</label>
                      <input type="text" name="email" id="email" class="form-control" value="<?php echo $email;?>">
                      <label>County</label>
                      <input type="text" name="county" id="county" class="form-control" value="<?php echo $county;?>">
                      <label>Status</label>
                      <input type="text" name="status" id="status" class="form-control" value="<?php echo $status;?>">
                      <label></label>
                      <input type="button" name="edits" class="btn btn-success form-control" value="Update">
                  </form>
                 </div>
               </div>
             </div>
       		</div>
          <?php
          if (isset($_POST['edits'])) {
            $firstname=trim(htmlspecialchars($_POST['post']));
            echo "$firstname";
            $que=mysqli_query($con,"UPDATE users SET firstname='".$firstname."' WHERE username='".$username."'") or die(mysqli_error($con));
          }

          ?>
       		
       <hr>
       <div class="container">
       
       	<h3>Add a Profile Picture</h3>
       	<div class="panel">
       		<form action="" method="post" class="form-group" enctype="multipart/form-data">
            <label class="form-group">profile</label>
            <input type="file" name="file" class="form-control" required="">
            <label></label>
            <input type="submit" name="submit" value="Upload" class="form-control btn btn-success">
        </form>
       		<?php

       if (isset($_POST['submit'])) {
          move_uploaded_file($_FILES['file']['tmp_name'], "../img/profile/". $_FILES['file']['name']);
          $query=mysqli_query($con,"UPDATE users SET profile='". $_FILES['file']['name']."' WHERE username='".$username."'");
       }

       ?>
       	</div>
       </div>
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="../boots/jquery/newjquery.js"></script>
    <script type="text/javascript" src="../boots/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript">
        app.initialize();

        //ensure all fields are filled up
        var firstname=$("#firstname").val();
        if (firstname==="") {
          $("#err").slideDown().show("All fields are required");
        }
    </script>
</body>
</html>