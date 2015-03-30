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
			<style>
				background-color: #C9C9C9
			</style>
            <title>Login</title>
    </head>
    <body class="container"> 
<?php
include('template.php');
		$_SESSION['location'] = 'index.php';
    $content = <<<END
<div class="container">
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
    </div><!--End of col3-->
</div>
</div><!--end of container-->        
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
