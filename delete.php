<?php
include_once "./User.php";
if (isset($_POST['id']))
{
    $id = $_POST['id'];
    User::destroy($id);
    header("location:./");
}else{
    $_SESSION['message'] = "User not found ";
    header("location./");
}
