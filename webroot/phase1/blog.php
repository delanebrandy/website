<?php
    session_start();
    include "serverConnection.php";

    $sql = "SELECT * FROM blog";

    $result = mysqli_query($conn, $sql);

    $data = array();

    if (mysqli_num_rows($result) > 0) {
        for ($i =0; $i < mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_assoc($result);
            $data[$i] = array($row["date"], $row["title"], $row["body"]);
            $_SESSION['noContent'] = false;
        }
    } else {
        $_SESSION['noContent'] = true;
    }
    
    //bubble sort algorithm for sorting $data by date (array[0])
    for ($i = 0; $i < count($data); $i++){
        for ($j = 0; $j < count($data) - 1; $j++){
            if ($data[$j][0] < $data[$j + 1][0]){
                $temp = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $temp;
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
    <title>Blog</title>
    <link rel="stylesheet" href="home.css">
</head>
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
                <?php
                    if ((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
                        echo "<li><a href='addblog.php'>blog post</a></li>";
                    } else {
                        echo "<li><a href='login.php'>log in</a></li>";
                    }
                ?>
            </ul>
            </nav>      

            <nav id="mobileNav">      
                <ul class = "longList">
                <?php
                    if (isset($_SESSION['loggedIn'])){
                        echo "<li><a href='addblog.php'>Blog Post</a></li>";
                    } else {
                        echo "<li><a href='login.php'>login</a></li>";
                    }
                ?>
                </ul>
                </nav>
</header>

<main>
<div class="blog">
    <?php 
        if (!$_SESSION['noContent']){
            for ($i = 0; $i < count($data); $i++){
                $formattedDate = date("j F Y, G:i T", strtotime($data[$i][0]));
                echo "<div class='blogPosts'>";
                echo "<h2>".$data[$i][1]."</h2>";
                echo "<h3 class='blogText'>".$formattedDate."</h3>";
                echo "<p class = 'blogText'>".$data[$i][2]."</p>";
                echo "</div>";
            }
        }
        else{
            echo "<h2>No content</h2>";
        }

    
    ?>

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