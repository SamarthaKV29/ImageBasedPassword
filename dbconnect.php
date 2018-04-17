<?php 


// function pg_connection_string_from_database_url() {
//     extract(parse_url($_ENV["DATABASE_URL"]));
//     return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
//   }

// echo "".pg_connection_string_from_database_url();



function getDBC(){
    $dbh = null;
    $user="szkfkupaorgifd";
    $password="6171a7ebf6524897ed492ac8c786242030f8997068db778a71954365002a7578";
    $host="ec2-54-243-28-109.compute-1.amazonaws.com";
    $dbname="d52j9hr7kohal6";

    try{
        $dbh = new PDO('pgsql:host='.$host.';dbname='.$dbname, $user, $pass);
    }
    catch(Exception $e){
        echo "Unable to connect to database. Please try again.";
    }
    if (isset($dbh)){
        return ($dbh);
    }
    else{
        return null;
    }
}


getDBC();


















?>