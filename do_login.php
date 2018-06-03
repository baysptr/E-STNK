<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "polda" && $password == "1234"){
        $_SESSION['status'] = "polda";
        $_SESSION['logged_in'] = true;
        echo "<script>alert('You access POLDA user !, Success');window.location = 'index.php';</script>";
    }else if($username == "samsat" && $password == "1234"){
        $_SESSION['status'] = "samsat";
        $_SESSION['logged_in'] = true;
        echo "<script>alert('You access SAMSAT user !, Success');window.location = 'index.php';</script>";
    }else{
        echo "<script>alert('You access not found !, Failur');window.location = 'login.php';</script>";
    }