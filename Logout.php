<?php
    session_unset();
    unset($_SESSION['username']);
    header("location:./login.php");
?>