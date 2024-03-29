<?php

    include "serverConnection.php";

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("Location: addBlog.php");
        exit;
    }

    if (isset($_POST["email"]) && isset($_POST["password"])){

        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($email) || empty($password)){
                alert("Please fill in all the fields");
            }
            else{
                $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $query);
                
                if (!$result){
                    alert("Error: " . mysqli_error($conn));
                }
                else{
                    if (mysqli_num_rows($result) == 1){
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['email'] = $email;
                        header("Location: addBlog.php");
                        exit;
                    }
                    else{
                        alert("Incorrect email or password");
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="home.css">
    <script defer src="js/login.js"></script>
</head>
<body>
    <header>        
            <a href="index.html">
                <img src="images/logo-long.png" alt="logo" id="logoLong">
                <img src="images/logo-small.png" alt="logo" id="logoSmall">
            </a>
            <nav id="deskNav">      
                <ul id = "navelements" class = "longList">
                    <li><a href="blog.php">back</a></li>
                    <li><a href="addblog.php">add blog</a></li>
                </ul>
            </nav>
    </header>

    <main>
        <form id="form" method= "POST" class = "mainForm">
            <fieldset class="mainField">
                <legend>Login</legend>
                    <input id="email" class= "inBox" type="email" name="email" placeholder="Email">
                    <input id="password"class= "inBox" type="password" placeholder="Password" name="password">
                    <br>
                    <input type="submit" class="submitButton">
            </fieldset>
        </form>
        <div id="error">
            
        </div>
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