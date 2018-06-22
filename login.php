<?php
require "dbconnect.php";
$dbh = getDBC();
$res = null;
header('Content-Type: application/json');
try {
    if ($dbh) {
        if (isset($_POST["useremail"]) && isset($_POST["password"]) && isset($_POST["imgpwd"])) {
            $res = pg_prepare($dbh, "loginQ", "select name from users where emailid = \$1 and password = \$2 and imgpwd = \$3");
            $res = pg_execute($dbh, "loginQ", array($_POST["useremail"], $_POST["password"], $_POST["imgpwd"]));
            $row = pg_fetch_row($res);
            if (pg_num_rows($res) > 0) {
                echo json_encode(['loginStatus' => $row[0]]);
            } else {
                echo json_encode(['loginStatus' => 'E011: No matching credentials']);
            }
        }
    } else {
        echo json_encode(['loginStatus' => 'E122: Error connecting to Database.']);
    }
} catch (Exception $e) {
    echo json_encode(['loginStatus' => 'E92: Exception: ' . $e->getMessage()]);
}
pg_close($dbh);
