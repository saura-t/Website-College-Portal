<?php
    session_start();
    session_destroy();
    header("location:a_login.php?activity=loggedout");
?>