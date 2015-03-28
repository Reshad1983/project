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
	include("template.php");
	$username = "'" . $_POST['username'] . "'";
	$password = "'" . $_POST['password'] . "'";
	$email = "'" . $_POST['email'] . "'";
	$fname = "'" . $_POST['fname'] . "'";
	$lname = "'" . $_POST['lname'] . "'";
	$query = "INSERT INTO User (userName, password, email, fname, lname)
		VALUES($username, $password, $email, $fname, $lname)";
	try
	{
		$result = mysql_query($query);
	}
	catch (PDOException $ex) 
	{
		die(mysql_error());
	}
	if(!$result){
		
		$err = mysql_error();
		if(strcmp("Duplicate entry" . $username." for key 'userName'", $err)){
			echo "<h2 style='color:red'>This user is already taken, choose another.</h2>";
		}
		echo "<br /><br />";
		echo "<a href='index.php'><button class='btn btn-lg btn-warning'>Back</button></a>";
	}
	else{
		echo "<h2 style='color:green'>Username Successfully Added!</h2>";
		echo "<br /><br />";
		echo "<a href='index.php'><button class='btn btn-lg btn-warning'>Back to login</button></a>";
	}
?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('#tabs').tab();
			});
		</script> 
		<script src="bootstrap.min.js"></script>
		<script language='JavaScript' src='script4.js' type='text/javascript'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>	
	</body>
</html>		