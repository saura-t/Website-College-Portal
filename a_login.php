<?php

    session_start();

    if ( isset($_SESSION['id']) ) {
        header("Location: a_home.php ");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Portal</title>
    <link rel="stylesheet" href="./src/main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:600&display=swap" rel="stylesheet">
</head>
<body class="header">
    <div class="welcome">
        Welcome
    </div>
    <form action="login.php" class="container" method="POST">
        <p style="font-family: 'Rajdhani', sans-serif; font-size: 10mm; margin:0px">ADMIN LOGIN</p>

        <?php
            if(isset($_REQUEST['activity'])){
                if($_REQUEST["activity"] == "error"){
         ?>
                <div style="display: flex; padding: 20px; flex-direction:column">
                    <label style='color:red;'>Username and Password didn't match</label>
                </div>

         <?php           

                }
                if($_REQUEST["activity"] == "loggedout"){
                    ?>
                           <div style="display: flex; padding: 20px; flex-direction:column">
                               <label style='color:green;'>You are successfully logged out.</label>
                           </div>
           
                    <?php           
           
                    }

                    if($_REQUEST["activity"] == "expired"){
                    ?>
                            <div style="display: flex; padding: 20px; flex-direction:column">
                                <label style='color:green;'>You session is expired. Login again</label>
                            </div>
            
                    <?php           
            
                            }           
            }
        ?>
        
        
        <div style="display: flex; padding: 20px; flex-direction:column">
            <label>Username:</label>
            <input type="text" name="a_user" class="input" required>
        </div>
        <div style="display:flex; padding: 20px; padding-top: 0px; flex-direction:column">
            <label>Password:</label>
            <input type="password" name="a_pwd" class="input" required>
        </div>
        <button class="btn" type="submit">Sign In</button>
        <a href="index.php">
        <input type="button" class="btn" value="Cancel">
        </a>
        <!-- <a href="index.php">Cancel</a> -->
        
    </form>
    <!-- <div class="container">
        <div style="display:flex; width: 100%">
            <div style="display: flex; flex-direction:column">
                <label for="fname">First Name:</label>
                <input type="text" class="input">
            </div>
            <div style="display: flex; flex-direction:column; margin-left: 5px; ">
                <label for="lname">Last Name:</label>
                <input type="text" class="input">
            </div>
        </div>
        <div style="display: flex; flex-direction:column; width: 100%">
            <label for="email">Email:</label>
            <input type="email" name="email" id="usr_email" class="input" style="width: 100%">
        </div>
        <div style="display:flex; width: 100%">
            <div style="display: flex; flex-direction:column">
                <label for="pwd">Password:</label>
                <input type="password" class="input">
            </div>
            <div style="display: flex; flex-direction:column; margin-left: 5px; ">
                <label for="cnf_pwd">Confirm Password:</label>
                <input type="password" class="input">
            </div>
        </div>
        <input type="button" value="Sign In" class="btn">

    </div> -->
</body>
</html>