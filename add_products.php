<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Lat est compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- Custom styles for this template -->
		<link href="signin.css" rel="stylesheet">
		<link rel="icon" href="http://getbootstrap.com/favicon.ico">	
		<title>Add product</title>
		<meta charset="utf-8">
	</head>
	<body class="container">
<?php
	include('template.php');
	if(isset($_POST['name']) && isset($_SESSION['user_id'])){
		$name = "'" . $_POST['name'] . "'";	
		$price = $_POST['price'];	
		$description = "'" . $_POST['description'] . "'";		$query = <<<END
		INSERT INTO products (name, price, description) 
		VALUES($name, $price, $description)END;
		try		{			mysql_query($query);			$content =<<<END				<hr>				<div id="temp">					<h3 class="text-center">Ny produkt har lagts till.</h3>				</div>				<hr>END;			echo $content;
		}		catch(PDOException $ex)
		{
			die(mysql_error());
		}
	}
	
	$content = <<<END
	<div class="row upPadding" style="padding-top: 20px;">
		<div class="col-lg-8">
			<form method="post" action="add_products.php" role="form">
				<div class="form-group">
					<input class="form-control" type="text" name="name" placeholder="Produktnamn">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="price" placeholder="Pris">
				</div>
				<div class="form-group">
					<textarea class="form-control" name="description" placeholder="Beskrivning"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="submit" Value="Lägg till produkt">
				</div>	
			</form>	
		</div>
		<div class="col-lg-4"></div>	
END;
	echo $content;
?>	
		<script src="js/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="js/prettify.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>			<script language='JavaScript' src='script4.js' type='text/javascript'></script>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$('#tabs').tab();
			});
		</script> 	
	</body>
</html>		