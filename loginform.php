
<?php
function loadImgs()
{
    $imgArr = null;
    $imgloc = "\assets\imgs\lock1\\";
    $handle = opendir(dirname("./") . $imgloc);
    $path = dirname("./") . $imgloc;
    $i = 1;
    while ($file = readdir($handle)) {
        if ($file != "." && $file != ".." && strstr($file, ".png") || strstr($file, ".jpg")) {
            $imgArr[$i++] = "<img class='pimgs animated zoomIn img-fluid rounded-30 m-1' id='pic" . $i . "' src='" . $path . $file . "' />";
        }
    }
    return $imgArr;
    //
}

if (!isset($_SESSION["loggedIn"])) {
    echo '
    <div id="loginForm" class="card bg-warning">
        <div class="card-header">
        Login
        </div>
        <div class="card card-body">
            <form id="lgnform">
                <div class="form-group">
                    <label>EmailID:</label>
                    <input class="form-control" id="femailID" name="useremail" required type="email"/>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input class="form-control" id="fpassw" required name="password" type="password"/>
                </div>
                <div id="pimgsholder" class="text-center" style="display: none">
                ';
    foreach (loadImgs() as $img) {
        echo "" . $img;
    }
    echo '
                </div>
                <input type="hidden" name="imbpwd" id="imgpwd" required/>
                <p id="ibp_sup1" class="animated fadeInUp bg-warning rounded p-1 m-2">Please select 5 images</p>
                <p id="sup2" class="animated fadeInUp bg-warning rounded p-1 m-2">Please check the errors!</p>
                <input class="btn btn-success" type="submit" />
            </form>
        </div>
    </div>
    <!--script>$("#loginForm").hide();</script-->
    ';

} else if (isset($_SESSION["loggedIn"]) && isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    echo '<div id="loginForm" class="card bg-light">
        <div class="card card-header">
            Welcome
        </div>
        <div class="card-body">
            User ' . $user->getName() . '
        </div>
        <div class="card-footer">
        <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
    </div>
    <script>$("#loginForm").show();</script>';
}

?>