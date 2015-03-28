<meta charset="utf-8">
<link href="signin.css" rel="stylesheet">
</style>
<?php
include("navigator.php");
if(isset($_POST['username'])){
	$user = "'" . $_POST['username'] . "'";
	$password = "'" . $_POST['password'] . "'";
 	$query = <<<END
	select username , password, id from users
		Where username = $user
		AND password = $password
END;
$res = $mysqli -> query($query);
	if($res -> num_rows > 0){
		$row = $res -> fetch_object();
		$_SESSION['username'] = $row -> username;
		$_SESSION['userId'] = $row -> id;
		header('Location:index.php');
	}
	else{
		echo 'Fel användarnamn eller lösenord.';
	}
}

$content = <<<END
	<div class="container" >
		<form action = "login.php" method = "post" class="form-signin"> 
		  <div class="form-group">
			<label for="exampleInputEmail1">User name</label>
			<input type="text" class="form-control" name = "username" id="exampleInputEmail1" placeholder="Enter username">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-default">Logga in</button>
		</form>
	</div>	
END;
	echo $content;
?>