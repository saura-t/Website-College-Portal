<?php

define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "CollegePortal"); // database name
define('DB_SERVER', "localhost"); // db server

    session_start();

    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die("unable to connect");

    if ( !isset($_SESSION['id']) ) {
        header("Location: a_login.php?activity=expired");
    }

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
</head>
<body>
    <nav>
        <img id="logo" src="src\vidyalankarlogo.png" alt="">
        <ul>
            <!-- <li id="navbar">
                <a href="#">Home</a>
            </li> -->
            <li id="navbar">
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="box">
        <ul class="dashboard">
            <div class="profile">
                <img id="profile" src="src\profile.png" alt="">
                <a style="font-size: 25px" href="#"><?php echo $_SESSION["uname"] ?></a>
            </div>
            <hr>
            <div class="leftbox">    
                <li id="left-box"><a href="a_home.php">Home</a></li>
                <li id="left-box"><a href="a_posts.php" style="color: white">Posts</a></li>
            </div> 
        </ul>

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

    <button class="open-btn" onclick="openForm()" id="add-post">Add Post</button>
    
    <div class="form-popup" id="myForm">
    <form action="addpost.php" class="form-container" method="POST">
        <h1>POST DETAILS</h1>

        <label for="title"><b>Title:</b></label>
        <input type="text" placeholder="Enter Post Title" name="title" required>

        <label for="description"><b>Description:</b></label>
        <textarea type="text" style="white-space: pre-wrap" placeholder="Enter Post Description" name="description" required></textarea>

        <button type="submit" class="btn">Post</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
    </form>
    </div>

    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "flex";
        document.getElementById("add-post").style.display = "none";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("add-post").style.display = "flex";
        }
    </script>
</body>
</html>