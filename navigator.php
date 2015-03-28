<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<?php
	session_name("Webbshop");
	session_start();
	$mysqli = new mysqli("localhost:3307", "root", "", "test");
	$content = <<<END
	<div class="container">
		<nav class = "nav nav-bar">
			<a href="index.php">Home</a>
			<a href="about.php">About</a>
END;
	if(isset($_SESSION['userId'])){
		$content .= <<<END
			Inlogged som {$_SESSION['username']}
			<a href="logout.php">Logout</a>
END;
	}
else{
	$content .= '<a href ="login.php"> Log in</a>';
}	
$content .= <<<END
	</nav>
	</div>	
END;
	echo $content;
?>