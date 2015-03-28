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
			<title>Product detail</title>
	</head>
	<body class="container">
<?php
	include('template.php');
	if(isset($_GET['id'])){
		$query = <<<END
		SELECT * FROM products 
		WHERE id = '{$_GET['id']}'
END;
		$result = mysql_query($query);
		if (!$result) 
		{
			die(mysql_error());
		}
		while($row = mysql_fetch_assoc($result))
		{
			$output[] = $row;
		}
		mysql_close();
		$formResult = <<<END
		<div class="row upPadding" style="padding-top: 20px;">
		<div class="col-lg-10">
END;
		if(!empty($output))
		{
			$formResult .= <<<END
			<table class="table table-striped">
				<thead>
				  <tr>
					<th>Produktnummer</th>
					<th>Namn</th>
					<th>Pris</th>
					<th>beskrivning</th>
					<th>Datum</th>
				  </tr>
				</thead>
				<tbody>	
END;
			$sum = 0;
			for($i = 0; $i < count($output); $i++){
				$array = array_values($output[$i]);
				$id = $array[0];
				$name = $array[1];
				$price = $array[2];
				$beskrivning = $array[3];
				$datum = $array[4];
				$formResult .= <<<END
				<tr>	
					<td class="text-left"> $id</td>
					<td> $name</td>
					<td> $price</td>
					<td>$beskrivning</td>
					<td>$datum</td>
				</tr>
END;
			}	
			$formResult .= <<<END
				</tbody>
			</table>
			<hr>	
			<a href="product.php"><button class="btn btn-lg btn-info">Tillbaka</button></a>	
END;
			echo $formResult;
		}
	}
	
?>		
				</div>
				<div class="col-lg-2">
				</div>
			</div><!-- end of row -->	
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