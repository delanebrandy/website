<?php
    date_default_timezone_set('UTC');
    function alert($message){
        echo "<script type='text/javascript'>alert('$message');
        </script>";
    } 

    $dbhost = "213.171.200.100";
    $dbport = "3306";
    $dbuser = "delane";
    $dbpwd = "z2I1n2D*n1H";
    $dbname = "website";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname) or
    die('Oh no, Connection to database failed: ' .$mysqli->connect_error);
?>