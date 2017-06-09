
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
	<title>password change</title>
	<script type="text/javascript" src="../js/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
    <style type="text/css">
    	.changepass_banner{
    		width: 100%;
    	}
    	.err{
    		color: red;
    	}
    </style>
</head>
<body>
		
			<div class="nav navbar-inverse header">
				<h1><img src="../img/login2.png" class="blink" height="80px;">Market App</h1>
			</div>
			<br><br><br>
			<div class="container log">
			<img src="../img/changepass.png" class="changepass_banner">
			<br><br><br>
			<div class="err">
				
			</div>
			<form method="post" action="" class="form-group">
				<label>Current Password</label>
				<input type="text" name="currentpass" class="form-control" id="current">
				<label>New Password</label>
				<input type="password" name="password1" class="form-control" id="newpass">
				<label>Confirm new Password</label>
				<input type="password" name="password2" class="form-control" id="confirmnew">
				<label></label>
				<input type="submit" name="submit" class="btn btn-warning form-control changepass">
			</form>
			<div class="res">
				
			</div>
		</div>
			
    		<script type="text/javascript" src="../js/js/newjquery.js"></script>
			<script type="text/javascript" src="../js/js/global.js"></script>
			<script type="text/javascript">
				$(".changepass").click(function(event){
					event.preventDefault();
					var current=$("#current").val();
					var newpass=$("#newpass").val();
					var confirm=$("#confirmnew").val();

					if (current==="") {
						$(".err").slideDown().html("Please enter your current password");
						return false;
					}if (newpass==="") {
						$(".err").slideDown().html("Please enter your new password");
						return false;
					}if (confirm==="") {
						$(".err").slideDown().html("Confirm your new password");
						return false;
					}else{
						$(".err").slideDown().html("");
						if (newpass!==confirm) {
							$(".err").slideDown().html("New pass and confirm pass should match");
							return false;
						}else{
							$.ajax({
								type: 'post',
								url: 'pass.php',
								dataType:'text',
								data: $("form").serialize(),
								success: function(data){
									$(".res").slideDown().html(current);
									$(".res").slideDown().html(username);
								}
							});
						}
					}
				});
		</script>
</body>
</html>
