<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
            <div class="col-md-2"></div>
			<div class="col-md-8">
				<?php 
				$loggedIn = null;

				require_once("dbconnect.php");
				$dbh = getDBC();
				if(isset($dbh)){
				    echo " <script>console.log('Connected to DB successfully');</script>";
				}
				?>
                <div class="row">
                    <div class="col-md-1">
                        <nav>
                            <ul class="navbar nav">
                                <li><a href=""><i class="glyphicon glyphicon-home"></i>Home</a></li>
                            
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-2">
                        <div class="panel panel-primary">
                            <div class="panel panel-heading">
                            LOGIN
                            </div>
                            <div class="panel panel-body">
                                <form >
                                    <div class="form-group">
                                        <label>EmailID:</label>
                                        <input class="form-control" name="userid" required type="email"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input class="form-control" required name="pass" type="password"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>            
                
                
                
                
                
                </div>














			</div>
            <div class="col-md-2"></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script> <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
</body>
</html>