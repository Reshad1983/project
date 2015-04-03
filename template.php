<?php
try 
{
    $dbh = new PDO('mysql:host=localhost;dbname=reshbrkz_project', 'reshbrkz', 'dUB-Y-MKey4G3');
	$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
if(!isset($_SESSION))
{
	session_name("Webbshop");
	session_start();
}
$url     = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$navbar = <<<END
   <div>
		<!-- Static navbar -->
		<nav class="navbar navbar-default">
		<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-embossed collapsed navbar-fixed-top" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">House Economy</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
END;
    if (strcmp("index.php", $url) === 0) 
	{
        $navbar .= <<<END
           <li class="active"><a href="index.php">Home</a></li>
END;
    }
	else
	{
        $navbar .= <<<END
           <li><a href="index.php">Home</a></li>
END;
    }
	if (strcmp("product.php", $url) === 0) 
	{
        $navbar .= <<<END
        <li class="active"><a href="product.php">Products</a></li> 
END;
    } 
	else
	{
        $navbar .= <<<END
        <li><a href="product.php">Products</a></li>  
END;
    }
	if (strcmp("contact.php", $url) === 0)
	{
		$navbar .= <<<END
		<li class="active"><a href="contact.php">Contact us</a></li>
END;
	}
	else
	{
		$navbar .= <<<END
		<li><a href="contact.php">Contact us</a></li>  
END;
	}
if (isset($_SESSION['user_id'])) 
{
	if(($_SESSION['username'] === 'admin') AND $_SESSION['username'] === 'password')
	{
	    if (strcmp("add_products.php", $url) === 0) 
		{
			$navbar .= <<<END
			<li  class="active"><a href="add_products.php">Add new product</a></li>
END;
		}
		else 
		{
			$navbar .= <<<END
           <li><a href="add_products.php">Add new product</a></li>
END;
		}
		
	}
    $navbar .= <<<END
       <li><a href="user_detail.php?id={$_SESSION['user_id']}"><em>{$_SESSION['username']}</em></a></li>
       <li><a href="logout.php">Logout</a></li>
	</ul>
		</div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
END;
} 
else 
{
    if (strcmp("login.php", $url) != 0)
	{
        $navbar .= <<<END
			<li><a href="login.php?id=1">Register</a></li>
		</ul>
		</div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
		<form class="navbar-form navbar-left" role="form" action="login.php" method="post">
		  <div class="form-group">
			<label for="email">Email address:</label>
			<input type="text" class="form-control" id="email" name="username">
		  </div>
		  <div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" name="password">
		  </div>
		  <div class="checkbox">
			<label><input type="checkbox"> Remember me</label>
		  </div>
		  <button type="submit" class="btn btn-default">Sign in</button>
		</form>

END;
    } 
}
        $navbar .= <<<END
			</nav>
        </div>  
END;
?>