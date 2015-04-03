<?php
include('template.php');
$failed = 0;
if(isset($_POST['username']))
{
	$user = "'" . $_POST['username'] . "'";
	$password = "'" . $_POST['password'] . "'";	
	
 	$sql  = "SELECT  user.user_id, user.username, user.password
				FROM user
                WHERE user.username = $user 
                AND user.password = $password";
	$sth = $dbh -> prepare($sql);
	$sth -> execute();
	$row = $sth -> fetch(PDO::FETCH_ASSOC);
    if (($_POST['username'] === $row['username']) and ($_POST['password'] === $row['password']))
	{	$content = <<<END
	<h3 class="alert alert-danger">Inlogged</h3>
END;
	    $_SESSION['user_id']  = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['timeout']  = time();
		header('Location:index.php');
    } 
	else
	{
		$failed = 1;
	}
}
else
{
	$failed = 0;	
}	
	$content .= <<<END
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="well">
END;
	if(isset($_GET['id']))
	{
		if($failed === 1)
		{
			$content .= <<<END
			<h2 class="alert alert-danger" id="loginFailed">Login failed, wrong username or password</h2>
END;
		}
		$content .= <<<END
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			<li><a href="#loginTab" data-toggle="tab">Login</a></li>
			<li class="active"><a href="#registerTab" data-toggle="tab">Register</a></li>
		</ul>	
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane" id="loginTab">
					<form class="form-signin" role="form" action="login.php" method="POST">
							<h2 class="form-signin-heading">Please sign in</h2>
							<div class="form-group">
								<label for="inputEmail">Email address</label>
								<input type="text" id="inputEmail" class="form-control" placeholder="User Name" name="username"required autofocus>
							</div>
							<div class="form-group">
								<label for="inputPassword">Password</label>
								<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
							</div>	
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
END;

		$content .= <<<END
			</div>
				<div class="tab-pane active" id="registerTab">
					<form class="form-signin" role="form" action="register.php" method="POST">
						<h2>Register </h2>
						<div class="form-group">
							<input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" value="" required autofocus>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="sr-only">Password</label>
						<div>
						<div class="form-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="" required>
						</div>
						<div class="form-group">
							<input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" value="">
						</div>			
						<div class="form-group">
							<input type="text" id="inputFname" class="form-control" placeholder="First name" name="fname" value="">
						</div>
						<div class="form-group">
						<div class="form-group">
						<div class="form-group">
							<input type="text" id="inputLname" class="form-control" placeholder="Last name" value="" name="lname">
						</div>	
						<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
					</form>
				</div>
			</div>
END;
	}
	else
	{
		$content .= <<<END
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			<li class="active"><a href="#loginTab" data-toggle="tab">Login</a></li>
			<li><a href="#registerTab" data-toggle="tab">Register</a></li>
		</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="loginTab">
					<form class="form-signin" role="form" action="index.php" method="POST">
							<h2 class="form-signin-heading">Please sign in</h2>
							<div class="form-group">
								<label for="inputEmail">Email address</label>
								<input type="text" id="inputEmail" class="form-control" placeholder="User Name" name="username"required autofocus>
							</div>
							<div class="form-group">
								<label for="inputPassword">Password</label>
								<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
							</div>	
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
END;
		if($failed === 1)
		{
			$content .= <<<END
			<h2 class="alert alert-danger" id="loginFailed">Login failed, wrong username or password</h2>
END;
		}	
		$content .= <<<END
			</div>
				<div class="tab-pane" id="registerTab">
					<form class="form-signin" role="form" action="register.php" method="POST">
						<h2>Register </h2>
						<div class="form-group">
							<input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" value="" required autofocus>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="sr-only">Password</label>
						<div>
						<div class="form-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="" required>
						</div>
						<div class="form-group">
							<input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" value="">
						</div>			
						<div class="form-group">
							<input type="text" id="inputFname" class="form-control" placeholder="First name" name="fname" value="">
						</div>
						<div class="form-group">
						<div class="form-group">
						<div class="form-group">
							<input type="text" id="inputLname" class="form-control" placeholder="Last name" value="" name="lname">
						</div>	
						<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
					</form>
				</div>
			</div>
END;
	}	
	$content .= <<<END
		</div> 
	</div>		
</div>
END;
?>
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

	echo $navbar;
	echo $content;
?>
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