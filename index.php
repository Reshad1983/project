<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Lat est compiled and minified CSS -->
            <!-- Lat est compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
            <!-- Custom styles for this template -->
            <link href="signin.css" rel="stylesheet">
            <link rel="icon" href="http://getbootstrap.com/favicon.ico">    
            <title>Login</title>
    </head>
    <body class="container">
<?php
include('template.php');
function getFruit($conn, $username) {
    $sql = 'SELECT user_id, username, password 
	FROM user 
	';
    foreach ($conn->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }
}
/*
if ((isset($_POST['username'])) and (isset($_POST['password']))) 
{
    $user     = "'" . $_POST['username'] . "'";
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
    } 
	else
	{
        echo "<h1 style='color:red'>Login failed, Please try again<h1>";
    }
}
*/
    $content = <<<END
<div class="row">
    <div class="col-sm-2" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-7" style="background-color:lavenderblush;">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!--Indicators-->

                    <ol class="carousel-indicators">

                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                    </ol>

                    <!--wrapper for the slides-->

                    <div class="carousel-inner" role="listbox">

                        <div class="item active">

                            <img src="img/bild1.jpg" width="460" height="345"/>

                            <div class="carousel-caption">

                                This is the first slide.

                            </div>

                        </div>

                        <div class="item">

                            <img src="img/bild1.jpg" width="460" height="345"/>

                            <div class="carousel-caption">

                                This is the second slide.

                            </div>

                        </div>

                        This is the carousel overall info.

                    </div>

                    <!--controls-->

                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

                        <span class="sr-only">Previous</span>

                    </a>    

                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

                        <span class="sr-only">Next</span>

                    </a>

                </div>
    </div>
    <div class="col-sm-3" style="background-color:lavender;">
END;
	
	if (!isset($_SESSION['user_id'])) {
		$content .= <<<END
		        <div class="well">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#red" data-toggle="tab">Login</a></li>
                <li><a href="#orange" data-toggle="tab">Register</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="red">
					<form role="form" class="form-signin" action="login.php" method="POST">
                		<div class="form-group">
                			 <label for="inputUsername">Username</label>
                       		 <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" required autofocus>
                		</div>
                		<div class="form-group">
                			<label for="inputPassword">Password</label>
                        	<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                		</div>
                		<div class="form-group">
                			 <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>	
                		</div>
                    </form>
                </div>
                <hr>
                <div class="tab-pane" id="orange"> 
					<form role="form" class="form-signin" action="register.php" method="POST">
                		<div class="form-group">
                       		 <input type="text" id="inputUsername" class="form-control" placeholder="User Name" value="" name="username" required autofocus>
                		</div>
                		<div class="form-group">
                        	<input type="password" id="inputPassword" class="form-control" placeholder="password" value="" name="password" required>
                		</div>
						<div class="form-group">
                       		 <input type="text" class="form-control" name="fname" placeholder="First name" value="" >
                		</div>
						<div class="form-group">
                       		 <input type="text" class="form-control" placeholder="Family Name" value="" name="lname">
                		</div>
						<div class="form-group">
                       		 <input type="text"  class="form-control" name="email" placeholder="Email" value="">
                		</div>
                		<div class="form-group">
                			 <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>	
                		</div>
                    </form>				
                </div>
            </div>
        </div><!--end of well class--> 
END;
	}
	$content .= <<<END
    </div><!--End of col3-->
</div>
        
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
        <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>    
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#tabs').tab();
            });
        </script> 
    </body>
</html>     