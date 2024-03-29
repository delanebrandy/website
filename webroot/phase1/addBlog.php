<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="home.css">
    <script defer src="js/blog.js"></script>
</head>

<?php
session_start();
include "serverConnection.php";
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php "); 
    exit;
}
if (isset($_POST["title"]) && isset($_POST["content"])){

    $title = trim($_POST["title"]);
    $body = trim($_POST["content"]);
    $date = date("Y-m-d H:i:s");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "INSERT INTO blog (date, title, body) VALUES ('$date', '$title', '$body')";
        if ($conn->query($sql) === TRUE) {
            alert("New record created successfully");
            header("Location: blog.php");
        } else {
            alert("Error: " . $sql . "<br>" . $conn->error);
        }
    }
}
?>

<body>
    <header>        
        <a href="index.html"> 
            <img src="images/logo-long.png" alt="logo" id="logoLong">
            <img src="images/logo-small.png" alt="logo" id="logoSmall">
        </a>
            <nav id="deskNav">      
            <ul id = "navelements" class = "longList">
                <li><a href="projects.html">projects</a></li>
                <li><a href=index.html#contact>contact</a></li>
                <li id="log"><a href="logout.php">log out</a></li>
            </ul>
            </nav>      

            <nav id="mobileNav">      
                <ul class = "longList">
                    <li><a href="logout.php">logout</a></li>
                </ul>
                </nav>
    </header>

<main>
    <form id="form" method= "POST" class="blogBox">
        <fieldset class="blogField">
            
            <legend>Add Blog Entry</legend>

            <label for="blogTitle"></label>
            <input id="title" class= "title blogField" type="text" name="title" placeholder="Title">

            <label for="content"></label>
            <textarea id ="content" class = "blogMain" name="content" rows="20%" placeholder="Blog Entry"></textarea>

            <br>

            <button type="submit" class="submitButton" id="submit">Submit</button>
            <button type="clear"id ="clear" class="submitButton">Clear</button>
        </fieldset>
    </form>
</main>

<footer>
    <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>

    <ul class = "longList">
        <li><a href="https://github.com/delanebrandy"><img src="images/gh.svg" alt="github logo" class="socialIcons"></a></li>
        <li><a href="https://twitter.com/delanebrandy"><img src="images/tw.svg" alt="twitter logo" class="socialIcons"></a></li>
        <li><a href="https://www.linkedin.com/in/delane-brandy-303a30214/"><img src="images/li.svg" alt="linkedin logo" class="socialIcons"></a></li>
    </ul>
</footer>

</body>

</html>