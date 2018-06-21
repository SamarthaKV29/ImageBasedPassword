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
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#"><img src='assets/imgs/lolo.png' class="img-fluid" style='width: 64px;'/> Image Based Passwords</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="wrapper">
            <div id="loadingmodal" class="modal p-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-dark">
                        <div class="text-center font-weight-bold p-1">
                        <img class="img-fluid" src="assets/imgs/loading.gif" width="64"/>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m-1">
                    <div class="card">
                        <div class="card-header">
                            Welcome to IBP
                        </div>
                        <div class="card-body">
                            <p>We have utilized the state of the art technology to implment the various image based password methods.</p>
                            <h4>Methods available:</h4>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action" onclick="$('#loginForm').toggle();">Basic Login</a>
                                <a href="#" class="list-group-item list-group-item-action">Circle Selection</a>
                                <a href="#" class="list-group-item list-group-item-action">Grid based Selection</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col m-1">
                    <div id="loginForm" class="card">
                        <div class="card-header">
                            Login
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
                                <div class="form-group">
                                    <div id="pimgsholder" class="text-center" style="display: none">
                                        <?php
require_once "loadIMGs.php";
foreach (loadImgs() as $img) {
    echo "" . $img;
}
?>
                                    </div>
                                    <input type="hidden" name="imbpwd" id="imgpwd" required/>
                                </div>
                                <div class="form-group">
                                    <p id="ibp_sup1" class="animated fadeInUp bg-warning rounded p-1 m-2">Please select 5 images</p>
                                    <p id="sup2" class="animated fadeInUp bg-danger rounded p-1 m-2">Please check the errors!</p>
                                    <input class="btn btn-success" type="submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="loggedInDialog" class="card bg-light">
                        <div class="card card-header">
                            Welcome
                        </div>
                        <div class="card-body">
                            User
                        </div>
                        <div class="card-footer">
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
