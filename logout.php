<?php
    session_start();
    $_SESSION['id']="0";
    echo $_SESSION['id'];
    session_destroy();
    header('location:profile.php');