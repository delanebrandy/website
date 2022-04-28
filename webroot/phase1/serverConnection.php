<?php
    date_default_timezone_set('UTC');
    function alert($message){
        echo "<script type='text/javascript'>alert('$message');
        </script>";
    } 

    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = "root";
    $dbpwd = "";
    $dbname = "website";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname) or
    die('Connection to database failed: ' .$mysqli->connect_error);
?>