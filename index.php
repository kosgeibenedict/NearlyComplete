
<?php require_once 'connect.php'; require_once 'functions.php';?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
	<title>Comment System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="../js/js/newjquery.js"></script>-->
	<script type="text/javascript" src="../js/js/global.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
    <style type="text/css">
    	.sidebar{
    		z-index: 1px;
    		position: absolute;
    		width:0px;
    		height: auto;
    		overflow-y: hidden;
    		background-color: #2C3E50;
    		opacity: 0.9;
    	}
    	.main{
    		position: absolute;
    		width: 100%;
    		padding-left: 40px;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 2px solid black;
    	}
    	.main.menuDisplayed .sidebar{
    		width: 240px;
    	}
    	.main.menuDisplayed .new{
            position: relative;
                	}
    	.sidebar{
    		padding: 0;
    		list-style: none;
    		position: fixed;
    		height: 40%;
            z-index: 4;

    	}
    	.sidebar li{
    		text-indent: 12px;
    		line-height: 70px;
    	}
    	.sidebar li img{
    		padding-left: 5px;;
    	}
    	.sidebar li a{
    		display: block;;
    		text-decoration: none;
    		color: #ddd;
    		border-bottom: 2px dashed white;
    	}
    	.sidebar li a:hover{
    		background:#16A085;
    	}
    	.header{
    		position: fixed;
    		width: 100%;
    		opacity: 2;
            z-index: 6;
            height: 150px;
    	}
    	#comment{
    		font-size: 60px;
            width: 100%;
    	}
    	.tog{
    		position: fixed;
    		padding-bottom: 10px;
    	}
    	#right{
    		float: right;
    	}
        .add{
            background-color: #2C3E50;
            float: right;
            opacity: 0.6;
            display: none;
        }
        .add li a{
            display: block;
            text-decoration: none;
            color: #ddd;
        }
        .new{
            position: absolute;
            height: 100%;
        }
        .Display.add{
            display: block;
            line-height: 60px;
            position: relative;
            float: right;
            opacity: 0.8;
            z-index: 4;
        }
        #prof{
            width: 100px;
            height: 100px;
            border-radius: 50px;
            border:2px solid black;
        }
        .choose{
            overflow-wrap:break-word;
            height: auto;
            width: 100%;
            border-radius: 13px;
            background-color: white;
            border:0px;
        }
        #im{
            width: 180px;
            height: 150px;
        }


    </style>
</head>
<body>
<div class="nav navbar-inverse header">
	<h1><img src="../img/login2.png" class="blink" id="im">Market App</h1>
</div>
<br><br><br><br><br><br><br>
<div class="page-container main">

<?php
	get_total();
	require_once 'check_com.php';
?>
<div class="tog">
<a href="#" id="menu-toggle"> <img src="../img/bullets-black.png" width="30px" height="30px"></a>
</div>
<div id="right">
<a href="#" id="info"> <img src="../img/info-black.png" width="30px" height="30px"></a></div>
<br><br><br>
<div class="sidebar">
	<ul class="sidebar-nav">
		<li><a href="#"><?php
			if (isset($_SESSION['user'])) {
		       	$username=$_SESSION['user'];
		       	echo "$username";
		       }
		?></a></li>
		<li><img src="../img/profile/adm.png"></li>
        <li><a href="#"><span class="label label-pill label-danger count">3 </span>Notifications</a></li>
		<li><a href="request.php">Admin></li>
		<li><a href="changepass.php">Change Password</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<div class="add">
    <ul>
        <li><a href="#">About Developer</a></li>
        <li><a href="#">Contact Developer</a></li>
        <li><a href="#">Share this App</a></li>
        <li><a href="#">Check Out my other apps</a></li>
        <li><a href="#">Rate this app</a></li>
        <li><a href="#">Exit</a></li>
    </ul>
</div>
<div class="container new">
	<form action="" method="post" class="form-group">
		<label>Enter Product Description'..</label>
		<textarea class="form-text form-control home" name="comment" id="comment" rows="2"></textarea>
		<br />
		<input type="submit" class="form-submit center btn btn-success col-sm-12" name="new_comment" value="post">
	</form>
	<br><br>
	<?php get_comments();?>
</div>
<div id="contact" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Your Profile</h4>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
	$('#menu-toggle').click(function(e){
		e.preventDefault();
		$('.main').toggleClass('menuDisplayed');
	});
    $('#info').click(function(ex){
        ex.preventDefault();
        $('.add').toggleClass('Display');
    });
</script>
</body>
</html>
