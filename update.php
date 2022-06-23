<?php
    include_once __DIR__ . './DB.php';
    include_once __DIR__ . './helper.php';

    $dataUpdate = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ];

    $sql = "UPDATE users set name=:name, email=:email where id=:id";
    DB::execute($sql, $dataUpdate);
?>