<?php

if (isset($_SESSION["loggedIn"])) {
    session_start();
    unset($_SESSION["loggedIn"]);
    echo "<script>console.log('Logged out successfully');</script>";

}

header("Location: index.php");
