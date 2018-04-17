<html>
<head>
<script>
$(document).ready = () =>{
    console.log("Ready");
}

</script>
</head>
<body>

<?php 

echo '<div class="col-md-3">';
if(!isset($loggedIn)){
    echo '
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
    ';

}
else{
    echo '<div class="panel panel-primary">
        <div class="panel panel-heading">
            Welcome user.
        </div>
    </div>';
}

echo ' </div> ';

?>
</body>

</html>
