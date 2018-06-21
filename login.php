<?php
require "dbconnect.php";

$dbh = getDBC();
$res = null;

if ($dbh) {
    if (isset($_POST["useremail"]) && isset($_POST["password"]) && isset($_POST["imgpwd"])) {
        $res = pg_query($dbh, "select name, emailid, password, imgpwd from users");
        while ($r = pg_fetch_row($res)) {
            if (strcmp($_POST["useremail"], $r[1]) == 0 && strcmp($_POST["password"], $r[2]) == 0 && strcmp($_POST["imgpwd"], $r[3]) == 0) {
                header('Content-Type: application/json');
                echo json_encode(['name' => $r[0], 'emailid' => $r[1]]);
                break;
            } else {
                echo "Failed.";
            }
        }
    }
} else {
    echo "Error connecting to Database";
}
