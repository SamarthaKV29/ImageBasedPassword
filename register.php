<?php
require "dbconnect.php";
$dbh = getDBC();
$res = null;
try {
    if ($dbh) {
        if (isset($_POST["name"]) && isset($_POST["useremail"]) && isset($_POST["password"]) && isset($_POST["imgpwd"])) {
            $sql = "insert into users (emailid, name, password, imgpwd, created, verified) values ('" . $_POST["useremail"] . "', '" . $_POST["name"] . "',  '" . $_POST["password"]. "', '". $_POST["imgpwd"] ."', CURRENT_TIMESTAMP, FALSE)";
            $res = pg_query($dbh, $sql);
            //$row = pg_fetch_row($res);
            echo $sql;
            if (!$res) {
                echo json_encode(['regStatus' => 'E011: Error with insert.']);
            }
            else{
                echo json_encode(['regStatus' => '1']);
            }
        }

    } else {
        echo json_encode(['regStatus' => 'E122: Error connecting to Database.']);
    }
} catch (Exception $e) {
    echo json_encode(['regStatus' => 'E92: Exception: ' . $e->getMessage()]);
}
pg_close($dbh);
