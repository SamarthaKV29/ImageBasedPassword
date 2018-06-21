<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/imgs/lolo.PNG" />
    <link href="assets/css/main.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <meta name="viewport" content="initial-scale=1, shrink-to-fit=yes">
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.structure.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.theme.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />

    <title>Welcome to Sam's Playground</title>
    <noscript>
        <link href="assets/css/noscript.css" rel="stylesheet">
    </noscript>

</head>

<body class="bg-dark">
    <nav class="navbar navbar-dark navbar-expand-md text-light rounded">
        <a class="navbar-brand" href="index.php">
            <img src='assets/imgs/lolo.png' class="img-fluid" style='width: 64px;'/>
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-none ">Image Based Passwords</span>
            <span class="d-none d-sm-inline-block d-inline-block d-lg-none d-md-none">IBP</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link boxedLink" href="index.php"><i class="fas fa-home fa-fw"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info fa-fw"></i> About</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">

        <div class="wrapper">

            <div id="loadingmodal" class="modal p-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-dark">
                        <div class="text-center font-weight-bold p-1">
                            <i class="fas fa-3x fa-spinner fa-pulse text-warning loadSpinner"></i>
                            <img class="img-fluid" src="assets/imgs/loading.gif" width="64"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-11 col-xs-11 m-1">
                    <div class="card">
                        <div class="card-header">
                            Welcome to IBP
                        </div>
                        <div class="card-body">
                            <p>We have utilized the state of the art technology to implment the various image based password methods.</p>
                            <h4>Methods available:</h4>
                            <div id="loginTypes" class="list-group">
                                <a href="#" class="list-group-item list-group-item-action list-group-item-info active">Basic Login</a>
                                <a href="#" class="list-group-item list-group-item-info list-group-item-action">Circle Selection</a>
                                <a href="#" class="list-group-item list-group-item-info list-group-item-action">Grid based Selection</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="userpanel" class="col-xl-6 col-lg-6 col-md-6 col-sm-11 col-xs-11 m-1">
                    <div id="loginForm" class="card">
                        <div class="card-header">
                            <i class="fas fa-user"></i> <span>Login</span>
                        </div>
                        <div class="card-body">
                            <form id="lgnform">
                                <div class="form-group">
                                    <label>EmailID:</label>
                                    <input class="form-control" id="femailID" name="useremail" required type="email"/>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="form-control" id="fpassw" required name="password" type="password"/>

                                </div>
                                <div class="form-group" id="frepassholder">
                                    <label >Re Enter Password:</label>
                                    <input class="form-control" id="frepass" name="passwordmatch" type="password"/>
                                </div>
                                <div class="form-group">
                                    <div id="pimgsholder" class="text-center" style="display: none">
                                        <?php
require "loadIMGs.php";
foreach (loadImgs() as $img) {
    echo "" . $img;
}
?>
                                    </div>
                                    <input type="hidden" name="imbpwd" id="imgpwd" required/>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p id="ibp_sup1" class="animated fadeInUp bg-warning rounded p-1 m-2">Please select 5 images</p>
                                    <p id="sup2" class="animated fadeInUp bg-danger rounded p-1 m-2"></p>
                                    <input class="btn btn-success animated zoomInLeft anim-delay-2" type="submit" />
                                    <button class="btn btn-primary animated zoomInRight anim-delay-2" id="register">New User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="loggedInDialog" class="card bg-light">
                        <div class="card-header">
                            Welcome
                        </div>
                        <div class="card-body">
                            User
                            <span class="userFullName">
                                <script >
                                    showUName();
                                </script>
                            </span>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger" id="logoutbtn">Logout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
