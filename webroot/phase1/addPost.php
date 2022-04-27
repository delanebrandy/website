<?php

    include "serverConnection.php";

    $title = trim($_POST["title"]);
    $body = trim($_POST["content"]);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "INSERT INTO blog (date, title, body) VALUES (NOW(), '$title', '$body')";
        if ($conn->query($sql) === TRUE) {
            alert("New record created successfully");
          } else {
            alert("Error: " . $sql . "<br>" . $conn->error);
          }
    }
?>