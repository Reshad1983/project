<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- Lat est compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<!-- Custom styles for this template -->
			<link href="signin.css" rel="stylesheet">
			<link rel="icon" href="http://getbootstrap.com/favicon.ico">	
			<title>Login</title>
	</head>
	<body class="container">
<?php
include('template.php');
if(isset($_POST['username']))
{
	$user = "'" . $_POST['username'] . "'";
	$password = "'" . $_POST['password'] . "'";
 	$sql  = "SELECT  user.user_id, user.username, user.password
				FROM user
                WHERE user.username = $user 
                AND user.password = $password";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$row = $sth->fetch(PDO::FETCH_ASSOC);
    if (($_POST['username'] === $row['username']) and ($_POST['password'] === $row['password']))
	{
        $_SESSION['user_id']  = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['timeout']  = time();
		header('Location:index.php');
    } 
		$content .= <<<END
			<div class="col-md-4 col-md-offset-2">
				<div class="row well">	
					<form role="form" class="form-signin" action="login.php" method="POST">	
						<h2>Sign in</h2>
						<div class="form-group">
							 <label for="inputUsername">Username</label>
							 <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" required autofocus>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
						</div>
						<div class="form-group">
							 <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>	
						</div>
					</form>	
				</div><!--class of well-->
			</div>
			<div class="col-md-4">
			<div class="row well">	
					<form role="form" class="form-signin" action="register.php" method="POST">
						<h2>Register</h2>
						<div class="form-group">
							<label for="inputUsername">Username</label>
							<input type="text" id="inputUsername" class="form-control" placeholder="User Name" value="" name="username" required autofocus>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="password" value="" name="password" required>
						</div>
						<div class="form-group">
							 <input type="text" class="form-control" name="fname" placeholder="First name" value="" >
						</div>
						<div class="form-group">
							 <input type="text" class="form-control" placeholder="Family Name" value="" name="lname">
						</div>
						<div class="form-group">
							 <input type="text"  class="form-control" name="email" placeholder="Email" value="">
						</div>
						<div class="form-group">
							 <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>	
						</div>
					</form>
				</div><!--class of well-->
			</div>		
END;
	echo $content;
}	
?>	
	</body>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="js/prettify.js"></script>
		<script src="bootstrap.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/getdate.js"></script>		
		<script language='JavaScript' src='script4.js' type='text/javascript'></script>
	</body>
</html>	