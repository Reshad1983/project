<meta charset="utf-8">
<?php
session_name("Webbshop");
session_start();
mysql_connect("mysql.freehostingnoads.net", "u319600295_resah", "146379re") or die(mysql_error());
mysql_select_db("u319600295_test");
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
$url     = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
if (isset($_SESSION['user_id'])) {
    if (strcmp("product.php", $url) === 0) {
        $content .= <<<END
           <li class="active"><a href="product.php">Produkter</a></li> 
END;
    } else {
        $content .= <<<END
           <li><a href="product.php">Produkter</a></li>  
END;
    }
    if (strcmp("about.php", $url) === 0) {
        $content .= <<<END
       <li class="active"><a href="about.php">About</a></li>
END;
    } else {
        $content .= <<<END
       <li><a href="about.php">About</a></li>  
END;
    }
    if (strcmp("add_products.php", $url) === 0) {
        $content .= <<<END
           <li  class="active"><a href="add_products.php">Add new product</a></li>
END;
    } else {
        $content .= <<<END
           <li><a href="add_products.php">Add new product</a></li>
END;
    }
    if (strcmp("main.php", $url) === 0) {
        $content .= <<<END
           <li class="active"><a href="main.php">Home</a></li>
END;
    } else {
        $content .= <<<END
           <li><a href="main.php">Home</a></li>
END;
    }
    $content .= <<<END
       <li><a href="logout.php">Logout</a></li>
        <p>Inloggad som <a href="user_detail.php?id={$_SESSION['user_id']}">{$_SESSION['username']}</a></p>
END;
} else {
    if (strcmp("index.php", $url) === 0) {
        $content .= <<<END
            <li class="active"><a href="index.php">Logga in</a></li>
END;
    } else {
        $content .= <<<END
           <li><a href="index.php">Logga in</a></li>
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
