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
            <div class="col"></div>
			<div class="col-md-12 col-lg-8 col-sm-8">
				<?php 
				$loggedIn = null;

				require_once("dbconnect.php");
				$dbh = getDBC();
				if(isset($dbh)){
				    echo " Connected to DB successfully";
				}
				?>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>            
                
                
                
                
                
                </div>














			</div>
            <div class="col"></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script> <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
</body>
</html>