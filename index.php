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

if ((isset($_POST['username'])) and (isset($_POST['password']))) {
    $user     = "'" . $_POST['username'] . "'";
    $password = "'" . $_POST['password'] . "'";
    $result   = mysql_query("SELECT *
                FROM User
                WHERE userName = $user 
                AND password = $password");
    if (!$result) {
        echo mysql_error();
    }
    $row = mysql_fetch_assoc($result);
    if (($_POST['username'] === $row['username']) and ($_POST['password'] === $row['password'])) {
        $_SESSION['user_id']  = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['paseword'];
        $_SESSION['timeout']  = time();
    } else {
        echo "<h1 style='color:red'>Login failed, Please try again<h1>";
    }
}
if (!isset($_SESSION['user_id'])) {

}
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

                            <img src="img/bild1.jpg" />

                            <div class="carousel-caption">

                                This is the first slide.

                            </div>

                        </div>

                        <div class="item">

                            <img src="img/bild1.jpg" />

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
        <div class="well">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#red" data-toggle="tab">Login</a></li>
                <li><a href="#orange" data-toggle="tab">Register</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="red">
					<form role="form" action="index.php" method="POST">
                		<div class="form-group">
                			 <label for="inputUsername">Username</label>
                       		 <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" value="" required autofocus>
                		</div>
                		<div class="form-group">
                			<label for="inputPassword">Password</label>
                        	<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="" required>
                		</div>
                		<div class="form-group">
                			 <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>	
                		</div>
                    </form>
                </div>
                <hr>
                <div class="tab-pane" id="orange">       
                    <form class="form-signin" role="form" action="register.php" method="POST">
                        <h2>Register here</h2>
                        <label for="inputUsername" class="sr-only">Username</label>
                        <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" value="" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="" required>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" value="">
                        <label for="inputFname" class="sr-only">First name</label>
                        <input type="text" id="inputFname" class="form-control" placeholder="First name" name="fname" value="">
                        <label for="inputLname" class="sr-only">Last name§        </label>
                        <input type="text" id="inputLname" class="form-control" placeholder="Last name" value="" name="lname">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div><!--end of well class--> 
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
