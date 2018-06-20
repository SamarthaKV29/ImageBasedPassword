<?php
function pg_connection_string_from_database_url()
{
    //extract(parse_url($_ENV["DATABASE_URL"]));
    $user = "szkfkupaorgifd";
    $password = "6171a7ebf6524897ed492ac8c786242030f8997068db778a71954365002a7578";
    $host = "ec2-54-243-28-109.compute-1.amazonaws.com";
    $dbname = "d52j9hr7kohal6";
    return "user=$user password=$password host=$host dbname=$dbname"; # <- you may want to add sslmode=require there too
}

function getDBC()
{
    try {
        //echo "<script>console.log('" . pg_connection_string_from_database_url() . "');</script>";
        $dbh = pg_connect(pg_connection_string_from_database_url());
        //echo "<script>console.log('" . $dbh . "');</script>";
        $_SESSION["DBC"] = $dbh;
    } catch (Exception $e) {
        echo "Unable to connect to database. Please try again.";
    }
}
