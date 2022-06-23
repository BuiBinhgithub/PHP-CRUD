<?php
    include_once __DIR__ . './DB.php';
    include_once __DIR__ . './helper.php';
     $dataCreate = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => md5($_POST['password']),
    ];
   
    $sql = "INSERT INTO users (name, email, password) values (:name, :email, :password)";
    $res = DB::execute($sql, $dataCreate);
?>