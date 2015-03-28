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
		<style>
			#paddinDown{
				padding-bottom: 25px;				
			}
		</style>
		<title>Main</title>
	</head>
	<body class="container">
<?php
	include('template.php');
	if(($_SESSION['timeout'] + (60)) <= time()){
		$_SESSION['timeout'] = time();
		header( "Location:logout.php", true); 
	}
	else
	{
	$content = <<<END
			<div id = "paddinDown" class="btn-group btn-group-justified">
				<div class="btn-group" role="group">
				<button id="homeGet" type=button" class="btn btn-lg btn-primary">Products</button>
				</div>
				<div class="btn-group" role="group">
					<button id="homeInsert" type="button" class="btn btn-lg btn-primary">Add new product</button>
				</div>
			</div>
END;
	echo $content;			
	}
	
?>	
		<script src="js/jquery.js"></script>
		<script src="bootstrap.min.js"></script>
		<script language='JavaScript' src='script4.js' type='text/javascript'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>	
				<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('#tabs').tab();
			});
		</script>
		<script>setTimeout("location.reload(true);",10000);</script>	
		<script language='JavaScript' src='script4.js' type='text/javascript'></script>
	</body>
</html>	