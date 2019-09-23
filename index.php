<?php

define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "CollegePortal"); // database name
define('DB_SERVER', "localhost"); // db server

    session_start();

    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die("unable to connect");
    
    $sql = "SELECT post_id, post_date, post_time, post_title, post_description FROM posts order by post_id desc";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./src/home.css">
    <script type="text/javascript">
        function preback() {
            window.history.forward();
        }
        setTimeout(preback(), 0);
        window.onunload=function(){null};
    </script>
</head>
<body>
    <nav>
        <img id="logo" src="src\vidyalankarlogo.png" alt="">
        <ul>
            <!-- <li id="navbar">
                <a href="#">Home</a>
            </li> -->
            <li id="navbar">
                <a href="a_login.php">Sign In</a>
            </li>
        </ul>
    </nav>
    <div class="box">
        <?php
            if (isset($_SESSION['id'])) {
        ?>

        <ul class="dashboard">
            <div class="profile">
                <img id="profile" src="src\profile.png" alt="">
                <a style="font-size: 25px" href="#"><?php echo $_SESSION["uname"] ?></a>
            </div>
            <hr>
            <div class="leftbox">    
                <li id="left-box"><a href="a_home.php" style="color: white">Home</a></li>
                <li id="left-box"><a href="a_posts.php" >Posts</a></li>
            </div> 
        </ul>

        <?php
            }
        ?>
        <div class="box2">
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>

            
            <div class="post-container">
                <label class="post">
                    <b><?php echo $row["post_title"]; ?></b>
                </label>
                <br>
                <label class="post">
                <p style="white-space:pre-wrap"><?php echo $row["post_description"]; ?></p>
                </label>
            </div>
        
        <?php
                }
        }
        $conn->close();

        ?>
    </div>
    </div>
</body>
</html>