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
	<title>Login</title>	</head>	<body class="container">
	<?php	
	include('template.php');
	if(isset($_SESSION["user_id"])){
 	$sql  = "SELECT  * 
			FROM User
            WHERE User_id = {$_SESSION['user_id']}" ;
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	$array = array_values($row);
	$content = <<<END
	<div>
		<h3>User information</h3>
		<p>User id: {$array[0]}</p><br />
		<p>User name: {$array[1]}</p><br />
		<p>First name:{$array[2]}</p><br />
		<p>Last name: {$array[3]}</p><br />
		<p>Email: {$array[4]}</p><br />
	</div>		
	<hr>
END;
	echo $content;	
	}

?>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="js/prettify.js"></script>		<script src="bootstrap.min.js"></script>
	<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/getdate.js"></script>
	<script language='JavaScript' src='script4.js' type='text/javascript'></script>
	</body>
</html>		