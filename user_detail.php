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
		<div class="row">
	<?php	
	include('template.php');
	$updated = 0;
	if(isset($_POST["editusername"]) or 
	isset($_POST["passwordedit"]) or
	isset($_POST["firstnameedit"]) or
	isset($_POST["lastnameedit"]) or
	isset($_POST["emailedit"]))
	{
		$sql = <<<END
		UPDATE User 
			SET username = '{$_POST['editusername']}',
			fname = '{$_POST['firstnameedit']}' ,
			lname = '{$_POST['lastnameedit']}' ,
			address = '{$_POST['addressedit']}'
			WHERE user_id = {$_SESSION['user_id']};
END;
/*

	if(isset($_POST["passwordedit"]))
		{
			if($_POST["passwordedit"] === $_POST["passwordedit2"])
			{
				$sql .= <<<END
				SET paessword = {$_POST['passwordedit']}
END;
			}
		}
		if(isset($_SESSION["emailedit"]))
		{
			$sql .= <<<END
			SET lname = {$_POST['emailedit']}
END;
		}
		*/
		$sth = $dbh->prepare($sql);
		$sth->execute();
		
		$sql  = "SELECT  contact_id 
		FROM User
		WHERE User_id = {$_SESSION['user_id']}" ;
		$sth = $dbh -> prepare($sql);
		$sth -> execute();
		$row = $sth -> fetch(PDO::FETCH_ASSOC);
		$array = array_values($row);
		$sql = <<<END
		UPDATE contact
			SET email = '{$_POST['emailedit']}'
			WHERE contact_id = {$array[0]};
END;
		try
		{
			$sth = $dbh->prepare($sql);
			$sth->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		$updated = 1;
	}
	if(isset($_SESSION["user_id"])){
		if($updated === 1){
			echo "<h1 class='alert alert-success' id='temp'>User information has been updated</h1>";
		}
 	$sql  = "SELECT  * 
			FROM User
            WHERE User_id = {$_SESSION['user_id']}" ;
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	$array = array_values($row);
	
	$content = <<<END
	<div class="col-md-2 well">
		<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
			<button type="button" class="btn btn-lg btn-info">Account setting</button>
			<button type="button" class="btn btn-lg btn-info">Adresses</button>
			<button type="button" class="btn btn-lg btn-info">Contact</button>
		</div><!--End of btn-group-vertical-->
	</div>
END;
	echo $content;
	$content = <<<END
	<div class="col-md-6 well" id="userinfo">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">Account information</h3>
		  </div>
			<!-- List group -->
		  <ul class="list-group">
			<li id="user" class="list-group-item">User name: {$array[1]}</li>
			<li id="passsword" class="list-group-item">Password:{$array[2]}</li>
			<li id="firstname" class="list-group-item">First name: {$array[3]}</li>
			<li id="lastname" class="list-group-item">Family name: {$array[4]}</li>
			<li id="address" class="list-group-item">Address: {$array[5]}</li>
		  </ul>
		  <button class="btn btn-primary" id="updateInfo">Update</button>	
		</div>
		<hr>
	</div><!--End of col6-->
END;
	echo $content;	
	}

?>
	</div><!--end of row class-->
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
	<script language='JavaScript' src='js/user_update.js' type='text/javascript'></script>
	</body>
</html>		