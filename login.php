<?php

if (isset($_SESSION["DBC"]) && isset($_POST["useremail"]) && isset($_POST["password"])) {
    echo "<script>console.log('Checking...');</script>";
    $res = pg_query($_SESSION["DBC"], "select name, emailid, password, imgpwd from users");
    while ($r = pg_fetch_row($res)) {
        if ($_POST["useremail"] == $r[1] && $_POST["password"] == $r[2]) {
            $_SESSION["loggedIn"] = true;
            $user = new User($r[0], $r[1], $r[2]);
            $_SESSION["user"] = $user;
            echo "<script>console.log('Welcome...');</script>";
            break;
        }
    }

    echo "
<script>
console.log('HERE');
</script>


";

}
