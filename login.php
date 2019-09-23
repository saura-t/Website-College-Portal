<?php
define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "CollegePortal"); // database name
define('DB_SERVER', "localhost"); // db server

$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die("unable to connect");

if ( isset($_POST['a_user']) && isset($_POST['a_pwd']) ) {
    
    $entered_username = $_POST['a_user'];
    $entered_password = $_POST['a_pwd'];
    
    $sql = "SELECT * FROM admin WHERE admin_name = '$entered_username' AND admin_pass ='$entered_password'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['uname'] = $res['admin_name'];
        $_SESSION['id'] = $res['admin_id'];
        header("Location: a_home.php");
    } 
    else {
        header("location:a_login.php?activity=error");
    }
}

?>