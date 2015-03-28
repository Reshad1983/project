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
			<title>Edit product</title>
	</head>
	<body class="container">
<?php
	include('template.php');
	$content = "";
	if(isset($_GET['id'])){
		if(isset($_POST['name']))
		{
			$query =
			<<<END
			UPDATE products 
			SET	name = '{$_POST['name']}',
			price = {$_POST['price']},
			description = '{$_POST['description']}'
			WHERE id = {$_GET['id']}
END;
			try
			{
				$result = mysql_query($query);
				$content = <<<END
				<hr>
				<div id="temp" class="alert alert-success" role="alert">Ändringar har sparats.</div>
				<hr>
END;
				echo $content;
			}
			catch(PDOException $err){
				die(mysql_error());
			}
		}
	
		$query = <<<END
		SELECT * FROM products
		WHERE id = '{$_GET['id']}'
END;
		try{
			$result = mysql_query($query);
		}
		catch(PDOException $err){
			die(mysql_error());
		}
		if(!$result){
			die(mysql_error());
		}
		else
		{
			$row = mysql_fetch_assoc($result);
			$output[] = $row; 
			$array = array_values($output[0]);
			if(!empty($row))
			{
				$content = <<<END
				<form role="form"  action="edit_product.php?id={$array[0]}" method="post">
					<div class="form-group">						<label for="name">Namn</label>
						<input type="text" class="form-control" name="name" value="{$array[1]}">
					</div>
					<div class="form-group">						<label for="price">Pris</label>
						<input type="text" class="form-control" name="price" value="{$array[2]}">
					</div>
					<div class="form-group">						<label for="description">Beskrivning</label>
						<textarea class="form-control" name="description">{$array[3]}</textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control" value="Spara">
					</div>					
				</form>
END;
				echo $content;
			}	
		}
	}
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