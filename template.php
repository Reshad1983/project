<meta charset="utf-8">
<?php
session_name("Webbshop");
session_start();

try 
{
    $dbh = new PDO('mysql:host=localhost:3307;dbname=reshaddatabase', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
$url     = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$content = <<<END
   <div>
		<!-- Static navbar -->
		<nav class="navbar navbar-default">
		<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
    if (strcmp("index.php", $url) === 0) {
        $content .= <<<END
           <li class="active"><a href="index.php">Home</a></li>
END;
    } else {
        $content .= <<<END
           <li><a href="index.php">Home</a></li>
END;
    }
	if (strcmp("product.php", $url) === 0) {
        $content .= <<<END
        <li class="active"><a href="product.php">Products</a></li> 
END;
    } else {
        $content .= <<<END
        <li><a href="product.php">Products</a></li>  
END;
    }
	if (strcmp("about.php", $url) === 0)
	{
		$content .= <<<END
		<li class="active"><a href="about.php">Contact us</a></li>
END;
	}
	else
	{
		$content .= <<<END
		<li><a href="about.php">Contact us</a></li>  
END;
	}
if (isset($_SESSION['user_id'])) {
	if(($_SESSION['username'] === 'admin') AND $_SESSION['username'] === 'password')
	{
	    if (strcmp("add_products.php", $url) === 0) 
		{
			$content .= <<<END
			<li  class="active"><a href="add_products.php">Add new product</a></li>
END;
		}
		else 
		{
			$content .= <<<END
           <li><a href="add_products.php">Add new product</a></li>
END;
		}
		
	}
    $content .= <<<END
       <li><a href="logout.php">Logout</a></li>
        <p>Inloggad som <a href="user_detail.php?id={$_SESSION['user_id']}">{$_SESSION['username']}</a></p>
END;
} else {
    if (strcmp("login.php", $url) === 0) {
        $content .= <<<END
            <li class="active"><a href="login.php">Logga in</a></li>
END;
    } else {
        $content .= <<<END
           <li><a href="login.php">Logga in</a></li>
END;
    }
}
$content .= <<<END
                   </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
              </nav>
        </div>      
END;
echo $content;
?>  
