<meta charset="utf-8">
<link href="signin.css" rel="stylesheet">
</style>
<?php
include("template.php");
if(isset($_POST['username'])){
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
	else
	{
        echo "<h1 style='color:red'>Login failed, Please try again<h1>";
    }
$res = $mysqli -> query($query);
	if($res -> num_rows > 0){
		$row = $res -> fetch_object();
		$_SESSION['username'] = $row -> username;
		$_SESSION['userId'] = $row -> id;
		header('Location:index.php');
	}
	else{
		echo 'Fel anv�ndarnamn eller l�senord.';
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