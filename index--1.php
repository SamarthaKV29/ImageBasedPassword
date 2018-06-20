<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/imgs/logo.PNG" />
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/pjParams.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.structure.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.theme.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
    <title>Welcome to Sam's Playground</title>
    <noscript>
        <link href="assets/css/noscript.css" rel="stylesheet">
    </noscript>

</head>
<body>
    <?php 
        $loggedIn = null;
        require_once("dbconnect.php");
        $dbh = getDBC();
        if(isset($dbh)){
            echo "<script>console.log('Connected to DB successfully');</script>";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">IBP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto " >
                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user"></i> Register</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-info"></i> Details</a></li>
            </ul>
        </div>
    </nav>
	<div class="container">
		<div class="wrapper">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="panel panel-default">
                                <div class="panel panel-heading">
                                    <h3>Welcome to IBP</h3>
                                </div>
                                <div class="panel panel-content">
                                    <p>We have utilized the state of the art technology to implment the various image based password methods.</p>
                                    <h4>Methods available:</h4>
                                    <ol>
                                        <li>Basic Login</li>
                                        <li>Circle Selection</li>
                                        <li>Grid based Selection</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <?php require("loginform.php"); ?>           
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
	</div>
	
</body>
</html>